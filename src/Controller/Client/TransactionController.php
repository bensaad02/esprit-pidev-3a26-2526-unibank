<?php

namespace App\Controller\Client;

use App\Entity\Compte;
use App\Entity\TransactionBancaire;
use App\Entity\Utilisateur;
use App\Enum\TransactionType;
use App\Repository\TransactionBancaireRepository;
use App\Service\TransactionService;
use Doctrine\ORM\EntityManagerInterface;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/client/transactions')]
class TransactionController extends BaseClientController
{
    #[Route('', name: 'app_client_transactions')]
    public function index(Request $request, EntityManagerInterface $em, TransactionBancaireRepository $repo): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();
        $compte = $em->getRepository(Compte::class)->findOneBy(['utilisateur' => $user]);

        if (!$compte) {
            $this->addFlash('error', 'Aucun compte bancaire trouve.');
            return $this->redirectToRoute('app_client_dashboard');
        }

        $type = $request->query->get('type', 'all');
        $search = $request->query->get('q', '');
        $dateFrom = $request->query->get('from') ? new \DateTime($request->query->get('from')) : null;
        $dateTo = $request->query->get('to') ? new \DateTime($request->query->get('to')) : null;

        $transactions = $repo->findByCompte($compte->getIdCompte(), $type, $search, $dateFrom, $dateTo);

        $stats = [
            'virements' => $repo->countByCompteAndType($compte->getIdCompte(), TransactionType::VIREMENT),
            'retraits' => $repo->countByCompteAndType($compte->getIdCompte(), TransactionType::RETRAIT),
            'depots' => $repo->countByCompteAndType($compte->getIdCompte(), TransactionType::DEPOT),
        ];

        return $this->render('client/transaction/index.html.twig', [
            'compte' => $compte,
            'transactions' => $transactions,
            'stats' => $stats,
            'type' => $type,
            'search' => $search,
            'dateFrom' => $request->query->get('from', ''),
            'dateTo' => $request->query->get('to', ''),
        ]);
    }

    #[Route('/submit', name: 'app_client_transaction_submit', methods: ['POST'])]
    public function submit(Request $request, EntityManagerInterface $em, TransactionService $service, ValidatorInterface $validator): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) {
            if ($request->isXmlHttpRequest()) {
                return $this->json(['success' => false, 'errors' => ['_global' => 'Acces refuse.']]);
            }
            return $redirect;
        }

        $user = $this->getUser();
        $compte = $em->getRepository(Compte::class)->findOneBy(['utilisateur' => $user]);

        if (!$compte) {
            if ($request->isXmlHttpRequest()) {
                return $this->json(['success' => false, 'errors' => ['_global' => 'Aucun compte bancaire trouve.']]);
            }
            $this->addFlash('error', 'Aucun compte bancaire trouve.');
            return $this->redirectToRoute('app_client_dashboard');
        }

        $type = $request->request->get('type', '');
        $montant = (float) $request->request->get('montant', 0);
        $destination = trim($request->request->get('destination', ''));
        $description = trim($request->request->get('description', ''));

        // Server-side field validation
        $errors = [];
        if (empty($type)) {
            $errors['type'] = 'Le type de transaction est obligatoire.';
        } elseif (!in_array($type, ['VIREMENT', 'RETRAIT'])) {
            $errors['type'] = 'Type de transaction invalide.';
        }
        if ($montant <= 0) {
            $errors['montant'] = 'Le montant doit être supérieur à 0.';
        }
        if ($type === 'VIREMENT' && empty($destination)) {
            $errors['destination'] = 'Le compte destinataire est obligatoire.';
        }

        if (!empty($errors)) {
            if ($request->isXmlHttpRequest()) {
                return $this->json(['success' => false, 'errors' => $errors]);
            }
            $this->addFlash('error', array_values($errors)[0]);
            return $this->redirectToRoute('app_client_transactions');
        }

        $error = '';
        if ($type === 'VIREMENT') {
            $error = $service->effectuerVirement($compte, $destination, $montant, $description, $validator);
        } else {
            $error = $service->effectuerRetrait($compte, $montant, $description, $validator);
        }

        if ($error) {
            if ($request->isXmlHttpRequest()) {
                // Try to map error to a field
                $field = '_global';
                if (str_contains(strtolower($error), 'montant') || str_contains(strtolower($error), 'solde') || str_contains(strtolower($error), 'insuffisant')) {
                    $field = 'montant';
                } elseif (str_contains(strtolower($error), 'destinataire') || str_contains(strtolower($error), 'destination') || str_contains(strtolower($error), 'compte')) {
                    $field = 'destination';
                }
                return $this->json(['success' => false, 'errors' => [$field => $error]]);
            }
            $this->addFlash('error', $error);
            return $this->redirectToRoute('app_client_transactions');
        }

        $label = $type === 'VIREMENT' ? 'Virement' : 'Retrait';
        $message = $label . ' de ' . number_format($montant, 2, ',', ' ') . ' DT effectué avec succès.';

        if ($request->isXmlHttpRequest()) {
            return $this->json(['success' => true, 'message' => $message]);
        }

        $this->addFlash('success', $message);
        return $this->redirectToRoute('app_client_transactions');
    }

    #[Route('/{id}/qrcode', name: 'app_client_transaction_qrcode', methods: ['GET'])]
    public function qrcode(int $id, EntityManagerInterface $em): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();
        $compte = $em->getRepository(Compte::class)->findOneBy(['utilisateur' => $user]);
        $transaction = $em->getRepository(TransactionBancaire::class)->find($id);

        if (!$transaction || !$compte) {
            return new Response('Not found', 404);
        }

        if ($transaction->getCompteSource()?->getIdCompte() !== $compte->getIdCompte()
            && $transaction->getCompteDestination()?->getIdCompte() !== $compte->getIdCompte()) {
            return new Response('Acces refuse', 403);
        }

        $m = (float) $transaction->getMontant();
        $isOut = ($transaction->getType() === TransactionType::RETRAIT)
            || ($transaction->getType() === TransactionType::VIREMENT && $transaction->getCompteSource()?->getIdCompte() === $compte->getIdCompte());

        $lines = [
            'UniBank+ Transaction',
            'ID: TXN-' . str_pad((string) $id, 8, '0', STR_PAD_LEFT),
            'Type: ' . $transaction->getType()->value,
            'Montant: ' . ($isOut ? '-' : '+') . number_format($m, 2, '.', '') . ' TND',
            'Date: ' . $transaction->getDateCreation()->format('d/m/Y H:i'),
        ];
        if ($transaction->getCompteSource()) {
            $lines[] = 'De: ' . $transaction->getCompteSource()->getNumeroCompte();
        }
        if ($transaction->getType() === TransactionType::VIREMENT && $transaction->getCompteDestination()) {
            $lines[] = 'Vers: ' . $transaction->getCompteDestination()->getNumeroCompte();
        }
        if ($transaction->getDescription()) {
            $lines[] = 'Note: ' . $transaction->getDescription();
        }

        $qrCode = new QrCode(
            data: implode("\n", $lines),
            size: 280,
            margin: 12
        );

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        return new Response($result->getString(), 200, [
            'Content-Type' => $result->getMimeType(),
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }
}

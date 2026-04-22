<?php

namespace App\Controller\Client;

use App\Entity\Compte;
use App\Entity\TransactionBancaire;
use App\Entity\Utilisateur;
use App\Enum\TransactionType;
use App\Repository\TransactionBancaireRepository;
use App\Service\TransactionService;
use Doctrine\ORM\EntityManagerInterface;
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
        if ($redirect) return $redirect;

        $user = $this->getUser();
        $compte = $em->getRepository(Compte::class)->findOneBy(['utilisateur' => $user]);

        if (!$compte) {
            $this->addFlash('error', 'Aucun compte bancaire trouve.');
            return $this->redirectToRoute('app_client_dashboard');
        }

        $type = $request->request->get('type', '');
        $montant = (float) $request->request->get('montant', 0);
        $destination = trim($request->request->get('destination', ''));
        $description = trim($request->request->get('description', ''));

        $error = '';
        if ($type === 'VIREMENT') {
            $error = $service->effectuerVirement($compte, $destination, $montant, $description, $validator);
        } elseif ($type === 'RETRAIT') {
            $error = $service->effectuerRetrait($compte, $montant, $description, $validator);
        } else {
            $this->addFlash('error', 'Type de transaction invalide.');
            return $this->redirectToRoute('app_client_transactions');
        }

        if ($error) {
            $this->addFlash('error', $error);
        } else {
            $label = $type === 'VIREMENT' ? 'Virement' : 'Retrait';
            $this->addFlash('success', $label . ' de ' . number_format($montant, 2, ',', ' ') . ' DT effectue avec succes.');
        }

        return $this->redirectToRoute('app_client_transactions');
    }
}

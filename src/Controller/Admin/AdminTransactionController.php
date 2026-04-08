<?php

namespace App\Controller\Admin;

use App\Entity\TransactionBancaire;
use App\Enum\TransactionType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TransactionBancaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/transactions')]
class AdminTransactionController extends AbstractController
{
    #[Route('', name: 'app_admin_transactions')]
    public function index(Request $request, TransactionBancaireRepository $repo): Response
    {
        $type = $request->query->get('type', 'all');
        $search = $request->query->get('q', '');
        $clientFilter = $request->query->get('client', '');
        $accountFilter = $request->query->get('account', '');

        $transactions = $repo->findAllFiltered($type, $search, $clientFilter, $accountFilter);

        $stats = [
            'total' => $repo->countAll(),
            'virements' => $repo->countByType(TransactionType::VIREMENT),
            'retraits' => $repo->countByType(TransactionType::RETRAIT),
            'depots' => $repo->countByType(TransactionType::DEPOT),
        ];

        return $this->render('admin/transaction/index.html.twig', [
            'transactions' => $transactions,
            'stats' => $stats,
            'type' => $type,
            'search' => $search,
            'clientFilter' => $clientFilter,
            'accountFilter' => $accountFilter,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_admin_transaction_delete', methods: ['POST'])]
    public function delete(int $id, EntityManagerInterface $em): Response
    {
        $transaction = $em->getRepository(TransactionBancaire::class)->find($id);

        if (!$transaction) {
            $this->addFlash('error', 'Transaction introuvable.');
            return $this->redirectToRoute('app_admin_transactions');
        }

        $montant = (float) $transaction->getMontant();
        $source = $transaction->getCompteSource();
        $destination = $transaction->getCompteDestination();

        switch ($transaction->getType()) {
            case TransactionType::DEPOT:
                if ($source === null || (float) $source->getSolde() < $montant) {
                    $this->addFlash('error', 'Suppression impossible: le solde du compte ne permet pas d\'annuler ce depot.');
                    return $this->redirectToRoute('app_admin_transactions');
                }
                break;

            case TransactionType::RETRAIT:
                if ($source === null) {
                    $this->addFlash('error', 'Suppression impossible: compte source introuvable.');
                    return $this->redirectToRoute('app_admin_transactions');
                }
                break;

            case TransactionType::VIREMENT:
                if ($source === null || $destination === null) {
                    $this->addFlash('error', 'Suppression impossible: comptes de virement introuvables.');
                    return $this->redirectToRoute('app_admin_transactions');
                }

                if ((float) $destination->getSolde() < $montant) {
                    $this->addFlash('error', 'Suppression impossible: le compte destinataire ne dispose plus du montant a annuler.');
                    return $this->redirectToRoute('app_admin_transactions');
                }
                break;
        }

        $em->beginTransaction();

        try {
            switch ($transaction->getType()) {
                case TransactionType::DEPOT:
                    $source->setSolde(number_format((float) $source->getSolde() - $montant, 2, '.', ''));
                    break;

                case TransactionType::RETRAIT:
                    $source->setSolde(number_format((float) $source->getSolde() + $montant, 2, '.', ''));
                    break;

                case TransactionType::VIREMENT:
                    $source->setSolde(number_format((float) $source->getSolde() + $montant, 2, '.', ''));
                    $destination->setSolde(number_format((float) $destination->getSolde() - $montant, 2, '.', ''));
                    break;
            }

            $em->remove($transaction);
            $em->flush();
            $em->commit();

            $this->addFlash('success', 'Transaction supprimee et soldes mis a jour.');
        } catch (\Throwable $e) {
            $em->rollback();
            $this->addFlash('error', 'Erreur lors de la suppression: ' . $e->getMessage());
        }

        return $this->redirectToRoute('app_admin_transactions');
    }
}

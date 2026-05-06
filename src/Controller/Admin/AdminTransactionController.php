<?php

namespace App\Controller\Admin;

use App\Entity\TransactionBancaire;
use App\Enum\TransactionType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TransactionBancaireRepository;
use App\Service\SupabaseStorageService;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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

    #[Route('/export-pdf', name: 'app_admin_transactions_pdf', methods: ['GET'])]
    public function exportPdf(Request $request, TransactionBancaireRepository $repo, SupabaseStorageService $supabase): Response
    {
        $type          = $request->query->get('type', 'all');
        $search        = $request->query->get('q', '');
        $clientFilter  = $request->query->get('client', '');
        $accountFilter = $request->query->get('account', '');

        $transactions = $repo->findAllFiltered($type, $search, $clientFilter, $accountFilter);

        $rows = '';
        $totalDepots = $totalRetraits = $totalVirements = 0;
        foreach ($transactions as $t) {
            $m = (float) $t->getMontant();
            if ($t->getType() === TransactionType::DEPOT)    $totalDepots    += $m;
            if ($t->getType() === TransactionType::RETRAIT)  $totalRetraits  += $m;
            if ($t->getType() === TransactionType::VIREMENT) $totalVirements += $m;

            $colorMap = [
                'VIREMENT' => '#2259d6',
                'RETRAIT'  => '#dc2626',
                'DEPOT'    => '#16a34a',
            ];
            $color = $colorMap[$t->getType()->value] ?? '#333';
            $source = $t->getCompteSource()
                ? htmlspecialchars($t->getCompteSource()->getUtilisateur()->getPrenom() . ' ' . $t->getCompteSource()->getUtilisateur()->getNom())
                  . '<br><small>' . $t->getCompteSource()->getNumeroCompte() . '</small>'
                : '-';
            $dest = $t->getCompteDestination()
                ? htmlspecialchars($t->getCompteDestination()->getUtilisateur()->getPrenom() . ' ' . $t->getCompteDestination()->getUtilisateur()->getNom())
                  . '<br><small>' . $t->getCompteDestination()->getNumeroCompte() . '</small>'
                : '-';

            $rows .= '<tr>
                <td style="color:' . $color . ';font-weight:700;">' . $t->getType()->value . '</td>
                <td>' . $source . '</td>
                <td>' . $dest . '</td>
                <td style="color:#64748b;">' . htmlspecialchars($t->getDescription() ?? '-') . '</td>
                <td>' . $t->getDateCreation()->format('d/m/Y H:i') . '</td>
                <td style="text-align:right;font-weight:700;color:' . $color . ';">' . number_format($m, 2, ',', ' ') . ' DT</td>
            </tr>';
        }

        $filterLabel = '';
        if ($type !== 'all') $filterLabel .= " | Type: $type";
        if ($clientFilter)   $filterLabel .= " | Client: $clientFilter";
        if ($accountFilter)  $filterLabel .= " | Compte: $accountFilter";
        if ($search)         $filterLabel .= " | Recherche: $search";

        $html = '<!DOCTYPE html><html><head><style>
            body{font-family:Helvetica,Arial,sans-serif;font-size:10px;color:#1e293b;margin:30px;}
            .header{background:#2259d6;color:#fff;padding:18px 22px;border-radius:8px 8px 0 0;display:flex;justify-content:space-between;align-items:center;}
            .header h1{margin:0;font-size:18px;} .header small{font-size:10px;opacity:0.8;}
            table{width:100%;border-collapse:collapse;margin-top:10px;}
            th{background:#f1f5f9;padding:7px 9px;text-align:left;font-size:9px;text-transform:uppercase;color:#64748b;border-bottom:2px solid #e2e8f0;}
            td{padding:7px 9px;border-bottom:1px solid #f8fafc;vertical-align:top;}
            tr:nth-child(even) td{background:#fafcff;}
            .summary{margin-top:15px;background:#f8fafc;padding:12px;border-radius:6px;display:flex;gap:20px;}
            .sum-item{flex:1;text-align:center;}
            .sum-val{font-size:13px;font-weight:700;}
            .footer{margin-top:20px;text-align:center;color:#94a3b8;font-size:9px;}
        </style></head><body>
        <div class="header">
            <div><h1>UniBank+</h1><small>RAPPORT DES TRANSACTIONS' . htmlspecialchars($filterLabel) . '</small></div>
            <div style="text-align:right;"><small>Genere le ' . date('d/m/Y H:i') . '</small><br><small>' . count($transactions) . ' transactions</small></div>
        </div>
        <table>
            <thead><tr><th>Type</th><th>Source</th><th>Destination</th><th>Description</th><th>Date</th><th style="text-align:right;">Montant</th></tr></thead>
            <tbody>' . ($rows ?: '<tr><td colspan="6" style="text-align:center;color:#94a3b8;padding:20px;">Aucune transaction</td></tr>') . '</tbody>
        </table>
        <div class="summary">
            <div class="sum-item"><div style="color:#16a34a;" class="sum-val">+' . number_format($totalDepots, 2, ',', ' ') . ' DT</div><small>Depots</small></div>
            <div class="sum-item"><div style="color:#dc2626;" class="sum-val">-' . number_format($totalRetraits, 2, ',', ' ') . ' DT</div><small>Retraits</small></div>
            <div class="sum-item"><div style="color:#2259d6;" class="sum-val">' . number_format($totalVirements, 2, ',', ' ') . ' DT</div><small>Virements</small></div>
            <div class="sum-item"><div class="sum-val">' . count($transactions) . '</div><small>Total operations</small></div>
        </div>
        <div class="footer"><p>UniBank+ - Rapport genere electroniquement</p></div>
        </body></html>';

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('defaultFont', 'Helvetica');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $pdfBytes = $dompdf->output();

        $path = $supabase->makePath('admin/transactions', 'Rapport_Transactions');
        $url  = $supabase->upload($path, $pdfBytes);

        if ($url) {
            return new RedirectResponse($url);
        }

        $filename = 'Transactions_' . date('Ymd_His') . '.pdf';
        return new Response($pdfBytes, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}

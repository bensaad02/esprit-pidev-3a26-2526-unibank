<?php

namespace App\Controller\Client;

use App\Entity\Compte;
use App\Entity\TransactionBancaire;
use App\Entity\Utilisateur;
use App\Repository\TransactionBancaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/transactions')]
class TransactionPdfController extends BaseClientController
{
    #[Route('/extrait', name: 'app_client_extrait')]
    public function extrait(Request $request, EntityManagerInterface $em, TransactionBancaireRepository $repo): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();
        $compte = $em->getRepository(Compte::class)->findOneBy(['utilisateur' => $user]);
        if (!$compte) {
            $this->addFlash('error', 'Aucun compte trouve.');
            return $this->redirectToRoute('app_client_transactions');
        }

        $dateFrom = $request->query->get('from') ? new \DateTime($request->query->get('from')) : null;
        $dateTo = $request->query->get('to') ? new \DateTime($request->query->get('to')) : null;

        $transactions = $repo->findByCompte($compte->getIdCompte(), null, null, $dateFrom, $dateTo);

        $html = $this->renderExtraitHtml($user, $compte, $transactions, $dateFrom, $dateTo);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('defaultFont', 'Helvetica');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $filename = 'Extrait_' . $compte->getNumeroCompte() . '_' . date('Ymd') . '.pdf';

        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    #[Route('/receipt/{id}', name: 'app_client_receipt')]
    public function receipt(int $id, EntityManagerInterface $em): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();
        $compte = $em->getRepository(Compte::class)->findOneBy(['utilisateur' => $user]);
        $transaction = $em->getRepository(TransactionBancaire::class)->find($id);

        if (!$transaction || !$compte) {
            $this->addFlash('error', 'Transaction introuvable.');
            return $this->redirectToRoute('app_client_transactions');
        }

        if ($transaction->getCompteSource()?->getIdCompte() !== $compte->getIdCompte()
            && $transaction->getCompteDestination()?->getIdCompte() !== $compte->getIdCompte()) {
            $this->addFlash('error', 'Acces refuse.');
            return $this->redirectToRoute('app_client_transactions');
        }

        $html = $this->renderReceiptHtml($user, $compte, $transaction);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('defaultFont', 'Helvetica');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper([0, 0, 419.53, 595.28], 'portrait');
        $dompdf->render();

        $filename = 'Recu_TXN_' . $id . '.pdf';

        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    private function renderExtraitHtml(Utilisateur $user, Compte $compte, array $transactions, ?\DateTimeInterface $dateFrom, ?\DateTimeInterface $dateTo): string
    {
        $period = '';
        if ($dateFrom && $dateTo) {
            $period = 'Du ' . $dateFrom->format('d/m/Y') . ' au ' . $dateTo->format('d/m/Y');
        } elseif ($dateFrom) {
            $period = 'Depuis le ' . $dateFrom->format('d/m/Y');
        } elseif ($dateTo) {
            $period = "Jusqu'au " . $dateTo->format('d/m/Y');
        }

        $totalIn = 0;
        $totalOut = 0;
        foreach ($transactions as $t) {
            $m = (float) $t->getMontant();
            if ($t->getType() === \App\Enum\TransactionType::DEPOT) {
                $totalIn += $m;
            } elseif ($t->getType() === \App\Enum\TransactionType::RETRAIT) {
                $totalOut += $m;
            } elseif ($t->getType() === \App\Enum\TransactionType::VIREMENT) {
                if ($t->getCompteSource()?->getIdCompte() === $compte->getIdCompte()) {
                    $totalOut += $m;
                } else {
                    $totalIn += $m;
                }
            }
        }

        $rows = '';
        foreach ($transactions as $t) {
            $m = (float) $t->getMontant();
            $isOut = ($t->getType() === \App\Enum\TransactionType::RETRAIT)
                || ($t->getType() === \App\Enum\TransactionType::VIREMENT && $t->getCompteSource()?->getIdCompte() === $compte->getIdCompte());
            $sign = $isOut ? '-' : '+';
            $color = $isOut ? '#dc2626' : '#16a34a';
            $rows .= '<tr>
                <td>' . $t->getDateCreation()->format('d/m/Y H:i') . '</td>
                <td>' . $t->getType()->value . '</td>
                <td>' . htmlspecialchars($t->getDescription() ?? '') . '</td>
                <td style="text-align:right;color:' . $color . ';font-weight:bold;">' . $sign . number_format($m, 2, ',', ' ') . ' DT</td>
            </tr>';
        }

        return '<!DOCTYPE html><html><head><style>
            body{font-family:Helvetica,Arial,sans-serif;font-size:11px;color:#1e293b;margin:30px;}
            .header{background:#2259d6;color:#fff;padding:20px 25px;border-radius:8px 8px 0 0;display:flex;justify-content:space-between;align-items:center;}
            .header h1{margin:0;font-size:20px;}
            .header small{font-size:10px;opacity:0.8;}
            table{width:100%;border-collapse:collapse;margin-top:15px;}
            th{background:#f1f5f9;padding:8px 10px;text-align:left;font-size:10px;text-transform:uppercase;color:#64748b;border-bottom:2px solid #e2e8f0;}
            td{padding:8px 10px;border-bottom:1px solid #f1f5f9;}
            .info-table td{border:none;padding:4px 10px;}
            .info-table .label{color:#64748b;font-weight:bold;width:140px;}
            .summary{margin-top:20px;background:#f8fafc;padding:15px;border-radius:8px;}
            .summary table td{border:none;padding:4px 10px;}
            .footer{margin-top:30px;text-align:center;color:#94a3b8;font-size:9px;}
        </style></head><body>
            <div class="header"><div><h1>UniBank+</h1><small>EXTRAIT DE COMPTE</small></div><div style="text-align:right;"><small>' . ($period ?: 'Toutes les transactions') . '</small><br><small>Genere le ' . date('d/m/Y H:i') . '</small></div></div>
            <table class="info-table" style="margin-top:15px;">
                <tr><td class="label">Titulaire</td><td>' . htmlspecialchars($user->getPrenom() . ' ' . $user->getNom()) . '</td></tr>
                <tr><td class="label">Email</td><td>' . htmlspecialchars($user->getEmail()) . '</td></tr>
                <tr><td class="label">N Compte</td><td><strong>' . $compte->getNumeroCompte() . '</strong></td></tr>
                <tr><td class="label">Type</td><td>' . $compte->getTypeCompte()->value . '</td></tr>
                <tr><td class="label">Solde actuel</td><td style="color:#16a34a;font-weight:bold;">' . number_format((float)$compte->getSolde(), 2, ',', ' ') . ' DT</td></tr>
            </table>
            <table><thead><tr><th>Date</th><th>Type</th><th>Description</th><th style="text-align:right;">Montant</th></tr></thead><tbody>' . ($rows ?: '<tr><td colspan="4" style="text-align:center;color:#94a3b8;padding:20px;">Aucune transaction</td></tr>') . '</tbody></table>
            <div class="summary"><table>
                <tr><td style="color:#16a34a;font-weight:bold;">Total entrees</td><td style="color:#16a34a;font-weight:bold;">+' . number_format($totalIn, 2, ',', ' ') . ' DT</td></tr>
                <tr><td style="color:#dc2626;font-weight:bold;">Total sorties</td><td style="color:#dc2626;font-weight:bold;">-' . number_format($totalOut, 2, ',', ' ') . ' DT</td></tr>
                <tr><td>Nombre de transactions</td><td><strong>' . count($transactions) . '</strong></td></tr>
            </table></div>
            <div class="footer"><p>UniBank+ - Extrait de compte genere electroniquement</p></div>
        </body></html>';
    }

    private function renderReceiptHtml(Utilisateur $user, Compte $compte, TransactionBancaire $t): string
    {
        $m = (float) $t->getMontant();
        $isOut = ($t->getType() === \App\Enum\TransactionType::RETRAIT)
            || ($t->getType() === \App\Enum\TransactionType::VIREMENT && $t->getCompteSource()?->getIdCompte() === $compte->getIdCompte());
        $color = $isOut ? '#dc2626' : '#16a34a';
        $sign = $isOut ? '-' : '+';

        $details = '<tr><td class="label">Type</td><td>' . $t->getType()->value . '</td></tr>
            <tr><td class="label">Date</td><td>' . $t->getDateCreation()->format('d/m/Y H:i') . '</td></tr>';
        if ($t->getDescription()) {
            $details .= '<tr><td class="label">Description</td><td>' . htmlspecialchars($t->getDescription()) . '</td></tr>';
        }
        $details .= '<tr><td class="label">Compte source</td><td>' . ($t->getCompteSource()?->getNumeroCompte() ?? '-') . '</td></tr>';
        if ($t->getType() === \App\Enum\TransactionType::VIREMENT && $t->getCompteDestination()) {
            $details .= '<tr><td class="label">Compte destination</td><td>' . $t->getCompteDestination()->getNumeroCompte() . '</td></tr>';
        }
        $details .= '<tr><td class="label">Titulaire</td><td>' . htmlspecialchars($user->getPrenom() . ' ' . $user->getNom()) . '</td></tr>';

        return '<!DOCTYPE html><html><head><style>
            body{font-family:Helvetica,Arial,sans-serif;font-size:11px;color:#1e293b;margin:30px;}
            .header{background:#2259d6;color:#fff;padding:20px;text-align:center;border-radius:8px 8px 0 0;}
            .header h1{margin:0;font-size:18px;}
            .amount{text-align:center;padding:25px;font-size:28px;font-weight:bold;}
            table{width:100%;border-collapse:collapse;}
            .label{color:#64748b;font-weight:bold;width:140px;padding:6px 10px;}
            td{padding:6px 10px;border-bottom:1px solid #f1f5f9;}
            .footer{margin-top:20px;text-align:center;color:#94a3b8;font-size:9px;}
            .txn-id{text-align:center;color:#64748b;font-size:10px;padding:5px;}
        </style></head><body>
            <div class="header"><h1>UniBank+</h1><small>RECU DE TRANSACTION</small></div>
            <div class="txn-id">TXN-' . str_pad((string)$t->getIdTransaction(), 8, '0', STR_PAD_LEFT) . '</div>
            <div class="amount" style="color:' . $color . ';">' . $sign . number_format($m, 2, ',', ' ') . ' DT</div>
            <table>' . $details . '</table>
            <div class="footer"><p>Ce recu est genere electroniquement et fait foi.</p><p>UniBank+ - ' . date('d/m/Y H:i') . '</p></div>
        </body></html>';
    }
}

<?php

namespace App\Service;

use App\Entity\Contrat;
use App\Entity\Credit;
use App\Enum\TypeContrat;
use Dompdf\Dompdf;
use Dompdf\Options;

class ContractPdfGenerator
{
    public function generate(Credit $credit, Contrat $contrat): string
    {
        $client = $credit->getClient();
        $typeLabel = match ($credit->getTypeContrat()) {
            TypeContrat::PRELEVEMENT_AUTOMATIQUE => 'Prelevement automatique le 5 de chaque mois',
            TypeContrat::PAIEMENT_MENSUEL => 'Paiement mensuel avant le 10 de chaque mois',
            TypeContrat::PAIEMENT_DIFFERE => 'Paiement differe avec taux majore',
            default => '-',
        };
        $penaltyRate = match ($credit->getTypeContrat()) {
            TypeContrat::PRELEVEMENT_AUTOMATIQUE => '1.5%',
            TypeContrat::PAIEMENT_MENSUEL => '3.0%',
            TypeContrat::PAIEMENT_DIFFERE => '2.0%',
            default => '-',
        };

        $amortRows = $this->generateAmortizationRows($credit);

        $html = '<!DOCTYPE html><html><head><style>
            body{font-family:Helvetica,Arial,sans-serif;font-size:11px;color:#1e293b;margin:40px;}
            .header{background:#2259d6;color:#fff;padding:20px 25px;border-radius:8px;text-align:center;margin-bottom:25px;}
            .header h1{margin:0;font-size:22px;}
            .header small{opacity:0.8;}
            h2{color:#2259d6;font-size:14px;border-bottom:2px solid #2259d6;padding-bottom:5px;margin-top:25px;}
            table{width:100%;border-collapse:collapse;margin:10px 0;}
            th{background:#f1f5f9;padding:6px 8px;text-align:left;font-size:10px;text-transform:uppercase;color:#64748b;}
            td{padding:6px 8px;border-bottom:1px solid #f1f5f9;font-size:11px;}
            .info-row td{border:none;padding:4px 8px;}
            .info-row .label{color:#64748b;font-weight:bold;width:160px;}
            .signature{margin-top:40px;display:flex;justify-content:space-between;}
            .sig-box{width:45%;border-top:1px solid #ccc;padding-top:10px;text-align:center;color:#64748b;font-size:10px;}
            .footer{margin-top:30px;text-align:center;color:#94a3b8;font-size:9px;border-top:1px solid #e2e8f0;padding-top:15px;}
            .highlight{background:#f0f9ff;padding:10px;border-radius:6px;border-left:3px solid #2259d6;margin:10px 0;}
        </style></head><body>
            <div class="header">
                <h1>UniBank+</h1>
                <small>CONTRAT DE CREDIT BANCAIRE</small><br>
                <small>N ' . htmlspecialchars($contrat->getNumeroContrat()) . '</small>
            </div>

            <h2>Parties</h2>
            <table class="info-row">
                <tr><td class="label">Preteur</td><td>UniBank+ - Etablissement bancaire</td></tr>
                <tr><td class="label">Emprunteur</td><td>' . htmlspecialchars($client->getPrenom() . ' ' . $client->getNom()) . '</td></tr>
                <tr><td class="label">Email</td><td>' . htmlspecialchars($client->getEmail()) . '</td></tr>
                <tr><td class="label">CIN</td><td>' . htmlspecialchars($client->getCin()) . '</td></tr>
                <tr><td class="label">Adresse</td><td>' . htmlspecialchars($client->getAdresse()) . '</td></tr>
            </table>

            <h2>Article 1 - Objet du contrat</h2>
            <p>Le present contrat definit les conditions du credit accorde par UniBank+ a l\'emprunteur.</p>

            <h2>Article 2 - Conditions du credit</h2>
            <table>
                <tr><th>Element</th><th>Valeur</th></tr>
                <tr><td>Montant du credit</td><td><strong>' . number_format((float)$credit->getMontant(), 2, ',', ' ') . ' DT</strong></td></tr>
                <tr><td>Taux d\'interet annuel</td><td>' . $credit->getTauxInteret() . '%</td></tr>
                <tr><td>Duree</td><td>' . $credit->getDureeEnMois() . ' mois (' . round($credit->getDureeEnMois() / 12, 1) . ' ans)</td></tr>
                <tr><td>Mensualite</td><td><strong>' . number_format((float)$credit->getMensualite(), 2, ',', ' ') . ' DT</strong></td></tr>
                <tr><td>Montant total a rembourser</td><td>' . number_format((float)$credit->getMontantTotal(), 2, ',', ' ') . ' DT</td></tr>
                <tr><td>Cout du credit</td><td>' . number_format($credit->getCoutCredit(), 2, ',', ' ') . ' DT</td></tr>
            </table>

            <h2>Article 3 - Motif de la demande</h2>
            <div class="highlight">' . htmlspecialchars($credit->getMotifDemande() ?? '-') . '</div>

            <h2>Article 4 - Modalites de paiement</h2>
            <p><strong>Mode:</strong> ' . $typeLabel . '</p>
            <p><strong>Debut des paiements:</strong> ' . ($credit->getDateDebutPaiement() ? $credit->getDateDebutPaiement()->format('d/m/Y') : '-') . '</p>

            <h2>Article 5 - Penalites de retard</h2>
            <p>En cas de retard de paiement, une penalite de <strong>' . $penaltyRate . '</strong> du montant de la mensualite sera appliquee par jour de retard.</p>

            <h2>Article 6 - Tableau d\'amortissement (extrait)</h2>
            <table>
                <thead><tr><th>Mois</th><th>Mensualite</th><th>Capital</th><th>Interets</th><th>Restant</th></tr></thead>
                <tbody>' . $amortRows . '</tbody>
            </table>

            <h2>Article 7 - Obligations</h2>
            <p>L\'emprunteur s\'engage a rembourser les mensualites aux dates prevues et a informer la banque de tout changement de situation.</p>

            <h2>Article 8 - Remboursement anticipe</h2>
            <p>L\'emprunteur peut rembourser par anticipation sans penalite apres 12 mois de paiement.</p>

            <div style="margin-top:50px;">
                <table style="width:100%;"><tr>
                    <td style="width:45%;border-top:1px solid #ccc;padding-top:10px;text-align:center;color:#64748b;font-size:10px;">Pour UniBank+<br>Le Directeur</td>
                    <td style="width:10%;"></td>
                    <td style="width:45%;border-top:1px solid #ccc;padding-top:10px;text-align:center;color:#64748b;font-size:10px;">L\'emprunteur<br>' . htmlspecialchars($client->getPrenom() . ' ' . $client->getNom()) . '</td>
                </tr></table>
            </div>

            <div class="footer">
                <p>UniBank+ - Contrat genere le ' . date('d/m/Y a H:i') . '</p>
                <p>Ce document fait foi de contrat entre les deux parties.</p>
            </div>
        </body></html>';

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('defaultFont', 'Helvetica');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->output();
    }

    private function generateAmortizationRows(Credit $credit): string
    {
        $montant = (float) $credit->getMontant();
        $taux = (float) $credit->getTauxInteret();
        $duree = $credit->getDureeEnMois();
        $mensualite = (float) $credit->getMensualite();
        $tauxMensuel = $taux / 100 / 12;
        $remaining = $montant;
        $rows = '';
        $maxRows = min($duree, 12);

        for ($i = 1; $i <= $maxRows; $i++) {
            $interest = $remaining * $tauxMensuel;
            $capital = $mensualite - $interest;
            if ($i === $duree) {
                $capital = $remaining;
                $mensualite = $capital + $interest;
            }
            $remaining -= $capital;
            if ($remaining < 0) $remaining = 0;

            $rows .= '<tr>
                <td>' . $i . '</td>
                <td>' . number_format($mensualite, 2, ',', ' ') . '</td>
                <td>' . number_format($capital, 2, ',', ' ') . '</td>
                <td>' . number_format($interest, 2, ',', ' ') . '</td>
                <td>' . number_format($remaining, 2, ',', ' ') . '</td>
            </tr>';
        }

        if ($duree > 12) {
            $rows .= '<tr><td colspan="5" style="text-align:center;color:#94a3b8;">... ' . ($duree - 12) . ' mois restants ...</td></tr>';
        }

        return $rows;
    }
}

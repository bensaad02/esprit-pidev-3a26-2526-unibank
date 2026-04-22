<?php

namespace App\Service;

use App\Entity\Contrat;
use App\Entity\Utilisateur;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ContractBrevoService
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private string $brevoApiKey,
        private string $brevoSenderEmail,
        private string $brevoSenderName,
    ) {
    }

    public function isConfigured(): bool
    {
        return trim($this->brevoApiKey) !== '' && trim($this->brevoSenderEmail) !== '';
    }

    /**
     * @throws ExceptionInterface
     */
    public function sendContractEmail(Utilisateur $client, Contrat $contrat, string $pdfBytes): void
    {
        if (!$this->isConfigured() || !$client->getEmail()) {
            return;
        }

        $clientName = trim(($client->getPrenom() ?? '') . ' ' . ($client->getNom() ?? ''));
        $numeroContrat = $contrat->getNumeroContrat();
        $dateDebut = $contrat->getDateDebut()?->format('d/m/Y') ?? '-';
        $dateFin = $contrat->getDateFin()?->format('d/m/Y') ?? '-';
        $montant = number_format((float) $contrat->getMontantCredit(), 2, ',', ' ');

        $html = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background:#f4f7fb; margin:0; padding:24px; }
        .card { max-width:640px; margin:0 auto; background:#ffffff; border-radius:16px; overflow:hidden; border:1px solid #e5e7eb; }
        .header { background:linear-gradient(135deg, #1d4ed8, #3b82f6); padding:28px; color:#fff; }
        .content { padding:28px; color:#334155; line-height:1.65; }
        .info { background:#eff6ff; border:1px solid #bfdbfe; border-radius:12px; padding:16px; margin:20px 0; }
        .footer { padding:20px 28px 28px; color:#64748b; font-size:12px; }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <h1 style="margin:0;font-size:28px;">UniBank+</h1>
            <p style="margin:8px 0 0;">Votre contrat de credit est pret</p>
        </div>
        <div class="content">
            <p>Bonjour {$clientName},</p>
            <p>Votre contrat de credit a ete finalise par notre administration. Vous trouverez le PDF en piece jointe.</p>
            <div class="info">
                <strong>Numero du contrat :</strong> {$numeroContrat}<br>
                <strong>Montant du credit :</strong> {$montant} DT<br>
                <strong>Date de debut :</strong> {$dateDebut}<br>
                <strong>Date de fin :</strong> {$dateFin}
            </div>
HTML;

        $html .= <<<HTML
            <p style="margin-top:24px;">Merci de conserver ce document.</p>
        </div>
        <div class="footer">
            Cet email a ete envoye automatiquement par UniBank+ via Brevo.
        </div>
    </div>
</body>
</html>
HTML;

        $this->httpClient->request('POST', 'https://api.brevo.com/v3/smtp/email', [
            'headers' => [
                'api-key' => $this->brevoApiKey,
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
            'json' => [
                'sender' => [
                    'name' => $this->brevoSenderName,
                    'email' => $this->brevoSenderEmail,
                ],
                'to' => [[
                    'email' => $client->getEmail(),
                    'name' => $clientName,
                ]],
                'subject' => 'Votre contrat UniBank+ ' . $numeroContrat,
                'htmlContent' => $html,
                'attachment' => [[
                    'name' => 'Contrat_' . $numeroContrat . '.pdf',
                    'content' => base64_encode($pdfBytes),
                ]],
            ],
        ])->getContent();
    }
}

<?php

// Namespace du service dans l'application.
namespace App\Service;

// Entite contrat utilisee pour les donnees de l'email.
use App\Entity\Contrat;
// Entite utilisateur utilisee comme destinataire.
use App\Entity\Utilisateur;
// Exception possible lors des appels HTTP.
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
// Client HTTP Symfony pour appeler l'API Brevo.
use Symfony\Contracts\HttpClient\HttpClientInterface;

// Service charge d'envoyer les contrats par email via Brevo.
class ContractBrevoService
{
    public function __construct(
        // Client HTTP injecte par Symfony.
        private HttpClientInterface $httpClient,
        // Cle API Brevo.
        private string $brevoApiKey,
        // Email de l'expediteur.
        private string $brevoSenderEmail,
        // Nom de l'expediteur.
        private string $brevoSenderName,
    ) {}

    // Verifie si Brevo est correctement configure.
    public function isConfigured(): bool
    {
        // Retourne true si la cle API et l'email expediteur existent.
        return trim($this->brevoApiKey) !== '' && trim($this->brevoSenderEmail) !== '';
    }

    /**
     * @throws ExceptionInterface
     */
    // Envoie le contrat PDF au client via Brevo.
    public function sendContractEmail(Utilisateur $client, Contrat $contrat, string $pdfBytes): void
    {
        // Arrete l'envoi si Brevo n'est pas configure ou si le client n'a pas d'email.
        if (!$this->isConfigured() || !$client->getEmail()) {
            return;
        }

        // Construit le nom complet du client.
        $clientName = trim(($client->getPrenom() ?? '') . ' ' . ($client->getNom() ?? ''));
        // Recupere le numero du contrat.
        $numeroContrat = $contrat->getNumeroContrat();
        // Formate la date de debut.
        $dateDebut = $contrat->getDateDebut()?->format('d/m/Y') ?? '-';
        // Formate la date de fin.
        $dateFin = $contrat->getDateFin()?->format('d/m/Y') ?? '-';
        // Formate le montant du credit.
        $montant = number_format((float) $contrat->getMontantCredit(), 2, ',', ' ');

        // Construit la premiere partie du contenu HTML de l'email.
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

        // Ajoute la fin du contenu HTML de l'email.
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

        // Envoie une requete POST a l'API Brevo pour expedier l'email.
        $this->httpClient->request('POST', 'https://api.brevo.com/v3/smtp/email', [
            // En-tetes HTTP utilises par Brevo.
            'headers' => [
                // Cle API Brevo.
                'api-key' => $this->brevoApiKey,
                // Format de reponse attendu.
                'accept' => 'application/json',
                // Type du contenu envoye.
                'content-type' => 'application/json',
            ],
            // Corps JSON de l'email a envoyer.
            'json' => [
                // Definit l'expediteur.
                'sender' => [
                    'name' => $this->brevoSenderName,
                    'email' => $this->brevoSenderEmail,
                ],
                // Definit le destinataire.
                'to' => [[
                    'email' => $client->getEmail(),
                    'name' => $clientName,
                ]],
                // Sujet de l'email.
                'subject' => 'Votre contrat UniBank+ ' . $numeroContrat,
                // Contenu HTML de l'email.
                'htmlContent' => $html,
                // Piece jointe PDF encodee en base64.
                'attachment' => [[
                    'name' => 'Contrat_' . $numeroContrat . '.pdf',
                    'content' => base64_encode($pdfBytes),
                ]],
            ],
            // Force l'execution de la requete et recupere la reponse.
        ])->getContent();
    }
}

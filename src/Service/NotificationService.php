<?php
// src/Service/NotificationService.php
namespace App\Service;

use App\Entity\Reclamation;
use App\Entity\Utilisateur;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;
use Psr\Log\LoggerInterface;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class NotificationService
{
    public function __construct(
        private MailerInterface $mailer,
        private Environment $twig,
        private LoggerInterface $logger,
        private string $mailFromAddress,
        private string $mailFromName,
        private string $appUrl
    ) {
    }

    /**
     * Génère un QR code pour le suivi de réclamation
     */
    private function generateQrCode(string $url): string
    {
        try {
            $qrCode = new QrCode($url);
            
            if (method_exists($qrCode, 'setSize')) {
                $qrCode->setSize(200);
            }
            
            $writer = new PngWriter();
            $result = $writer->write($qrCode);
            $imageData = $result->getString();
            
            if (empty($imageData)) {
                throw new \Exception('Image générée vide');
            }
            
            return 'data:image/png;base64,' . base64_encode($imageData);
            
        } catch (\Exception $e) {
            $this->logger->error('QR Code failed: ' . $e->getMessage());
            return "https://quickchart.io/qr?text=" . urlencode($url) . "&size=200";
        }
    }

    /**
     * Génère l'URL de suivi à partir de l'ID et du sujet
     */
    private function generateSuiviUrl(Reclamation $reclamation): string
    {
        // Nettoyer le sujet pour l'URL (supprimer accents, espaces, caractères spéciaux)
        $sujet = $reclamation->getSujet();
        $sujet = strtolower($sujet);
        $sujet = preg_replace('/[^a-z0-9]+/', '-', $sujet);
        $sujet = trim($sujet, '-');
        
        // URL de la forme: /suivi/24-probleme-application
        return $this->appUrl . '/suivi/' . $reclamation->getId() . '-' . $sujet;
    }

    public function notifierNouvelleReponse(Reclamation $reclamation, Utilisateur $utilisateur, string $reponse, string $auteur): bool
    {
        try {
            // Générer l'URL de suivi (plus de token)
            $suiviUrl = $this->generateSuiviUrl($reclamation);
            
            // Générer le QR code
            $qrCodeUrl = $this->generateQrCode($suiviUrl);

            $htmlContent = $this->twig->render('emails/nouvelle_reponse.html.twig', [
                'reclamation' => $reclamation,
                'utilisateur' => $utilisateur,
                'reponse' => $reponse,
                'auteur' => $auteur,
                'qrCodeUrl' => $qrCodeUrl,
                'suiviUrl' => $suiviUrl
            ]);

            $email = (new Email())
                ->from($this->mailFromAddress)
                ->to($utilisateur->getEmail())
                ->subject('💬 Nouvelle réponse à votre réclamation #' . $reclamation->getId() . ' - UniBank+')
                ->html($htmlContent);

            $this->mailer->send($email);
            
            $this->logger->info('Email de réponse envoyé', [
                'reclamation_id' => $reclamation->getId(),
                'to' => $utilisateur->getEmail(),
                'suiviUrl' => $suiviUrl
            ]);
            
            return true;
        } catch (\Exception $e) {
            $this->logger->error('Erreur envoi email réponse: ' . $e->getMessage());
            return false;
        }
    }

    public function notifierReclamationTraitee(Reclamation $reclamation, Utilisateur $utilisateur): bool
    {
        try {
            // Générer l'URL de suivi (plus de token)
            $suiviUrl = $this->generateSuiviUrl($reclamation);
            
            // Générer le QR code
            $qrCodeUrl = $this->generateQrCode($suiviUrl);

            $htmlContent = $this->twig->render('emails/reclamation_traitee.html.twig', [
                'reclamation' => $reclamation,
                'utilisateur' => $utilisateur,
                'qrCodeUrl' => $qrCodeUrl,
                'suiviUrl' => $suiviUrl
            ]);

            $email = (new Email())
                ->from($this->mailFromAddress)
                ->to($utilisateur->getEmail())
                ->subject('✅ Réclamation #' . $reclamation->getId() . ' traitée - UniBank+')
                ->html($htmlContent);

            $this->mailer->send($email);
            
            $this->logger->info('Email de traitement envoyé', [
                'reclamation_id' => $reclamation->getId(),
                'to' => $utilisateur->getEmail(),
                'suiviUrl' => $suiviUrl
            ]);
            
            return true;
        } catch (\Exception $e) {
            $this->logger->error('Erreur envoi email traitement: ' . $e->getMessage());
            return false;
        }
    }
}
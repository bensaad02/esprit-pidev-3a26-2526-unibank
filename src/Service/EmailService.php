<?php

namespace App\Service;

use App\Entity\Credit;
use App\Entity\Utilisateur;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class EmailService
{
    public function __construct(
        private MailerInterface $mailer,
        private string $mailFromAddress,
        private string $mailFromName,
    ) {
    }

    private function from(): Address
    {
        return new Address($this->mailFromAddress, $this->mailFromName);
    }

    public function sendVerificationEmail(Utilisateur $user, string $token): void
    {
        $name = $user->getPrenom() . ' ' . $user->getNom();
        $html = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .header { background: linear-gradient(135deg, #2259d6, #2c83fe); padding: 30px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 28px; }
        .content { padding: 40px; }
        .content h2 { color: #333333; margin-top: 0; }
        .content p { color: #666666; line-height: 1.6; }
        .token-box { background-color: #dbeafe; padding: 20px; border-radius: 8px; text-align: center; margin: 25px 0; }
        .token-box code { font-size: 32px; color: #2259d6; font-weight: bold; letter-spacing: 6px; }
        .warning { background-color: #FFF3CD; border: 1px solid #FFECB5; padding: 15px; border-radius: 5px; margin-top: 20px; }
        .warning p { color: #856404; margin: 0; font-size: 13px; }
        .footer { background-color: #f8f8f8; padding: 20px; text-align: center; color: #999999; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>UniBank+</h1>
        </div>
        <div class="content">
            <h2>Bienvenue chez UniBank+, {$name} !</h2>
            <p>Merci de vous etre inscrit sur UniBank+. Pour activer votre compte et acceder a tous nos services bancaires, veuillez verifier votre adresse email.</p>
            <p>Utilisez ce code de verification :</p>
            <div class="token-box">
                <code>{$token}</code>
            </div>
            <div class="warning">
                <p><strong>Important :</strong> Ce code expire dans 24 heures. Si vous ne verifiez pas votre compte dans ce delai, vous devrez demander un nouveau code.</p>
            </div>
            <p style="margin-top: 20px;">Si vous n'avez pas cree de compte sur UniBank+, veuillez ignorer cet email.</p>
        </div>
        <div class="footer">
            <p>&copy; 2026 UniBank+ - Tous droits reserves</p>
            <p>Cet email a ete envoye automatiquement, merci de ne pas y repondre.</p>
        </div>
    </div>
</body>
</html>
HTML;

        $email = (new Email())
            ->from($this->from())
            ->to($user->getEmail())
            ->subject('Verifiez votre compte UniBank+')
            ->html($html);

        $this->mailer->send($email);
    }

    public function sendWelcomeEmail(Utilisateur $user): void
    {
        $name = $user->getPrenom() . ' ' . $user->getNom();
        $html = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .header { background: linear-gradient(135deg, #2259d6, #2c83fe); padding: 30px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 28px; }
        .content { padding: 40px; }
        .content h2 { color: #333333; margin-top: 0; }
        .content p { color: #666666; line-height: 1.6; }
        .feature-list { list-style: none; padding: 0; }
        .feature-list li { padding: 10px 0; border-bottom: 1px solid #eee; color: #666666; }
        .feature-list li:before { content: "✓ "; color: #2259d6; font-weight: bold; }
        .footer { background-color: #f8f8f8; padding: 20px; text-align: center; color: #999999; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>UniBank+</h1>
        </div>
        <div class="content">
            <h2>Felicitations, {$name} !</h2>
            <p>Votre compte UniBank+ a ete verifie avec succes. Vous pouvez maintenant acceder a tous nos services :</p>
            <ul class="feature-list">
                <li>Gestion de vos comptes bancaires</li>
                <li>Virements et transactions</li>
                <li>Demandes de credit</li>
                <li>Gestion de vos cartes bancaires</li>
                <li>Support client et reclamations</li>
            </ul>
            <p>Connectez-vous des maintenant pour decouvrir votre espace client.</p>
        </div>
        <div class="footer">
            <p>&copy; 2026 UniBank+ - Tous droits reserves</p>
            <p>Cet email a ete envoye automatiquement, merci de ne pas y repondre.</p>
        </div>
    </div>
</body>
</html>
HTML;

        $email = (new Email())
            ->from($this->from())
            ->to($user->getEmail())
            ->subject('Bienvenue chez UniBank+ - Compte verifie !')
            ->html($html);

        $this->mailer->send($email);
    }

    public function sendPasswordResetEmail(Utilisateur $user, string $token): void
    {
        $name = $user->getPrenom() . ' ' . $user->getNom();
        $html = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .header { background: linear-gradient(135deg, #2259d6, #2c83fe); padding: 30px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 28px; }
        .content { padding: 40px; }
        .content h2 { color: #333333; margin-top: 0; }
        .content p { color: #666666; line-height: 1.6; }
        .token-box { background-color: #dbeafe; padding: 20px; border-radius: 8px; text-align: center; margin: 25px 0; }
        .token-box code { font-size: 32px; color: #2259d6; font-weight: bold; letter-spacing: 6px; }
        .warning { background-color: #FFF3CD; border: 1px solid #FFECB5; padding: 15px; border-radius: 5px; margin-top: 20px; }
        .warning p { color: #856404; margin: 0; font-size: 13px; }
        .footer { background-color: #f8f8f8; padding: 20px; text-align: center; color: #999999; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>UniBank+</h1>
        </div>
        <div class="content">
            <h2>Bonjour {$name},</h2>
            <p>Vous avez demande la reinitialisation de votre mot de passe. Utilisez le code ci-dessous :</p>
            <div class="token-box">
                <code>{$token}</code>
            </div>
            <div class="warning">
                <p><strong>Important :</strong> Ce code expire dans 1 heure. Si vous n'avez pas fait cette demande, ignorez cet email et votre mot de passe restera inchange.</p>
            </div>
        </div>
        <div class="footer">
            <p>&copy; 2026 UniBank+ - Tous droits reserves</p>
            <p>Cet email a ete envoye automatiquement, merci de ne pas y repondre.</p>
        </div>
    </div>
</body>
</html>
HTML;

        $email = (new Email())
            ->from($this->from())
            ->to($user->getEmail())
            ->subject('Reinitialisation de votre mot de passe UniBank+')
            ->html($html);

        $this->mailer->send($email);
    }

    public function sendBanEmail(Utilisateur $user): void
    {
        $name = $user->getPrenom() . ' ' . $user->getNom();
        $html = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .header { background: linear-gradient(135deg, #dc2626, #ef4444); padding: 30px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 28px; }
        .content { padding: 40px; }
        .content h2 { color: #333333; margin-top: 0; }
        .content p { color: #666666; line-height: 1.6; }
        .footer { background-color: #f8f8f8; padding: 20px; text-align: center; color: #999999; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>UniBank+</h1>
        </div>
        <div class="content">
            <h2>Bonjour {$name},</h2>
            <p>Nous vous informons que votre compte UniBank+ a ete suspendu par notre equipe d'administration.</p>
            <p>Vous ne pouvez plus acceder a votre espace client jusqu'a nouvel ordre.</p>
            <p>Si vous pensez qu'il s'agit d'une erreur, veuillez contacter notre support.</p>
        </div>
        <div class="footer">
            <p>&copy; 2026 UniBank+ - Tous droits reserves</p>
        </div>
    </div>
</body>
</html>
HTML;

        $email = (new Email())
            ->from($this->from())
            ->to($user->getEmail())
            ->subject('Votre compte UniBank+ a ete suspendu')
            ->html($html);

        $this->mailer->send($email);
    }

    public function sendUnbanEmail(Utilisateur $user): void
    {
        $name = $user->getPrenom() . ' ' . $user->getNom();
        $html = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .header { background: linear-gradient(135deg, #16a34a, #22c55e); padding: 30px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 28px; }
        .content { padding: 40px; }
        .content h2 { color: #333333; margin-top: 0; }
        .content p { color: #666666; line-height: 1.6; }
        .footer { background-color: #f8f8f8; padding: 20px; text-align: center; color: #999999; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>UniBank+</h1>
        </div>
        <div class="content">
            <h2>Bonjour {$name},</h2>
            <p>Bonne nouvelle ! Votre compte UniBank+ a ete reactive.</p>
            <p>Vous pouvez a nouveau acceder a votre espace client et a tous nos services bancaires.</p>
            <p>Nous vous souhaitons une bonne experience sur UniBank+.</p>
        </div>
        <div class="footer">
            <p>&copy; 2026 UniBank+ - Tous droits reserves</p>
        </div>
    </div>
</body>
</html>
HTML;

        $email = (new Email())
            ->from($this->from())
            ->to($user->getEmail())
            ->subject('Votre compte UniBank+ a ete reactive')
            ->html($html);

        $this->mailer->send($email);
    }

    public function sendCreditApprovedEmail(Utilisateur $user, Credit $credit): void
    {
        $name = $user->getPrenom() . ' ' . $user->getNom();
        $montant = number_format((float) $credit->getMontant(), 2, ',', ' ');
        $mensualite = number_format((float) $credit->getMensualite(), 2, ',', ' ');
        $duree = (int) $credit->getDureeEnMois();

        $html = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .header { background: linear-gradient(135deg, #16a34a, #22c55e); padding: 30px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 28px; }
        .content { padding: 40px; }
        .content h2 { color: #333333; margin-top: 0; }
        .content p { color: #666666; line-height: 1.6; }
        .info-box { background-color: #f0fdf4; border: 1px solid #bbf7d0; padding: 18px; border-radius: 8px; margin: 25px 0; }
        .info-box p { margin: 6px 0; color: #166534; }
        .footer { background-color: #f8f8f8; padding: 20px; text-align: center; color: #999999; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>UniBank+</h1>
        </div>
        <div class="content">
            <h2>Bonjour {$name},</h2>
            <p>Bonne nouvelle, votre demande de credit a ete approuvee par notre equipe.</p>
            <div class="info-box">
                <p><strong>Montant :</strong> {$montant} DT</p>
                <p><strong>Mensualite :</strong> {$mensualite} DT</p>
                <p><strong>Duree :</strong> {$duree} mois</p>
            </div>
            <p>Vous pouvez maintenant vous connecter a votre espace client pour consulter les details et poursuivre les prochaines etapes de votre dossier.</p>
        </div>
        <div class="footer">
            <p>&copy; 2026 UniBank+ - Tous droits reserves</p>
            <p>Cet email a ete envoye automatiquement, merci de ne pas y repondre.</p>
        </div>
    </div>
</body>
</html>
HTML;

        $email = (new Email())
            ->from($this->from())
            ->to($user->getEmail())
            ->subject('Votre demande de credit a ete approuvee')
            ->html($html);

        $this->mailer->send($email);
    }
}

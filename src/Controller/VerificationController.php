<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Service\EmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VerificationController extends AbstractController
{
    #[Route('/verification', name: 'app_verification')]
    public function verify(Request $request, EntityManagerInterface $em, EmailService $emailService): Response
    {
        $email = $request->query->get('email', '');

        if ($request->isMethod('POST')) {
            $code = trim($request->request->get('code', ''));
            $email = $request->request->get('email', '');

            if (empty($code)) {
                $this->addFlash('error', 'Veuillez entrer le code de verification.');
                return $this->render('security/verification.html.twig', ['email' => $email]);
            }

            $user = $em->getRepository(Utilisateur::class)->findOneBy([
                'email' => $email,
                'verificationToken' => $code,
            ]);

            if (!$user) {
                $this->addFlash('error', 'Code invalide ou expire. Veuillez verifier et reessayer.');
                return $this->render('security/verification.html.twig', ['email' => $email]);
            }

            if ($user->getTokenExpiry() < new \DateTime()) {
                $this->addFlash('error', 'Le code a expire. Veuillez demander un nouveau code.');
                return $this->render('security/verification.html.twig', ['email' => $email]);
            }

            $user->setIsVerified(true);
            $user->setVerificationToken(null);
            $user->setTokenExpiry(null);
            $em->flush();

            try {
                $emailService->sendWelcomeEmail($user);
            } catch (\Exception $e) {
            }

            $this->addFlash('success', 'Email verifie avec succes ! Vous pouvez maintenant vous connecter.');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/verification.html.twig', ['email' => $email]);
    }

    #[Route('/verification/resend', name: 'app_verification_resend')]
    public function resend(Request $request, EntityManagerInterface $em, EmailService $emailService): Response
    {
        $email = $request->query->get('email', '');

        if (empty($email)) {
            $this->addFlash('error', 'Email non specifie.');
            return $this->redirectToRoute('app_login');
        }

        $user = $em->getRepository(Utilisateur::class)->findOneBy(['email' => $email]);

        if (!$user || $user->isVerified()) {
            $this->addFlash('error', 'Compte introuvable ou deja verifie.');
            return $this->redirectToRoute('app_login');
        }

        $token = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));
        $user->setVerificationToken($token);
        $user->setTokenExpiry(new \DateTime('+24 hours'));
        $em->flush();

        try {
            $emailService->sendVerificationEmail($user, $token);
            $this->addFlash('success', 'Un nouveau code a ete envoye a ' . $email);
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de l\'envoi de l\'email.');
        }

        return $this->redirectToRoute('app_verification', ['email' => $email]);
    }
}

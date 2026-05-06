<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Service\EmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class PasswordResetController extends AbstractController
{
    #[Route('/forgot-password', name: 'app_forgot_password')]
    public function forgotPassword(Request $request, EntityManagerInterface $em, EmailService $emailService): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        if ($request->isMethod('POST')) {
            $email = trim($request->request->get('email', ''));

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $this->render('security/forgot_password.html.twig', [
                    'error' => 'Veuillez entrer une adresse email valide.',
                    'email' => $email,
                ]);
            }

            $user = $em->getRepository(Utilisateur::class)->findOneBy(['email' => $email]);

            if ($user && $user->isVerified() && $user->isEstActif()) {
                $token = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));
                $user->setVerificationToken($token);
                $user->setTokenExpiry(new \DateTime('+1 hour'));
                $em->flush();

                try {
                    $emailService->sendPasswordResetEmail($user, $token);
                } catch (\Exception $e) {
                }
            }

            return $this->redirectToRoute('app_forgot_password_verify', ['email' => $email]);
        }

        return $this->render('security/forgot_password.html.twig', ['error' => null, 'email' => '']);
    }

    #[Route('/forgot-password/verify', name: 'app_forgot_password_verify')]
    public function verify(Request $request, EntityManagerInterface $em): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $email = $request->query->get('email', '');

        if ($request->isMethod('POST')) {
            $code = strtoupper(trim($request->request->get('code', '')));
            $email = $request->request->get('email', '');

            if (empty($code)) {
                return $this->render('security/forgot_password_verify.html.twig', [
                    'email' => $email,
                    'error' => 'Veuillez entrer le code recu par email.',
                ]);
            }

            $user = $em->getRepository(Utilisateur::class)->findOneBy([
                'email' => $email,
                'verificationToken' => $code,
            ]);

            if (!$user) {
                return $this->render('security/forgot_password_verify.html.twig', [
                    'email' => $email,
                    'error' => 'Code invalide. Veuillez verifier et reessayer.',
                ]);
            }

            if ($user->getTokenExpiry() < new \DateTime()) {
                return $this->render('security/forgot_password_verify.html.twig', [
                    'email' => $email,
                    'error' => 'Ce code a expire. Veuillez faire une nouvelle demande.',
                ]);
            }

            $request->getSession()->set('reset_pwd_email', $email);
            $request->getSession()->set('reset_pwd_token', $code);
            $request->getSession()->set('reset_pwd_at', time());

            return $this->redirectToRoute('app_forgot_password_new');
        }

        return $this->render('security/forgot_password_verify.html.twig', ['email' => $email, 'error' => null]);
    }

    #[Route('/forgot-password/new', name: 'app_forgot_password_new')]
    public function newPassword(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $session = $request->getSession();
        $email     = $session->get('reset_pwd_email');
        $token     = $session->get('reset_pwd_token');
        $verifiedAt = $session->get('reset_pwd_at');

        if (!$email || !$token || !$verifiedAt || (time() - $verifiedAt) > 900) {
            $this->addFlash('error', 'Session expiree. Veuillez recommencer.');
            return $this->redirectToRoute('app_forgot_password');
        }

        if ($request->isMethod('POST')) {
            $password = $request->request->get('password', '');
            $confirm  = $request->request->get('confirm', '');
            $errors   = [];

            if (strlen($password) < 8) {
                $errors['password'] = 'Le mot de passe doit contenir au moins 8 caracteres.';
            } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/', $password)) {
                $errors['password'] = 'Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre.';
            } elseif ($password !== $confirm) {
                $errors['confirm'] = 'Les mots de passe ne correspondent pas.';
            }

            if (!empty($errors)) {
                return $this->render('security/forgot_password_new.html.twig', ['errors' => $errors]);
            }

            $user = $em->getRepository(Utilisateur::class)->findOneBy([
                'email' => $email,
                'verificationToken' => $token,
            ]);

            if (!$user || $user->getTokenExpiry() < new \DateTime()) {
                $session->remove('reset_pwd_email');
                $session->remove('reset_pwd_token');
                $session->remove('reset_pwd_at');
                $this->addFlash('error', 'Session invalide ou expiree. Veuillez recommencer.');
                return $this->redirectToRoute('app_forgot_password');
            }

            $user->setMotDePasse($passwordHasher->hashPassword($user, $password));
            $user->setVerificationToken(null);
            $user->setTokenExpiry(null);
            $em->flush();

            $session->remove('reset_pwd_email');
            $session->remove('reset_pwd_token');
            $session->remove('reset_pwd_at');

            $this->addFlash('success', 'Mot de passe modifie avec succes ! Vous pouvez maintenant vous connecter.');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/forgot_password_new.html.twig', ['errors' => []]);
    }

    #[Route('/forgot-password/resend', name: 'app_forgot_password_resend')]
    public function resend(Request $request, EntityManagerInterface $em, EmailService $emailService): Response
    {
        $email = $request->query->get('email', '');

        if (empty($email)) {
            return $this->redirectToRoute('app_forgot_password');
        }

        $user = $em->getRepository(Utilisateur::class)->findOneBy(['email' => $email]);

        if ($user && $user->isVerified() && $user->isEstActif()) {
            $token = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));
            $user->setVerificationToken($token);
            $user->setTokenExpiry(new \DateTime('+1 hour'));
            $em->flush();

            try {
                $emailService->sendPasswordResetEmail($user, $token);
                $this->addFlash('success', 'Un nouveau code a ete envoye a ' . $email);
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de l\'envoi. Veuillez reessayer.');
            }
        } else {
            $this->addFlash('success', 'Si un compte existe avec cet email, un nouveau code a ete envoye.');
        }

        return $this->redirectToRoute('app_forgot_password_verify', ['email' => $email]);
    }
}

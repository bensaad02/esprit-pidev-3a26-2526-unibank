<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Enum\ClientStatus;
use App\Enum\UserType;
use App\Form\RegistrationFormType;
use App\Service\EmailService;
use App\Service\HCaptchaService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $em,
        HCaptchaService $captchaService,
        EmailService $emailService,
    ): Response {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $user = new Utilisateur();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $captchaToken = $request->request->get('h-captcha-response', '');
            if (!$captchaService->verify($captchaToken)) {
                $this->addFlash('error', 'Veuillez completer le captcha.');
                return $this->render('registration/register.html.twig', [
                    'registrationForm' => $form,
                    'hcaptcha_site_key' => $captchaService->getSiteKey(),
                ]);
            }

            $token = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));

            $user->setMotDePasse(
                $passwordHasher->hashPassword($user, $form->get('plainPassword')->getData())
            );
            $user->setRole(UserType::CLIENT);
            $user->setClientStatus(ClientStatus::PENDING);
            $user->setIsVerified(false);
            $user->setEstActif(true);
            $user->setVerificationToken($token);
            $user->setTokenExpiry(new \DateTime('+24 hours'));

            $em->persist($user);
            $em->flush();

            try {
                $emailService->sendVerificationEmail($user, $token);
            } catch (\Exception $e) {
            }

            $this->addFlash('success', 'Compte cree avec succes ! Un email de verification a ete envoye a ' . $user->getEmail());
            return $this->redirectToRoute('app_verification', ['email' => $user->getEmail()]);
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
            'hcaptcha_site_key' => $captchaService->getSiteKey(),
        ]);
    }
}

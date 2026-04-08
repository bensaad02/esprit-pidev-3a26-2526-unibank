<?php

namespace App\Security;

use App\Entity\Utilisateur;
use App\Enum\ClientStatus;
use App\Enum\UserType;
use App\Service\EmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Bundle\SecurityBundle\Security;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    public function __construct(
        private RouterInterface $router,
        private Security $security,
        private EntityManagerInterface $em,
        private EmailService $emailService,
    ) {
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token): RedirectResponse
    {
        $user = $token->getUser();

        if (!$user->isEstActif()) {
            $this->security->logout(false);
            $request->getSession()->getFlashBag()->add('error', 'Votre compte a ete banni. Contactez le support.');
            return new RedirectResponse($this->router->generate('app_login'));
        }

        if (!$user->isVerified()) {
            $newToken = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));
            $user->setVerificationToken($newToken);
            $user->setTokenExpiry(new \DateTime('+24 hours'));
            $this->em->flush();

            try {
                $this->emailService->sendVerificationEmail($user, $newToken);
            } catch (\Exception $e) {
            }

            $this->security->logout(false);
            $request->getSession()->getFlashBag()->add('warning', 'Votre compte n\'est pas verifie. Un nouveau code a ete envoye.');
            return new RedirectResponse($this->router->generate('app_verification', ['email' => $user->getEmail()]));
        }

        if ($user->getRole() === UserType::AGENT) {
            return new RedirectResponse($this->router->generate('app_admin_dashboard'));
        }

        $status = $user->getClientStatus();

        if ($status === ClientStatus::REJECTED) {
            $this->security->logout(false);
            $request->getSession()->getFlashBag()->add('error', 'Votre demande a ete rejetee. Contactez le support.');
            return new RedirectResponse($this->router->generate('app_login'));
        }

        if ($status === ClientStatus::SUSPENDED) {
            $this->security->logout(false);
            $request->getSession()->getFlashBag()->add('error', 'Votre compte est suspendu. Contactez le support.');
            return new RedirectResponse($this->router->generate('app_login'));
        }

        if ($status === ClientStatus::PENDING) {
            if (empty($user->getSelectedOffer())) {
                return new RedirectResponse($this->router->generate('app_offers'));
            }
            return new RedirectResponse($this->router->generate('app_waiting_approval'));
        }

        return new RedirectResponse($this->router->generate('app_client_dashboard'));
    }
}

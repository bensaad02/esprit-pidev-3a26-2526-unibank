<?php

namespace App\EventListener;

use App\Entity\Utilisateur;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Routing\RouterInterface;

class BannedUserListener
{
    public function __construct(
        private Security $security,
        private RouterInterface $router,
    ) {
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        $route = $request->attributes->get('_route');

        $publicRoutes = ['app_home', 'app_login', 'app_logout', 'app_register', 'app_verification', 'app_verification_resend', '_wdt', '_profiler'];
        if (in_array($route, $publicRoutes) || str_starts_with($route ?? '', '_')) {
            return;
        }

        $user = $this->security->getUser();
        if (!$user instanceof Utilisateur) {
            return;
        }

        if (!$user->isEstActif()) {
            $this->security->logout(false);
            $request->getSession()->getFlashBag()->add('error', 'Votre compte a ete banni. Contactez l\'administrateur pour plus d\'informations.');
            $event->setResponse(new RedirectResponse($this->router->generate('app_login')));
        }
    }
}

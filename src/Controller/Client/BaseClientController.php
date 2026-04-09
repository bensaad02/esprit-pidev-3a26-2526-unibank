<?php

namespace App\Controller\Client;

use App\Entity\Utilisateur;
use App\Enum\ClientStatus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

abstract class BaseClientController extends AbstractController
{
    protected function getClientUser(): Utilisateur
    {
        $user = $this->getUser();

        if (!$user instanceof Utilisateur) {
            throw new AccessDeniedException('Client authentication required.');
        }

        return $user;
    }

    protected function checkApproved(): ?Response
    {
        $user = $this->getUser();

        if (!$user instanceof Utilisateur) {
            return $this->redirectToRoute('app_login');
        }

        if ($user->getClientStatus() !== ClientStatus::APPROVED) {
            if (!$user->getSelectedOffer()) {
                return $this->redirectToRoute('app_offers');
            }
            return $this->redirectToRoute('app_waiting_approval');
        }

        return null;
    }
}

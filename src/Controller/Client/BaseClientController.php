<?php

namespace App\Controller\Client;

use App\Entity\Utilisateur;
use App\Enum\ClientStatus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseClientController extends AbstractController
{
    protected function checkApproved(): ?Response
    {
        $user = $this->getUser();

        if (!$user) {
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

<?php

namespace App\Controller\Client;

use App\Entity\Compte;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientDashboardController extends BaseClientController
{
    #[Route('/client/dashboard', name: 'app_client_dashboard')]
    public function dashboard(EntityManagerInterface $em): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();
        $compte = $em->getRepository(Compte::class)->findOneBy(['utilisateur' => $user]);

        return $this->render('client/dashboard.html.twig', [
            'compte' => $compte,
        ]);
    }
}

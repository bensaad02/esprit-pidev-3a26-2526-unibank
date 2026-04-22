<?php

namespace App\Controller\Client;

use App\Entity\Utilisateur;
use App\Enum\ClientStatus;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WaitingApprovalController extends AbstractController
{
    #[Route('/waiting-approval', name: 'app_waiting_approval')]
    public function index(): Response
    {
        $user = $this->getUser();

        if ($user && $user->getClientStatus() === ClientStatus::APPROVED) {
            return $this->redirectToRoute('app_client_dashboard');
        }

        return $this->render('client/waiting.html.twig');
    }

    #[Route('/waiting-approval/check', name: 'app_waiting_check', methods: ['POST'])]
    public function check(EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        $em->refresh($user);

        if ($user->getClientStatus() === ClientStatus::APPROVED) {
            $this->addFlash('success', 'Votre compte a ete approuve ! Bienvenue sur UniBank+.');
            return $this->redirectToRoute('app_client_dashboard');
        }

        if ($user->getClientStatus() === ClientStatus::REJECTED) {
            $this->addFlash('error', 'Votre demande a ete rejetee. Contactez le support.');
            return $this->redirectToRoute('app_login');
        }

        $this->addFlash('warning', 'Votre demande est toujours en cours de traitement. Veuillez patienter.');
        return $this->redirectToRoute('app_waiting_approval');
    }
}

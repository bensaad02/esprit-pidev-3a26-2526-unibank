<?php

namespace App\Controller\Client;

use App\Entity\Utilisateur;
use App\Enum\ClientStatus;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OffersController extends AbstractController
{
    #[Route('/offers', name: 'app_offers')]
    public function index(): Response
    {
        $user = $this->getUser();

        if ($user && $user->getClientStatus() === ClientStatus::APPROVED) {
            return $this->redirectToRoute('app_client_dashboard');
        }

        if ($user && $user->getSelectedOffer()) {
            return $this->redirectToRoute('app_waiting_approval');
        }

        return $this->render('client/offers.html.twig');
    }

    #[Route('/offers/select', name: 'app_offers_select', methods: ['POST'])]
    public function select(Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        $offer = $request->request->get('offer');
        if (!in_array($offer, ['COURANT', 'EPARGNE'])) {
            $this->addFlash('error', 'Veuillez choisir une offre valide.');
            return $this->redirectToRoute('app_offers');
        }

        $user->setSelectedOffer($offer);
        $em->flush();

        $this->addFlash('success', 'Offre selectionnee avec succes ! Votre demande est en cours de traitement.');
        return $this->redirectToRoute('app_waiting_approval');
    }
}

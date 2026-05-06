<?php

namespace App\Controller\Client;

use App\Entity\Compte;
use App\Entity\Credit;
use App\Enum\CreditStatus;
use App\Repository\CreditRepository;

use App\Repository\TransactionBancaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientDashboardController extends BaseClientController
{
    #[Route('/client/dashboard', name: 'app_client_dashboard')]
    public function dashboard(
        EntityManagerInterface $em,
        TransactionBancaireRepository $txRepo,
        CreditRepository $creditRepo,
    ): Response {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();
        $compte = $em->getRepository(Compte::class)->findOneBy(['utilisateur' => $user]);

        $recentTx = [];
        $totalDepots = 0;
        $totalRetraits = 0;
        $txCount = 0;

        if ($compte) {
            $allTx = $txRepo->findByCompte($compte->getIdCompte());
            $txCount = count($allTx);
            $recentTx = array_slice($allTx, 0, 5);

            $now = new \DateTime();
            $startOfMonth = new \DateTime('first day of this month midnight');
            foreach ($allTx as $tx) {
                if ($tx->getDateCreation() >= $startOfMonth) {
                    $type = $tx->getType()->value ?? '';
                    if ($type === 'DEPOT') {
                        $totalDepots += (float)$tx->getMontant();
                    } elseif ($type === 'RETRAIT' || $type === 'VIREMENT') {
                        $totalRetraits += (float)$tx->getMontant();
                    }
                }
            }
        }

        $credits = $creditRepo->findBy(['client' => $user], ['dateCreation' => 'DESC']);
        $activeCredits = array_filter($credits, fn($c) => $c->getStatut() === CreditStatus::ACTIVE);
        $pendingCredits = array_filter($credits, fn($c) => $c->getStatut() === CreditStatus::PENDING);

        $totalMensualite = 0.0;
        foreach ($activeCredits as $c) {
            $totalMensualite += (float)$c->getMensualite();
        }

        return $this->render('client/dashboard.html.twig', [
            'compte'          => $compte,
            'recentTx'        => $recentTx,
            'txCount'         => $txCount,
            'totalDepots'     => $totalDepots,
            'totalRetraits'   => $totalRetraits,
            'credits'         => $credits,
            'activeCredits'   => count($activeCredits),
            'pendingCredits'  => count($pendingCredits),
            'totalMensualite' => $totalMensualite,
        ]);
    }
}

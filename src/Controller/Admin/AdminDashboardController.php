<?php

namespace App\Controller\Admin;

use App\Enum\ClientStatus;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminDashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_admin_dashboard')]
    public function dashboard(UtilisateurRepository $repo): Response
    {
        return $this->render('admin/dashboard.html.twig', [
            'totalClients' => $repo->countClients(),
            'pendingClients' => $repo->countByStatus(ClientStatus::PENDING),
            'approvedClients' => $repo->countByStatus(ClientStatus::APPROVED),
            'rejectedClients' => $repo->countByStatus(ClientStatus::REJECTED),
            'bannedClients' => $repo->countBanned(),
            'recentPending' => $repo->findPendingClients(),
        ]);
    }
}

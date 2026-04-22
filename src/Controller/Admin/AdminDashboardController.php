<?php

namespace App\Controller\Admin;

use App\Enum\ClientStatus;
use App\Enum\CreditStatus;
use App\Enum\TransactionType;
use App\Repository\CompteRepository;
use App\Repository\CreditRepository;
use App\Repository\ReclamationRepository;
use App\Repository\TransactionBancaireRepository;
use App\Repository\UtilisateurRepository;
use App\Service\GrokService;
use App\Service\NewsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminDashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_admin_dashboard')]
    public function dashboard(
        UtilisateurRepository $userRepo,
        CompteRepository $compteRepo,
        CreditRepository $creditRepo,
        TransactionBancaireRepository $txRepo,
        ReclamationRepository $reclaRepo,
    ): Response {
        // KPI counts
        $totalClients      = $userRepo->countClients();
        $pendingClients    = $userRepo->countByStatus(ClientStatus::PENDING);
        $approvedClients   = $userRepo->countByStatus(ClientStatus::APPROVED);
        $rejectedClients   = $userRepo->countByStatus(ClientStatus::REJECTED);
        $bannedClients     = $userRepo->countBanned();
        $approvalRate      = $totalClients > 0 ? round(($approvedClients / $totalClients) * 100) : 0;
        $totalAccounts     = $compteRepo->countAll();
        $activeAccounts    = $compteRepo->countActive();
        $totalSolde        = (float) $compteRepo->totalSolde();
        $totalCredits      = $creditRepo->countAll();
        $activeCredits     = $creditRepo->countByStatus(CreditStatus::ACTIVE);
        $pendingCredits    = $creditRepo->countByStatus(CreditStatus::PENDING);
        $rejectedCredits   = $creditRepo->countByStatus(CreditStatus::REJECTED);
        $creditVolume      = (float) $creditRepo->totalApprovedAmount();
        $totalTransactions = $txRepo->countAll();
        $totalVirements    = $txRepo->countByType(TransactionType::VIREMENT);
        $totalDepots       = $txRepo->countByType(TransactionType::DEPOT);
        $totalRetraits     = $txRepo->countByType(TransactionType::RETRAIT);
        $totalRecla        = $reclaRepo->countAll();
        $pendingRecla      = $reclaRepo->countByStatus('EN_ATTENTE');
        $enCoursRecla      = $reclaRepo->countByStatus('EN_COURS');
        $traitéRecla       = $reclaRepo->countByStatus('TRAITE');
        $rejeteRecla       = $reclaRepo->countByStatus('REJETE');

        // Chart data
        $txLast7Days       = $txRepo->getLast7DaysCounts();
        $txVolumeByType    = $txRepo->getVolumeByType();
        $clientMonthly     = $userRepo->getLast6MonthsRegistrations();

        $sentimentPos      = $reclaRepo->countBySentiment('positif');
        $sentimentNeg      = $reclaRepo->countBySentiment('negatif');
        $sentimentNeu      = $reclaRepo->countBySentiment('neutre');

        return $this->render('admin/dashboard.html.twig', [
            // KPIs
            'totalClients'      => $totalClients,
            'pendingClients'    => $pendingClients,
            'approvedClients'   => $approvedClients,
            'rejectedClients'   => $rejectedClients,
            'bannedClients'     => $bannedClients,
            'approvalRate'      => $approvalRate,
            'totalAccounts'     => $totalAccounts,
            'activeAccounts'    => $activeAccounts,
            'totalSolde'        => $totalSolde,
            'totalCredits'      => $totalCredits,
            'activeCredits'     => $activeCredits,
            'pendingCredits'    => $pendingCredits,
            'rejectedCredits'   => $rejectedCredits,
            'creditVolume'      => $creditVolume,
            'totalTransactions' => $totalTransactions,
            'totalVirements'    => $totalVirements,
            'totalDepots'       => $totalDepots,
            'totalRetraits'     => $totalRetraits,
            'totalRecla'        => $totalRecla,
            'pendingRecla'      => $pendingRecla,
            'enCoursRecla'      => $enCoursRecla,
            'traitéRecla'       => $traitéRecla,
            'rejeteRecla'       => $rejeteRecla,
            'recentPending'     => $userRepo->findPendingClients(),
            // Charts (JSON)
            'txLast7Days'       => $txLast7Days,
            'txVolumeByType'    => $txVolumeByType,
            'clientMonthly'     => $clientMonthly,
            'sentimentPos'      => $sentimentPos,
            'sentimentNeg'      => $sentimentNeg,
            'sentimentNeu'      => $sentimentNeu,
        ]);
    }

    #[Route('/news', name: 'app_admin_news')]
    public function news(NewsService $newsService, Request $request): Response
    {
        $query    = $request->query->get('q', '');
        $articles = $query
            ? $newsService->searchNews($query, 12)
            : $newsService->getFinancialNews(12);

        return $this->render('admin/news.html.twig', [
            'articles' => $articles,
            'query'    => $query,
        ]);
    }

    #[Route('/report', name: 'app_admin_report', methods: ['POST'])]
    public function generateReport(
        GrokService $grokService,
        UtilisateurRepository $userRepo,
        CompteRepository $compteRepo,
        CreditRepository $creditRepo,
        TransactionBancaireRepository $txRepo,
        ReclamationRepository $reclaRepo,
    ): JsonResponse {
        $stats = [
            'total_users'          => $userRepo->countClients(),
            'active_accounts'      => $compteRepo->countActive(),
            'active_credits'       => $creditRepo->countByStatus(CreditStatus::ACTIVE),
            'monthly_transactions' => $txRepo->countAll(),
            'pending_reclamations' => $reclaRepo->countByStatus('EN_ATTENTE'),
            'transaction_volume'   => number_format((float) $compteRepo->totalSolde(), 2),
        ];

        return $this->json(['report' => $grokService->generateDashboardReport($stats)]);
    }
}

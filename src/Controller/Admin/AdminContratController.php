<?php

namespace App\Controller\Admin;

use App\Entity\Contrat;
use App\Enum\CreditStatus;
use App\Repository\ContratRepository;
use App\Repository\CreditRepository;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\BarChart;
use App\Service\ContractPdfGenerator;
use App\Service\SupabaseStorageService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Toutes les routes de ce controller commencent par /admin/contrats
#[Route('/admin/contrats')]
class AdminContratController extends AbstractController
{
    // Affiche la liste des contrats admin avec filtre, recherche et statistiques
    #[Route('', name: 'app_admin_contrats')]
    public function index(Request $request, ContratRepository $repo, CreditRepository $creditRepo): Response
    {
        // Recupere le statut choisi dans l'URL
        $status = $request->query->get('status', 'all');
        // Recupere la recherche saisie dans l'URL
        $search = $request->query->get('q', '');

        // Envoie les donnees necessaires au template Twig
        $approvedCredits = $creditRepo->countApprovedPipeline();
        $finalizedContracts = $repo->countFinalizedPipeline();

        $comparisonChart = new BarChart();
        $comparisonChart->getData()->setArrayToDataTable([
            ['Type', 'Nombre'],
            ['Credits approuves', $approvedCredits],
            ['Contrats finalises', $finalizedContracts],
        ]);

        $comparisonChart->getOptions()->setTitle('Comparaison credits approuves / contrats finalises');
        $comparisonChart->getOptions()->setHeight(260);
        $comparisonChart->getOptions()->getLegend()->setPosition('none');
        $comparisonChart->getOptions()->setColors(['#2259d6']);
        $comparisonChart->getOptions()->getVAxis()->setMinValue(0);

        return $this->render('admin/contrat/index.html.twig', [
            // Liste des contrats filtres
            'contrats' => $repo->findAllFiltered($status, $search),
            // Nombre total de contrats
            'totalContrats' => $repo->countAll(),
            // Nombre de contrats actifs
            'activeContrats' => $repo->countActive(),
            // Donnees pour le graphe de comparaison
            'approvedCredits' => $approvedCredits,
            'finalizedContracts' => $finalizedContracts,
            'comparisonChart' => $comparisonChart,
            // Valeurs renvoyees au formulaire de filtre
            'status' => $status,
            'search' => $search,
        ]);
    }

    // Genere et telecharge le PDF d'un contrat (ou redirige vers Supabase si deja stocke)
    #[Route('/{id}/pdf', name: 'app_admin_contrat_pdf')]
    public function downloadPdf(int $id, EntityManagerInterface $em, ContractPdfGenerator $pdfGen, SupabaseStorageService $supabase): Response
    {
        $contrat = $em->getRepository(Contrat::class)->find($id);
        if (!$contrat) {
            $this->addFlash('error', 'Contrat introuvable.');
            return $this->redirectToRoute('app_admin_contrats');
        }

        // If already stored in Supabase, redirect directly
        if ($contrat->getCheminFichier()) {
            return new RedirectResponse($contrat->getCheminFichier());
        }

        // Generate, upload, store URL, then redirect
        $credit   = $contrat->getCredit();
        $pdfBytes = $pdfGen->generate($credit, $contrat);
        $path     = $supabase->makePath('contracts', 'Contrat_' . $contrat->getNumeroContrat());
        $url      = $supabase->upload($path, $pdfBytes);

        if ($url) {
            $contrat->setCheminFichier($url);
            $em->flush();
            return new RedirectResponse($url);
        }

        return new Response($pdfBytes, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="Contrat_' . $contrat->getNumeroContrat() . '.pdf"',
        ]);
    }
}

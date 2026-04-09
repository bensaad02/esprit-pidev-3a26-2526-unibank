<?php

namespace App\Controller\Admin;

use App\Entity\Contrat;
use App\Entity\Credit;
use App\Repository\ContratRepository;
use App\Service\ContractPdfGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Toutes les routes de ce controller commencent par /admin/contrats
#[Route('/admin/contrats')]
class AdminContratController extends AbstractController
{
    // Affiche la liste des contrats admin avec filtre, recherche et statistiques
    #[Route('', name: 'app_admin_contrats')]
    public function index(Request $request, ContratRepository $repo): Response
    {
        // Recupere le statut choisi dans l'URL
        $status = $request->query->get('status', 'all');
        // Recupere la recherche saisie dans l'URL
        $search = $request->query->get('q', '');

        // Envoie les donnees necessaires au template Twig
        return $this->render('admin/contrat/index.html.twig', [
            // Liste des contrats filtres
            'contrats' => $repo->findAllFiltered($status, $search),
            // Nombre total de contrats
            'totalContrats' => $repo->countAll(),
            // Nombre de contrats actifs
            'activeContrats' => $repo->countActive(),
            // Valeurs renvoyees au formulaire de filtre
            'status' => $status,
            'search' => $search,
        ]);
    }

    // Genere et telecharge le PDF d'un contrat
    #[Route('/{id}/pdf', name: 'app_admin_contrat_pdf')]
    public function downloadPdf(int $id, EntityManagerInterface $em, ContractPdfGenerator $pdfGen): Response
    {
        // Cherche le contrat par son identifiant
        $contrat = $em->getRepository(Contrat::class)->find($id);
        if (!$contrat) {
            // Affiche une erreur si le contrat n'existe pas
            $this->addFlash('error', 'Contrat introuvable.');
            return $this->redirectToRoute('app_admin_contrats');
        }

        // Recupere le credit lie a ce contrat
        $credit = $contrat->getCredit();
        // Genere le contenu PDF a partir du contrat et du credit
        $pdf = $pdfGen->generate($credit, $contrat);

        // Retourne le PDF comme fichier a telecharger
        return new Response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="Contrat_' . $contrat->getNumeroContrat() . '.pdf"',
        ]);
    }
}

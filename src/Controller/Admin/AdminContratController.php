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

#[Route('/admin/contrats')]
class AdminContratController extends AbstractController
{
    #[Route('', name: 'app_admin_contrats')]
    public function index(Request $request, ContratRepository $repo): Response
    {
        $status = $request->query->get('status', 'all');
        $search = $request->query->get('q', '');

        return $this->render('admin/contrat/index.html.twig', [
            'contrats' => $repo->findAllFiltered($status, $search),
            'totalContrats' => $repo->countAll(),
            'activeContrats' => $repo->countActive(),
            'status' => $status,
            'search' => $search,
        ]);
    }

    #[Route('/{id}/pdf', name: 'app_admin_contrat_pdf')]
    public function downloadPdf(int $id, EntityManagerInterface $em, ContractPdfGenerator $pdfGen): Response
    {
        $contrat = $em->getRepository(Contrat::class)->find($id);
        if (!$contrat) {
            $this->addFlash('error', 'Contrat introuvable.');
            return $this->redirectToRoute('app_admin_contrats');
        }

        $credit = $contrat->getCredit();
        $pdf = $pdfGen->generate($credit, $contrat);

        return new Response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="Contrat_' . $contrat->getNumeroContrat() . '.pdf"',
        ]);
    }
}

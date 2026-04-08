<?php

namespace App\Controller\Admin;

use App\Entity\Compte;
use App\Repository\CompteRepository;
use App\Service\TransactionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/admin/comptes')]
class AdminCompteController extends AbstractController
{
    #[Route('', name: 'app_admin_comptes')]
    public function index(Request $request, CompteRepository $repo): Response
    {
        $type = $request->query->get('type', 'all');
        $status = $request->query->get('status', 'all');
        $search = $request->query->get('q', '');

        $comptes = $repo->findAllFiltered($type, $status, $search);

        return $this->render('admin/compte/index.html.twig', [
            'comptes' => $comptes,
            'totalComptes' => $repo->countAll(),
            'activeComptes' => $repo->countActive(),
            'totalSolde' => $repo->totalSolde(),
            'type' => $type,
            'status' => $status,
            'search' => $search,
        ]);
    }

    #[Route('/{id}/toggle', name: 'app_admin_compte_toggle', methods: ['POST'])]
    public function toggle(int $id, EntityManagerInterface $em): Response
    {
        $compte = $em->getRepository(Compte::class)->find($id);
        if (!$compte) {
            $this->addFlash('error', 'Compte introuvable.');
            return $this->redirectToRoute('app_admin_comptes');
        }

        $compte->setEstActif(!$compte->isEstActif());
        $em->flush();

        $action = $compte->isEstActif() ? 'active' : 'desactive';
        $this->addFlash('success', 'Compte ' . $compte->getNumeroCompte() . ' ' . $action . '.');
        return $this->redirectToRoute('app_admin_comptes');
    }

    #[Route('/{id}/depot', name: 'app_admin_compte_depot', methods: ['POST'])]
    public function depot(int $id, Request $request, EntityManagerInterface $em, TransactionService $service, ValidatorInterface $validator): Response
    {
        $compte = $em->getRepository(Compte::class)->find($id);
        if (!$compte) {
            $this->addFlash('error', 'Compte introuvable.');
            return $this->redirectToRoute('app_admin_comptes');
        }

        $montant = (float) $request->request->get('montant', 0);
        $description = trim($request->request->get('description', '')) ?: 'Depot administratif';

        $error = $service->effectuerDepot($compte, $montant, $description, true, $validator);

        if ($error) {
            $this->addFlash('error', $error);
        } else {
            $this->addFlash('success', 'Depot de ' . number_format($montant, 2, ',', ' ') . ' DT effectue sur le compte ' . $compte->getNumeroCompte() . '.');
        }

        return $this->redirectToRoute('app_admin_comptes');
    }

    #[Route('/{id}/retrait', name: 'app_admin_compte_retrait', methods: ['POST'])]
    public function retrait(int $id, Request $request, EntityManagerInterface $em, TransactionService $service, ValidatorInterface $validator): Response
    {
        $compte = $em->getRepository(Compte::class)->find($id);
        if (!$compte) {
            $this->addFlash('error', 'Compte introuvable.');
            return $this->redirectToRoute('app_admin_comptes');
        }

        $montant = (float) $request->request->get('montant', 0);
        $description = trim($request->request->get('description', '')) ?: 'Retrait administratif';

        $error = $service->effectuerRetrait($compte, $montant, $description, $validator);

        if ($error) {
            $this->addFlash('error', $error);
        } else {
            $this->addFlash('success', 'Retrait de ' . number_format($montant, 2, ',', ' ') . ' DT effectue sur le compte ' . $compte->getNumeroCompte() . '.');
        }

        return $this->redirectToRoute('app_admin_comptes');
    }
}

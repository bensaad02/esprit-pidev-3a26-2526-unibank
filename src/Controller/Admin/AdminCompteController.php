<?php

namespace App\Controller\Admin;

use App\Entity\Compte;
use App\Enum\TransactionType;
use App\Repository\CompteRepository;
use App\Repository\TransactionBancaireRepository;
use App\Service\GrokService;
use App\Service\TransactionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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

    #[Route('/{id}/stats', name: 'app_admin_compte_stats', methods: ['GET'])]
    public function stats(int $id, EntityManagerInterface $em, TransactionBancaireRepository $txnRepo): JsonResponse
    {
        $compte = $em->getRepository(Compte::class)->find($id);
        if (!$compte) {
            return $this->json(['error' => 'Compte introuvable.'], 404);
        }

        $cid = $compte->getIdCompte();
        $nbVirements = $txnRepo->countByCompteAndType($cid, TransactionType::VIREMENT);
        $nbRetraits  = $txnRepo->countByCompteAndType($cid, TransactionType::RETRAIT);
        $nbDepots    = $txnRepo->countByCompteAndType($cid, TransactionType::DEPOT);

        $conn = $em->getConnection();
        $totalIn  = (float) $conn->fetchOne(
            "SELECT COALESCE(SUM(montant),0) FROM transaction_bancaire WHERE type='DEPOT' AND id_compte_source=?
             UNION ALL SELECT COALESCE(SUM(montant),0) FROM transaction_bancaire WHERE type='VIREMENT' AND id_compte_destination=?",
            [$cid, $cid]
        );
        $inOut = $conn->fetchAllAssociative(
            "SELECT
               COALESCE((SELECT SUM(montant) FROM transaction_bancaire WHERE type='DEPOT' AND id_compte_source=:cid),0) as total_depots,
               COALESCE((SELECT SUM(montant) FROM transaction_bancaire WHERE type='RETRAIT' AND id_compte_source=:cid),0) as total_retraits,
               COALESCE((SELECT SUM(montant) FROM transaction_bancaire WHERE type='VIREMENT' AND id_compte_source=:cid),0) as total_virements_out,
               COALESCE((SELECT SUM(montant) FROM transaction_bancaire WHERE type='VIREMENT' AND id_compte_destination=:cid),0) as total_virements_in",
            ['cid' => $cid]
        );
        $totals = $inOut[0] ?? [];

        return $this->json([
            'compte' => [
                'numero'  => $compte->getNumeroCompte(),
                'type'    => $compte->getTypeCompte()->value,
                'solde'   => number_format((float)$compte->getSolde(), 2, ',', ' '),
                'actif'   => $compte->isEstActif(),
                'created' => $compte->getDateCreation()->format('d/m/Y'),
            ],
            'counts' => [
                'virements' => $nbVirements,
                'retraits'  => $nbRetraits,
                'depots'    => $nbDepots,
                'total'     => $nbVirements + $nbRetraits + $nbDepots,
            ],
            'totals' => [
                'depots'        => number_format((float)($totals['total_depots'] ?? 0), 2, ',', ' '),
                'retraits'      => number_format((float)($totals['total_retraits'] ?? 0), 2, ',', ' '),
                'virements_out' => number_format((float)($totals['total_virements_out'] ?? 0), 2, ',', ' '),
                'virements_in'  => number_format((float)($totals['total_virements_in'] ?? 0), 2, ',', ' '),
            ],
        ]);
    }

    #[Route('/{id}/rapport-ai', name: 'app_admin_compte_rapport_ai', methods: ['GET'])]
    public function rapportAI(int $id, EntityManagerInterface $em, TransactionBancaireRepository $txnRepo, GrokService $grok): JsonResponse
    {
        $compte = $em->getRepository(Compte::class)->find($id);
        if (!$compte) {
            return $this->json(['error' => 'Compte introuvable.'], 404);
        }

        $user = $compte->getUtilisateur();
        $cid  = $compte->getIdCompte();

        $nbVirements = $txnRepo->countByCompteAndType($cid, TransactionType::VIREMENT);
        $nbRetraits  = $txnRepo->countByCompteAndType($cid, TransactionType::RETRAIT);
        $nbDepots    = $txnRepo->countByCompteAndType($cid, TransactionType::DEPOT);

        $conn = $em->getConnection();
        $totals = $conn->fetchAssociative(
            "SELECT
               COALESCE((SELECT SUM(montant) FROM transaction_bancaire WHERE type='DEPOT' AND id_compte_source=:cid),0) as total_depots,
               COALESCE((SELECT SUM(montant) FROM transaction_bancaire WHERE type='RETRAIT' AND id_compte_source=:cid),0) as total_retraits,
               COALESCE((SELECT SUM(montant) FROM transaction_bancaire WHERE type='VIREMENT' AND id_compte_source=:cid),0) as total_virements_out,
               COALESCE((SELECT SUM(montant) FROM transaction_bancaire WHERE type='VIREMENT' AND id_compte_destination=:cid),0) as total_virements_in",
            ['cid' => $cid]
        );

        $recentTxns = $txnRepo->findByCompte($cid, null, null, null, null);
        $recentTxns = array_slice($recentTxns, 0, 10);
        $txnLines   = '';
        foreach ($recentTxns as $t) {
            $txnLines .= '- ' . $t->getType()->value . ' ' . $t->getMontant() . ' DT - ' . $t->getDateCreation()->format('d/m/Y') . "\n";
        }

        $prompt = "Genere un rapport d'analyse bancaire professionnel pour ce client UniBank+:\n\n"
            . "CLIENT: {$user->getPrenom()} {$user->getNom()} ({$user->getEmail()})\n"
            . "COMPTE: {$compte->getNumeroCompte()} | Type: {$compte->getTypeCompte()->value} | Statut: " . ($compte->isEstActif() ? 'Actif' : 'Inactif') . "\n"
            . "Solde actuel: {$compte->getSolde()} DT | Ouvert le: {$compte->getDateCreation()->format('d/m/Y')}\n\n"
            . "STATISTIQUES TRANSACTIONS:\n"
            . "- Depots: {$nbDepots} operations | Total: " . number_format((float)($totals['total_depots'] ?? 0), 2) . " DT\n"
            . "- Retraits: {$nbRetraits} operations | Total: " . number_format((float)($totals['total_retraits'] ?? 0), 2) . " DT\n"
            . "- Virements emis: {$nbVirements} | Total: " . number_format((float)($totals['total_virements_out'] ?? 0), 2) . " DT\n"
            . "- Virements recus: Total: " . number_format((float)($totals['total_virements_in'] ?? 0), 2) . " DT\n\n"
            . "10 DERNIERES TRANSACTIONS:\n{$txnLines}\n"
            . "Inclus: evaluation du niveau d'activite (actif/modere/inactif), analyse des habitudes, sante financiere, et recommandations personnalisees.";

        $report = $grok->generateReport($prompt);

        return $this->json(['report' => $report]);
    }
}

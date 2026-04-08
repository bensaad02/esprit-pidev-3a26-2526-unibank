<?php

namespace App\Controller\Admin;

use App\Entity\Contrat;
use App\Entity\Credit;
use App\Enum\CreditStatus;
use App\Repository\CreditRepository;
use App\Service\ContractPdfGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/admin/credits')]
class AdminCreditController extends AbstractController
{
    #[Route('', name: 'app_admin_credits')]
    public function index(Request $request, CreditRepository $repo): Response
    {
        $status = $request->query->get('status', 'all');
        $search = $request->query->get('q', '');

        return $this->render('admin/credit/index.html.twig', [
            'credits' => $repo->findAllFiltered($status, $search),
            'stats' => [
                'pending' => $repo->countByStatus(CreditStatus::PENDING),
                'total' => $repo->countAll(),
                'totalAmount' => $repo->totalApprovedAmount(),
            ],
            'status' => $status,
            'search' => $search,
        ]);
    }

    #[Route('/{id}/approve', name: 'app_admin_credit_approve', methods: ['POST'])]
    public function approve(int $id, EntityManagerInterface $em): Response
    {
        $credit = $em->getRepository(Credit::class)->find($id);
        if (!$credit) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_admin_credits');
        }

        if ($credit->getStatut() !== CreditStatus::PENDING) {
            $this->addFlash('error', 'Seules les demandes en attente peuvent etre approuvees.');
            return $this->redirectToRoute('app_admin_credits');
        }

        $credit->setStatut(CreditStatus::APPROVED);
        $credit->setAgent($this->getUser());
        $credit->setDateTraitement(new \DateTime());
        $em->flush();

        $this->addFlash('success', 'Credit de ' . number_format((float)$credit->getMontant(), 2, ',', ' ') . ' DT approuve pour ' . $credit->getClient()->getPrenom() . ' ' . $credit->getClient()->getNom() . '.');
        return $this->redirectToRoute('app_admin_credits');
    }

    #[Route('/{id}/reject', name: 'app_admin_credit_reject', methods: ['POST'])]
    public function reject(int $id, Request $request, EntityManagerInterface $em, ValidatorInterface $validator): Response
    {
        $credit = $em->getRepository(Credit::class)->find($id);
        if (!$credit) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_admin_credits');
        }

        if ($credit->getStatut() !== CreditStatus::PENDING) {
            $this->addFlash('error', 'Seules les demandes en attente peuvent etre rejetees.');
            return $this->redirectToRoute('app_admin_credits');
        }

        $motif = trim($request->request->get('motif', ''));
        $credit->setStatut(CreditStatus::REJECTED);
        $credit->setMotifRejet($motif);
        $credit->setAgent($this->getUser());
        $credit->setDateTraitement(new \DateTime());

        if ($response = $this->handleValidationErrors($validator->validate($credit))) {
            return $response;
        }

        $em->flush();

        $this->addFlash('success', 'Credit rejete.');
        return $this->redirectToRoute('app_admin_credits');
    }

    #[Route('/{id}/finalize', name: 'app_admin_credit_finalize', methods: ['POST'])]
    public function finalize(int $id, EntityManagerInterface $em, ContractPdfGenerator $pdfGen, ValidatorInterface $validator): Response
    {
        $credit = $em->getRepository(Credit::class)->find($id);
        if (!$credit) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_admin_credits');
        }

        if ($credit->getStatut() !== CreditStatus::CONTRACT_PENDING) {
            $this->addFlash('error', 'Ce credit n\'est pas en attente de finalisation.');
            return $this->redirectToRoute('app_admin_credits');
        }

        $contrat = new Contrat();
        $contrat->setCredit($credit);
        $contrat->setClient($credit->getClient());
        $contrat->setAgent($this->getUser());
        $contrat->setNumeroContrat('CRD-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 6)));
        $contrat->setMontantCredit($credit->getMontant());
        $contrat->setTauxInteret($credit->getTauxInteret());
        $contrat->setDureeEnMois($credit->getDureeEnMois());
        $contrat->setMensualite($credit->getMensualite());
        $contrat->setMontantTotal($credit->getMontantTotal());
        $contrat->setDateDebut($credit->getDateDebutPaiement() ?? new \DateTime());
        $dateFin = (clone ($credit->getDateDebutPaiement() ?? new \DateTime()))->modify('+' . $credit->getDureeEnMois() . ' months');
        $contrat->setDateFin($dateFin);
        $contrat->setStatut('ACTIVE');

        if ($response = $this->handleValidationErrors($validator->validate($contrat))) {
            return $response;
        }

        $em->persist($contrat);

        $credit->setStatut(CreditStatus::ACTIVE);
        $em->flush();

        $this->addFlash('success', 'Contrat ' . $contrat->getNumeroContrat() . ' genere et credit active.');
        return $this->redirectToRoute('app_admin_credits');
    }

    #[Route('/{id}/contract-pdf', name: 'app_admin_credit_pdf')]
    public function downloadPdf(int $id, EntityManagerInterface $em, ContractPdfGenerator $pdfGen): Response
    {
        $credit = $em->getRepository(Credit::class)->find($id);
        if (!$credit) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_admin_credits');
        }

        $contrat = $em->getRepository(Contrat::class)->findOneBy(['credit' => $credit]);
        if (!$contrat) {
            $this->addFlash('error', 'Aucun contrat associe.');
            return $this->redirectToRoute('app_admin_credits');
        }

        $pdf = $pdfGen->generate($credit, $contrat);
        return new Response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="Contrat_' . $contrat->getNumeroContrat() . '.pdf"',
        ]);
    }

    private function handleValidationErrors(ConstraintViolationListInterface $violations): ?RedirectResponse
    {
        if (count($violations) === 0) {
            return null;
        }

        foreach ($violations as $violation) {
            $this->addFlash('error', $violation->getMessage());
        }

        return $this->redirectToRoute('app_admin_credits');
    }
}

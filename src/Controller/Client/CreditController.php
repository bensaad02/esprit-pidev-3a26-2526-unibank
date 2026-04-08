<?php

namespace App\Controller\Client;

use App\Entity\Contrat;
use App\Entity\Credit;
use App\Enum\CreditStatus;
use App\Enum\TypeContrat;
use App\Repository\CreditRepository;
use App\Repository\ContratRepository;
use App\Service\ContractPdfGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/client/credits')]
class CreditController extends BaseClientController
{
    private const TAUX_BASE = 7.50;

    #[Route('', name: 'app_client_credits')]
    public function index(CreditRepository $repo, ContratRepository $contratRepo): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();
        $credits = $repo->findByClient($user->getIdUtilisateur());
        $contrats = $contratRepo->findByClient($user->getIdUtilisateur());

        return $this->render('client/credit/index.html.twig', [
            'credits' => $credits,
            'contrats' => $contrats,
            'tauxBase' => self::TAUX_BASE,
        ]);
    }

    #[Route('/apply', name: 'app_client_credit_apply', methods: ['POST'])]
    public function apply(Request $request, EntityManagerInterface $em, CreditRepository $repo, ValidatorInterface $validator): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();

        if ($repo->hasActiveOrPending($user->getIdUtilisateur())) {
            $this->addFlash('error', 'Vous avez deja un credit en cours ou en attente.');
            return $this->redirectToRoute('app_client_credits');
        }

        $montant = (float) $request->request->get('montant', 0);
        $dureeAnnees = (int) $request->request->get('duree', 0);
        $salaire = (float) $request->request->get('salaire', 0);
        $motif = trim($request->request->get('motif', ''));

        $dureeEnMois = $dureeAnnees * 12;

        $credit = new Credit();
        $credit->setClient($user);
        $credit->setMontant(number_format($montant, 2, '.', ''));
        $credit->setTauxInteret(number_format(self::TAUX_BASE, 2, '.', ''));
        $credit->setDureeEnMois($dureeEnMois);
        $credit->setStatut(CreditStatus::PENDING);
        $credit->setMotifDemande($motif);
        $credit->setSalaireMensuel(number_format($salaire, 2, '.', ''));
        $credit->calculatePayments();

        if ($response = $this->handleValidationErrors($validator->validate($credit))) {
            return $response;
        }

        $em->persist($credit);
        $em->flush();

        $this->addFlash('success', 'Demande de credit soumise avec succes. Montant: ' . number_format($montant, 2, ',', ' ') . ' DT.');
        return $this->redirectToRoute('app_client_credits');
    }

    #[Route('/{id}/contract-choice', name: 'app_client_credit_contract', methods: ['POST'])]
    public function contractChoice(int $id, Request $request, EntityManagerInterface $em): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $credit = $em->getRepository(Credit::class)->find($id);
        if (!$credit || $credit->getClient()->getIdUtilisateur() !== $this->getUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_client_credits');
        }

        if ($credit->getStatut() !== CreditStatus::APPROVED && $credit->getStatut() !== CreditStatus::CONTRACT_PENDING) {
            $this->addFlash('error', 'Ce credit ne peut pas etre modifie.');
            return $this->redirectToRoute('app_client_credits');
        }

        $typeContrat = TypeContrat::tryFrom($request->request->get('type_contrat', ''));
        if (!$typeContrat) {
            $this->addFlash('error', 'Type de contrat invalide.');
            return $this->redirectToRoute('app_client_credits');
        }

        $majoration = match ($typeContrat) {
            TypeContrat::PRELEVEMENT_AUTOMATIQUE => 0.0,
            TypeContrat::PAIEMENT_MENSUEL => 0.0,
            TypeContrat::PAIEMENT_DIFFERE => 0.5,
        };

        $newTaux = self::TAUX_BASE + $majoration;
        $credit->setTypeContrat($typeContrat);
        $credit->setTauxInteret(number_format($newTaux, 2, '.', ''));
        $credit->setDatePrise(new \DateTime());
        $credit->setDateDebutPaiement((new \DateTime())->modify('+1 month'));
        $credit->setStatut(CreditStatus::CONTRACT_PENDING);
        $credit->calculatePayments();

        $em->flush();

        $this->addFlash('success', 'Choix de contrat enregistre. En attente de finalisation par l\'administration.');
        return $this->redirectToRoute('app_client_credits');
    }

    #[Route('/{id}/modify', name: 'app_client_credit_modify', methods: ['POST'])]
    public function modify(int $id, Request $request, EntityManagerInterface $em, ValidatorInterface $validator): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $credit = $em->getRepository(Credit::class)->find($id);
        if (!$credit || $credit->getClient()->getIdUtilisateur() !== $this->getUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_client_credits');
        }

        if ($credit->getStatut() !== CreditStatus::PENDING) {
            $this->addFlash('error', 'Seules les demandes en attente peuvent etre modifiees.');
            return $this->redirectToRoute('app_client_credits');
        }

        $montant = (float) $request->request->get('montant', 0);
        $dureeAnnees = (int) $request->request->get('duree', 0);
        $salaire = (float) $request->request->get('salaire', 0);
        $motif = trim($request->request->get('motif', ''));

        $dureeEnMois = $dureeAnnees * 12;

        $credit->setMontant(number_format($montant, 2, '.', ''));
        $credit->setDureeEnMois($dureeEnMois);
        $credit->setSalaireMensuel(number_format($salaire, 2, '.', ''));
        $credit->setMotifDemande($motif);
        $credit->calculatePayments();

        if ($response = $this->handleValidationErrors($validator->validate($credit))) {
            return $response;
        }

        $em->flush();

        $this->addFlash('success', 'Demande de credit modifiee avec succes.');
        return $this->redirectToRoute('app_client_credits');
    }

    #[Route('/{id}/pdf', name: 'app_client_credit_pdf')]
    public function downloadPdf(int $id, EntityManagerInterface $em, ContractPdfGenerator $pdfGen): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $credit = $em->getRepository(Credit::class)->find($id);
        if (!$credit || $credit->getClient()->getIdUtilisateur() !== $this->getUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_client_credits');
        }

        $contrat = $em->getRepository(Contrat::class)->findOneBy(['credit' => $credit]);
        if (!$contrat) {
            $this->addFlash('error', 'Aucun contrat associe a ce credit.');
            return $this->redirectToRoute('app_client_credits');
        }

        $pdf = $pdfGen->generate($credit, $contrat);
        return new Response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="Contrat_' . $contrat->getNumeroContrat() . '.pdf"',
        ]);
    }

    #[Route('/{id}/cancel', name: 'app_client_credit_cancel', methods: ['POST'])]
    public function cancel(int $id, EntityManagerInterface $em): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $credit = $em->getRepository(Credit::class)->find($id);
        if (!$credit || $credit->getClient()->getIdUtilisateur() !== $this->getUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_client_credits');
        }

        if ($credit->getStatut() !== CreditStatus::PENDING) {
            $this->addFlash('error', 'Seules les demandes en attente peuvent etre annulees.');
            return $this->redirectToRoute('app_client_credits');
        }

        $credit->setStatut(CreditStatus::CANCELLED);
        $em->flush();

        $this->addFlash('success', 'Demande de credit annulee.');
        return $this->redirectToRoute('app_client_credits');
    }

    private function handleValidationErrors(ConstraintViolationListInterface $violations): ?RedirectResponse
    {
        if (count($violations) === 0) {
            return null;
        }

        foreach ($violations as $violation) {
            $this->addFlash('error', $violation->getMessage());
        }

        return $this->redirectToRoute('app_client_credits');
    }
}

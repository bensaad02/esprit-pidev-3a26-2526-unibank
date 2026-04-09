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

// Toutes les routes de ce controller commencent par /client/credits
#[Route('/client/credits')]
class CreditController extends BaseClientController
{

    private const TAUX_BASE = 7.50;

    // Lorsque le client ouvre la page credit, cette fonction charge ses demandes, ses contrats et la simulation



    #[Route('', name: 'app_client_credits')]
    public function index(CreditRepository $repo, ContratRepository $contratRepo): Response
    {
        // Verifie que le client est bien approuve avant d'acceder a la page
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        // Recupere l'utilisateur client actuellement connecte
        $user = $this->getClientUser();
        // Charge les credits lies a ce client
        $credits = $repo->findByClient($user->getIdUtilisateur());
        // Charge aussi les contrats lies a ce client
        $contrats = $contratRepo->findByClient($user->getIdUtilisateur());

        // Envoie les donnees au template Twig
        return $this->render('client/credit/index.html.twig', [
            'credits' => $credits,
            'contrats' => $contrats,
            'tauxBase' => self::TAUX_BASE,
        ]);
    }

    // Lorsque le client clique sur Soumettre la demande, cette fonction cree un nouveau credit

    #[Route('/apply', name: 'app_client_credit_apply', methods: ['POST'])]
    public function apply(Request $request, EntityManagerInterface $em, CreditRepository $repo, ValidatorInterface $validator): Response
    {
        // Verifie que le client a le droit d'acceder a cette action
        $redirect = $this->checkApproved(); // connecte 
        if ($redirect) return $redirect;

        // Recupere le client connecte
        $user = $this->getClientUser();

        //  credit si un autre est deja actif ou en attente
        if ($repo->hasActiveOrPending($user->getIdUtilisateur())) { // clien ila credit ou non
            $this->addFlash('error', 'Vous avez deja un credit en cours ou en attente.');
            return $this->redirectToRoute('app_client_credits');
        }

        // Recupere et convertit les champs envoyes par le formulaire
        $montant = (float) $request->request->get('montant', 0);
        $dureeAnnees = (int) $request->request->get('duree', 0);
        $salaire = (float) $request->request->get('salaire', 0);
        $motif = trim($request->request->get('motif', ''));

        // Convertit la duree en mois pour la stocker dans l'entite
        $dureeEnMois = $dureeAnnees * 12;

        // Cree un nouvel objet Credit
        $credit = new Credit();
        // Lie le credit au client connecte
        $credit->setClient($user);
        // Enregistre le montant formate
        $credit->setMontant(number_format($montant, 2, '.', ''));
        // Affecte le taux de base
        $credit->setTauxInteret(number_format(self::TAUX_BASE, 2, '.', ''));
        // Enregistre la duree
        $credit->setDureeEnMois($dureeEnMois);
        // Le credit commence en statut pending
        $credit->setStatut(CreditStatus::PENDING);
        // Enregistre le motif saisi
        $credit->setMotifDemande($motif);
        // Enregistre le salaire mensuel
        $credit->setSalaireMensuel(number_format($salaire, 2, '.', ''));
        // Calcule la mensualite et le montant total
        $credit->calculatePayments();

        // Lance la validation Symfony avant insertion
        if ($response = $this->handleValidationErrors($validator->validate($credit))) {
            return $response;
        }

        // l'insertion du nouveau credit
        $em->persist($credit);
        // Sauvegarde le credit en base de donnees
        $em->flush();

        // Message de confirmation pour l'utilisateur
        $this->addFlash('success', 'Demande de credit soumise avec succes. Montant: ' . number_format($montant, 2, ',', ' ') . ' DT.');
        return $this->redirectToRoute('app_client_credits');
    }

    // Lorsque le client clique sur Valider le choix, cette fonction enregistre le type de contrat choisi
    // Enregistre le type de contrat choisi par le client pour un credit approuve


    #[Route('/{id}/contract-choice', name: 'app_client_credit_contract', methods: ['POST'])]
    public function contractChoice(int $id, Request $request, EntityManagerInterface $em): Response
    {
        // Verifie l'acces du client
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        // Cherche le credit demande
        $credit = $em->getRepository(Credit::class)->find($id);
        // Verifie que le credit existe et appartient bien au client connecte
        if (!$credit || $credit->getClient()->getIdUtilisateur() !== $this->getClientUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_client_credits');
        }

        // Autorise cette action seulement sur un credit approuve ou deja en attente de contrat
        if ($credit->getStatut() !== CreditStatus::APPROVED && $credit->getStatut() !== CreditStatus::CONTRACT_PENDING) {
            $this->addFlash('error', 'Ce credit ne peut pas etre modifie.');
            return $this->redirectToRoute('app_client_credits');
        }

        // Convertit la valeur du formulaire en enum TypeContrat
        $typeContrat = TypeContrat::tryFrom($request->request->get('type_contrat', ''));
        if (!$typeContrat) {
            $this->addFlash('error', 'Type de contrat invalide.');
            return $this->redirectToRoute('app_client_credits');
        }

        // Definit la majoration selon le type de contrat choisi
        $majoration = match ($typeContrat) {
            TypeContrat::PRELEVEMENT_AUTOMATIQUE => 0.0,
            TypeContrat::PAIEMENT_MENSUEL => 0.0,
            TypeContrat::PAIEMENT_DIFFERE => 0.5,
        };

        // Calcule le nouveau taux
        $newTaux = self::TAUX_BASE + $majoration;
        // Enregistre le type de contrat
        $credit->setTypeContrat($typeContrat);
        // Met a jour le taux d'interet
        $credit->setTauxInteret(number_format($newTaux, 2, '.', ''));
        // Date de prise du contrat
        $credit->setDatePrise(new \DateTime());
        // Premiere date de paiement un mois plus tard
        $credit->setDateDebutPaiement((new \DateTime())->modify('+1 month'));
        // Le credit passe en attente de finalisation admin
        $credit->setStatut(CreditStatus::CONTRACT_PENDING);
        // Recalcule les mensualites avec le nouveau taux
        $credit->calculatePayments();

        // Sauvegarde les modifications
        $em->flush();

        $this->addFlash('success', 'Choix de contrat enregistre. En attente de finalisation par l\'administration.');
        return $this->redirectToRoute('app_client_credits');
    }

    // Modifie une demande de credit tant qu'elle est encore en attente


    #[Route('/{id}/modify', name: 'app_client_credit_modify', methods: ['POST'])]
    public function modify(int $id, Request $request, EntityManagerInterface $em, ValidatorInterface $validator): Response
    {
        // Verifie l'acces du client
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        // Cherche le credit a modifier
        $credit = $em->getRepository(Credit::class)->find($id);
        // Verifie que le credit existe et qu'il appartient au client
        if (!$credit || $credit->getClient()->getIdUtilisateur() !== $this->getClientUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_client_credits');
        }

        // Autorise la modification seulement si le credit est encore pending
        if ($credit->getStatut() !== CreditStatus::PENDING) {
            $this->addFlash('error', 'Seules les demandes en attente peuvent etre modifiees.');
            return $this->redirectToRoute('app_client_credits');
        }

        // Recupere les nouvelles valeurs du formulaire
        $montant = (float) $request->request->get('montant', 0);
        $dureeAnnees = (int) $request->request->get('duree', 0);
        $salaire = (float) $request->request->get('salaire', 0);
        $motif = trim($request->request->get('motif', ''));

        // Convertit la duree en mois
        $dureeEnMois = $dureeAnnees * 12;

        // Met a jour les champs du credit
        $credit->setMontant(number_format($montant, 2, '.', ''));
        $credit->setDureeEnMois($dureeEnMois);
        $credit->setSalaireMensuel(number_format($salaire, 2, '.', ''));
        $credit->setMotifDemande($motif);
        // Recalcule les valeurs derivees
        $credit->calculatePayments();

        // Verifie que les nouvelles donnees restent valides
        if ($response = $this->handleValidationErrors($validator->validate($credit))) {
            return $response;
        }

        // Sauvegarde les modifications
        $em->flush();

        $this->addFlash('success', 'Demande de credit modifiee avec succes.');
        return $this->redirectToRoute('app_client_credits');
    }

    // Lorsque le client clique sur PDF, cette fonction genere puis telecharge le contrat
    // Telecharge le contrat PDF d'un credit actif pour le client



    #[Route('/{id}/pdf', name: 'app_client_credit_pdf')]
    public function downloadPdf(int $id, EntityManagerInterface $em, ContractPdfGenerator $pdfGen): Response
    {
        // Verifie l'acces du client
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        // Cherche le credit demande
        $credit = $em->getRepository(Credit::class)->find($id);
        // Verifie que le credit existe et qu'il appartient au client
        if (!$credit || $credit->getClient()->getIdUtilisateur() !== $this->getClientUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_client_credits');
        }

        // Cherche le contrat associe a ce credit
        $contrat = $em->getRepository(Contrat::class)->findOneBy(['credit' => $credit]);
        if (!$contrat) {
            $this->addFlash('error', 'Aucun contrat associe a ce credit.');
            return $this->redirectToRoute('app_client_credits');
        }

        // Genere le contenu du PDF
        $pdf = $pdfGen->generate($credit, $contrat);
        // Retourne le PDF en telechargement
        return new Response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="Contrat_' . $contrat->getNumeroContrat() . '.pdf"',
        ]);
    }

    // Lorsque le client clique sur Annuler, cette fonction annule logiquement la demande de credit
    // Annule une demande en attente sans la supprimer physiquement de la base

    #[Route('/{id}/cancel', name: 'app_client_credit_cancel', methods: ['POST'])]
    public function cancel(int $id, EntityManagerInterface $em): Response
    {
        // Verifie l'acces du client
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        // Cherche le credit a annuler
        $credit = $em->getRepository(Credit::class)->find($id);
        // Verifie que le credit existe et appartient au client
        if (!$credit || $credit->getClient()->getIdUtilisateur() !== $this->getClientUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_client_credits');
        }

        // Seules les demandes encore pending peuvent etre annulees
        if ($credit->getStatut() !== CreditStatus::PENDING) {
            $this->addFlash('error', 'Seules les demandes en attente peuvent etre annulees.');
            return $this->redirectToRoute('app_client_credits');
        }

        // Suppression logique : on change juste le statut
        $credit->setStatut(CreditStatus::CANCELLED);
        // Sauvegarde le nouveau statut
        $em->flush();

        $this->addFlash('success', 'Demande de credit annulee.');
        return $this->redirectToRoute('app_client_credits');
    }

    // Lorsque le client clique sur Supprimer, cette fonction efface definitivement une demande encore en attente
    // Supprime physiquement un credit pending avant son traitement par l'administration
    #[Route('/{id}/delete', name: 'app_client_credit_delete', methods: ['POST'])]
    public function delete(int $id, EntityManagerInterface $em): Response
    {
        // Verifie l'acces du client
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        // Cherche le credit a supprimer
        $credit = $em->getRepository(Credit::class)->find($id);
        // Verifie que le credit existe et appartient au client
        if (!$credit || $credit->getClient()->getIdUtilisateur() !== $this->getClientUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_client_credits');
        }

        // Seules les demandes encore pending peuvent etre supprimees definitivement
        if ($credit->getStatut() !== CreditStatus::PENDING) {
            $this->addFlash('error', 'Seules les demandes en attente peuvent etre supprimees.');
            return $this->redirectToRoute('app_client_credits');
        }

        // Supprime physiquement le credit de la base de donnees
        $em->remove($credit);
        // Sauvegarde la suppression
        $em->flush();

        $this->addFlash('success', 'Demande de credit supprimee definitivement.');
        return $this->redirectToRoute('app_client_credits');
    }

    // Lorsque la validation detecte des erreurs, cette fonction les transforme en messages puis redirige
    // Transforme les erreurs de validation en messages flash puis redirige
    private function handleValidationErrors(ConstraintViolationListInterface $violations): ?RedirectResponse
    {
        // S'il n'y a pas d'erreur, on laisse le traitement continuer
        if (count($violations) === 0) {
            return null;
        }

        // Ajoute chaque message d'erreur dans la session
        foreach ($violations as $violation) {
            $this->addFlash('error', $violation->getMessage());
        }

        // Revient a la page principale des credits client
        return $this->redirectToRoute('app_client_credits');
    }
}

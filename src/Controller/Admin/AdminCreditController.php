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

// Toutes les routes de ce controller commencent par /admin/credits
#[Route('/admin/credits')]
class AdminCreditController extends AbstractController
{
    // Lorsque l'admin ouvre la page des credits, 
    // Affiche la liste des credits admin avec filtres, recherche et statistiques
    #[Route('', name: 'app_admin_credits')]
    public function index(Request $request, CreditRepository $repo): Response
    {
        // Recupere le statut choisi dans l'URL
        $status = $request->query->get('status', 'all');
        // Recupere le texte de recherche dans l'URL
        $search = $request->query->get('q', '');

        // Envoie les donnees necessaires au template Twig
        return $this->render('admin/credit/index.html.twig', [
            // Liste des credits filtres selon le statut et la recherche
            'credits' => $repo->findAllFiltered($status, $search),
            // Statistiques affichees en haut de la page
            'stats' => [
                'pending' => $repo->countByStatus(CreditStatus::PENDING),
                'total' => $repo->countAll(),
                'totalAmount' => $repo->totalApprovedAmount(),
            ],
            // Valeurs renvoyees au formulaire de filtre
            'status' => $status,
            'search' => $search,
        ]);
    }

    // Lorsque l'admin clique sur Approuver, 
    // Approuve une demande de credit en attente
    #[Route('/{id}/approve', name: 'app_admin_credit_approve', methods: ['POST'])]
    public function approve(int $id, EntityManagerInterface $em): Response
    {
        // Cherche le credit par son identifiant
        $credit = $em->getRepository(Credit::class)->find($id);
        if (!$credit) {
            // Message d'erreur si le credit n'existe pas
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_admin_credits');
        }

        if ($credit->getStatut() !== CreditStatus::PENDING) {
            // On refuse l'operation si le credit n'est plus en attente
            $this->addFlash('error', 'Seules les demandes en attente peuvent etre approuvees.');
            return $this->redirectToRoute('app_admin_credits');
        }

        // Met le credit a l'etat approuve
        $credit->setStatut(CreditStatus::APPROVED);
        // Memorise l'agent qui a traite la demande
        $credit->setAgent($this->getUser());
        // Memorise la date de traitement
        $credit->setDateTraitement(new \DateTime());
        // Sauvegarde les changements en base de donnees
        $em->flush();

        // Message de confirmation pour l'admin
        $this->addFlash('success', 'Credit de ' . number_format((float)$credit->getMontant(), 2, ',', ' ') . ' DT approuve pour ' . $credit->getClient()->getPrenom() . ' ' . $credit->getClient()->getNom() . '.');
        return $this->redirectToRoute('app_admin_credits');
    }

    // Lorsque l'admin clique sur Rejeter, cette fonction enregistre le motif puis rejette le credit
   
    #[Route('/{id}/reject', name: 'app_admin_credit_reject', methods: ['POST'])]
    public function reject(int $id, Request $request, EntityManagerInterface $em, ValidatorInterface $validator): Response
    {
        // Cherche le credit a rejeter
        $credit = $em->getRepository(Credit::class)->find($id);
        if (!$credit) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_admin_credits');
        }

        if ($credit->getStatut() !== CreditStatus::PENDING) {
            // Seuls les credits en attente peuvent etre rejetes
            $this->addFlash('error', 'Seules les demandes en attente peuvent etre rejetees.');
            return $this->redirectToRoute('app_admin_credits');
        }

        // Recupere le motif saisi dans le formulaire
        $motif = trim($request->request->get('motif', ''));
        // Change le statut du credit en rejete
        $credit->setStatut(CreditStatus::REJECTED);
        // Enregistre le motif de rejet
        $credit->setMotifRejet($motif);
        // Memorise l'agent qui a traite le rejet
        $credit->setAgent($this->getUser());
        // Memorise la date du traitement
        $credit->setDateTraitement(new \DateTime());

        // Lance la validation Symfony avant de sauvegarder
        if ($response = $this->handleValidationErrors($validator->validate($credit))) {
            return $response;
        }

        // Sauvegarde les modifications en base
        $em->flush();

        $this->addFlash('success', 'Credit rejete.');
        return $this->redirectToRoute('app_admin_credits');
    }

    // Lorsque l'admin clique sur Finaliser, 
    // Cree le contrat final a partir d'un credit dont le contrat est en attente


    #[Route('/{id}/finalize', name: 'app_admin_credit_finalize', methods: ['POST'])]
    public function finalize(int $id, EntityManagerInterface $em, ContractPdfGenerator $pdfGen, ValidatorInterface $validator): Response
    {
        // Cherche le credit a finaliser
        $credit = $em->getRepository(Credit::class)->find($id);
        if (!$credit) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_admin_credits');
        }

        if ($credit->getStatut() !== CreditStatus::CONTRACT_PENDING) {
            // On verifie que le credit est bien pret pour la finalisation
            $this->addFlash('error', 'Ce credit n\'est pas en attente de finalisation.');
            return $this->redirectToRoute('app_admin_credits');
        }

        // Cree un nouveau contrat a partir des donnees du credit
        $contrat = new Contrat();
        // Lie le contrat au credit
        $contrat->setCredit($credit);
        // Recopie le client du credit
        $contrat->setClient($credit->getClient());
        // Enregistre l'agent qui finalise le contrat
        $contrat->setAgent($this->getUser());
        // Genere un numero de contrat unique
        $contrat->setNumeroContrat('CRD-' . strtoupper(substr(bin2hex(random_bytes(3)), 0, 6)));
        // Recopie les informations financieres du credit vers le contrat
        $contrat->setMontantCredit($credit->getMontant());
        $contrat->setTauxInteret($credit->getTauxInteret());
        $contrat->setDureeEnMois($credit->getDureeEnMois());
        $contrat->setMensualite($credit->getMensualite());
        $contrat->setMontantTotal($credit->getMontantTotal());
        // Definit la date de debut du contrat
        $contrat->setDateDebut($credit->getDateDebutPaiement() ?? new \DateTime());
        // Calcule la date de fin selon la duree
        $dateFin = (clone ($credit->getDateDebutPaiement() ?? new \DateTime()))->modify('+' . $credit->getDureeEnMois() . ' months');
        $contrat->setDateFin($dateFin);
        // Le contrat devient actif apres creation
        $contrat->setStatut('ACTIVE');

        // Verifie que le contrat est valide avant insertion
        if ($response = $this->handleValidationErrors($validator->validate($contrat))) {
            return $response;
        }

        //  l'insertion du contrat en base
        $em->persist($contrat);

        // Met aussi le credit en statut actif
        $credit->setStatut(CreditStatus::ACTIVE);
        // Enregistre le contrat et le nouveau statut du credit
        $em->flush();

        $this->addFlash('success', 'Contrat ' . $contrat->getNumeroContrat() . ' genere et credit active.');
        return $this->redirectToRoute('app_admin_credits');
    }

    // Lorsque l'admin clique sur le bouton PDF, cette fonction genere puis telecharge le contrat



    #[Route('/{id}/contract-pdf', name: 'app_admin_credit_pdf')]
    public function downloadPdf(int $id, EntityManagerInterface $em, ContractPdfGenerator $pdfGen): Response
    {
        // Cherche le credit demande
        $credit = $em->getRepository(Credit::class)->find($id);
        if (!$credit) {
            $this->addFlash('error', 'Credit introuvable.');
            return $this->redirectToRoute('app_admin_credits');
        }

        // Cherche le contrat associe a ce credit
        $contrat = $em->getRepository(Contrat::class)->findOneBy(['credit' => $credit]);
        if (!$contrat) {
            $this->addFlash('error', 'Aucun contrat associe.');
            return $this->redirectToRoute('app_admin_credits');
        }

        // Genere le contenu binaire du PDF
        $pdf = $pdfGen->generate($credit, $contrat);
        // Retourne le PDF comme fichier a telecharger
        return new Response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="Contrat_' . $contrat->getNumeroContrat() . '.pdf"',
        ]);
    }

    // Lorsque la validation trouve des erreurs,
    // Transforme les erreurs de validation en messages flash puis redirige
    private function handleValidationErrors(ConstraintViolationListInterface $violations): ?RedirectResponse
    {
        // S'il n'y a aucune erreur, on continue normalement
        if (count($violations) === 0) {
            return null;
        }

        // Ajoute chaque erreur dans la session pour l'afficher a l'utilisateur
        foreach ($violations as $violation) {
            $this->addFlash('error', $violation->getMessage());
        }

        // Revient a la page principale des credits admin
        return $this->redirectToRoute('app_admin_credits');
    }
}

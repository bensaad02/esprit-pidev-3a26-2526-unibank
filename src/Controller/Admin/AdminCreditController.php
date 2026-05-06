<?php

namespace App\Controller\Admin;

use App\Entity\Contrat;
use App\Entity\Credit;
use App\Enum\CreditStatus;
use App\Repository\CreditRepository;
use App\Service\ContractBrevoService;
use App\Service\ContractPdfGenerator;
use App\Service\EmailService;
use App\Service\SupabaseStorageService;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
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

        $statsData = $this->buildStatsData($repo);

        // Envoie les donnees necessaires au template Twig
        return $this->render('admin/credit/index.html.twig', [
            // Liste des credits filtres selon le statut et la recherche
            'credits' => $repo->findAllFiltered($status, $search),
            'stats' => [
                'pending' => $repo->countByStatus(CreditStatus::PENDING),
                'total' => $repo->countAll(),
                'totalAmount' => $repo->totalApprovedAmount(),
            ],
            'statsChartGradient' => $statsData['chartGradient'],
            'statsLegend' => $statsData['legend'],
            'statsTotalCredits' => $statsData['totalCredits'],
            // Valeurs renvoyees au formulaire de filtre
            'status' => $status,
            'search' => $search,
        ]);
    }

    // Lorsque l'admin clique sur Approuver, 
    // Approuve une demande de credit en attente
    #[Route('/{id}/approve', name: 'app_admin_credit_approve', methods: ['POST'])]
    public function approve(int $id, EntityManagerInterface $em, EmailService $emailService, LoggerInterface $logger): Response
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

        //  envoyer un email au client p son credit a ete approuve.
        try {
            // Appelle le service EmailService pour envoyer l'email d'approbation.
            $emailService->sendCreditApprovedEmail($credit->getClient(), $credit);
        } catch (\Throwable $e) {
            // Affiche un mes n'a pas pu etre envoye.
            $this->addFlash('warning', 'Credit approuve, mais l\'email de notification n\'a pas pu etre envoye.');
            // Enregistre l'erreur dans les logs pour faciliter le diagnostic.
            $logger->error('Echec envoi email approbation credit.', [
                // Identifiant du credit concerne.
                'credit_id' => $credit->getIdCredit(),
                // Adresse email du client concerne.
                'client_email' => $credit->getClient()?->getEmail(),
                // Message d'erreur retourne par l'exception.
                'error' => $e->getMessage(),
            ]);
        }

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
    public function finalize(int $id, EntityManagerInterface $em, ContractPdfGenerator $pdfGen, SupabaseStorageService $supabase, ValidatorInterface $validator, ContractBrevoService $contractBrevoService, LoggerInterface $logger): Response
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
        $dateFin = (clone($credit->getDateDebutPaiement() ?? new \DateTime()))->modify('+' . $credit->getDureeEnMois() . ' months');
        $contrat->setDateFin($dateFin);
        // Le contrat devient actif apres creation
        $contrat->setStatut('ACTIVE');
        // Evite une erreur SQL si la colonne chemin_fichier en base n'accepte pas encore NULL
        $contrat->setCheminFichier('');

        // Verifie que le contrat est valide avant insertion
        if ($response = $this->handleValidationErrors($validator->validate($contrat))) {
            return $response;
        }

        // Insere le contrat en base d'abord pour avoir son ID
        $em->persist($contrat);
        $credit->setStatut(CreditStatus::ACTIVE);
        $em->flush();

        // Generate PDF and upload to Supabase
        $pdfBytes = $pdfGen->generate($credit, $contrat); // creer pdf
        $path = $supabase->makePath('contracts', 'Contrat_' . $contrat->getNumeroContrat()); // prepare path -num exp:contracts/Contrat_ABC123.pdf
        $publicUrl = $supabase->upload($path, $pdfBytes); // envoi pdf +path lil supabes
        if ($publicUrl) {
            $contrat->setCheminFichier($publicUrl); // champ en base http ..
            $em->flush();
        }

        $emailSent = false; // verifier email non envoi
        $brevoConfigured = $contractBrevoService->isConfigured(); //verifier vonfig 

        try {
            if ($brevoConfigured) {
                $contractBrevoService->sendContractEmail($credit->getClient(), $contrat, $pdfBytes);
                $emailSent = true;
            } else {
                $this->addFlash('warning', 'Contrat genere, mais Brevo n\'est pas configure. Ajoutez BREVO_API_KEY dans .env.');
            }
        } catch (\Throwable $e) { //souvgarde erreur
            $this->addFlash('warning', 'Contrat genere, mais l\'envoi Brevo a echoue.');
            $logger->error('Echec envoi contrat via Brevo.', [
                'credit_id' => $credit->getIdCredit(),
                'contrat_numero' => $contrat->getNumeroContrat(),
                'client_email' => $credit->getClient()?->getEmail(),
                'error' => $e->getMessage(),
            ]);
        }

        // succes pour l'admin.
        $message = 'Contrat ' . $contrat->getNumeroContrat() . ' genere et credit active.';
        // Si le PDF a ete stocke en ligne, 
        if ($publicUrl) {
            $message .= ' PDF stocke en ligne.';
        }
        // Si l'email a ete envoye au client, 
        if ($emailSent) {
            $message .= ' Contrat envoye au client par Brevo.';
        }

        $this->addFlash('success', $message);
        // Redirige l'admin vers la liste des credits.
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
    // stat -----------------------------------------------------------------------

    private function buildStatsData(CreditRepository $repo): array // credit au bd
    {
        // tableau de configuration des mois : label court + couleur




        $monthConfig = [
            ['label' => 'Jan', 'color' => '#2563eb'],
            ['label' => 'Fev', 'color' => '#0ea5e9'],
            ['label' => 'Mar', 'color' => '#7c3aed'],
            ['label' => 'Avr', 'color' => '#14b8a6'],
            ['label' => 'Mai', 'color' => '#22c55e'],
            ['label' => 'Jun', 'color' => '#84cc16'],
            ['label' => 'Jul', 'color' => '#eab308'],
            ['label' => 'Aou', 'color' => '#f59e0b'],
            ['label' => 'Sep', 'color' => '#f97316'],
            ['label' => 'Oct', 'color' => '#ef4444'],
            ['label' => 'Nov', 'color' => '#ec4899'],
            ['label' => 'Dec', 'color' => '#6366f1'],
        ];
        //6 dernier mois
        $now = new \DateTimeImmutable('first day of this month'); // date 1ere  jour a cette mois
        $months = [];

        for ($i = 5; $i >= 0; --$i) {
            $monthDate = $now->modify('-' . $i . ' months'); // returne a la mois apartire ce jout -1 month
            $monthNumber = (int) $monthDate->format('n'); // numero mois au date  2=fiv
            $months[$monthDate->format('Y-m')] = [ //mois +years
                'label' => $monthConfig[$monthNumber - 1]['label'] . ' ' . $monthDate->format('Y'),
                'color' => $monthConfig[$monthNumber - 1]['color'],
                'count' => 0, //count credt debut 0
            ];
        }
        //recuper credit et somme 

        foreach ($repo->findBy([], ['dateCreation' => 'DESC']) as $credit) { //recupere credit 
            $dateCreation = $credit->getDateCreation(); // creper date de cette credit
            // si aucune date n'existe, on ignore ce credit
            if (!$dateCreation) {
                continue;
            }

            $key = $dateCreation->format('Y-m'); // trensforme en mois 
            if (isset($months[$key])) { // verifier exsiste ou non
                // incremente le nombre de credits pour ce mois
                $months[$key]['count']++;
            }
        }

        // contiendra les morceaux du gradient du graphique '#2563eb 0% 20%',
        $segments = [];
        // contiendra les donnees de la legende(lklem ))
        $legend = [];
        // calcule le nombre total de credits sur la periode
        $totalCredits = array_sum(array_column($months, 'count'));
        // position de depart du prochain segment dans le cercle
        $offset = 0.0;

        // parcours chaque mois pour construire legende et gradient
        foreach ($months as $month) {
            // nombre de credits pour ce mois
            $count = $month['count'];
            // pourcentage de ce mois par rapport au total
            $percentage = $totalCredits > 0 ? round(($count / $totalCredits) * 100, 1) : 0.0;

            // ajoute une ligne dans la legende
            // pour traduire les color
            $legend[] = [
                'label' => $month['label'],
                'color' => $month['color'],
                'count' => $count,
                'percentage' => $percentage,
            ];

            // si aucun credit dans ce mois, on ne cree pas de segment visuel
            if ($count <= 0 || $totalCredits <= 0) {
                continue;
            }

            // calcule la fin du segment selon sa part dans le total
            $end = $offset + (($count / $totalCredits) * 100);
            // cree un segment CSS pour le conic-gradient
            $segments[] = sprintf('%s %.2f%% %.2f%%', $month['color'], $offset, $end);
            // deplace le point de depart pour le segment suivant
            $offset = $end;
        }

        // retourne toutes les donnees necessaires au template Twig
        return [
            // chaine CSS du gradient du graphique
            'chartGradient' => $segments ? implode(', ', $segments) : '#e5e7eb 0% 100%',
            // tableau de legende pour l'affichage detaille
            'legend' => $legend,
            // total global des credits sur les 6 mois
            'totalCredits' => $totalCredits,
        ];
    }
}

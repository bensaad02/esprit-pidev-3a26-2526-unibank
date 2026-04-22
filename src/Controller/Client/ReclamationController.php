<?php

namespace App\Controller\Client;

use App\Entity\Reclamation;
use App\Enum\ReclamationStatus;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Service\ImageModerationService;
use App\Service\SentimentAnalysisService;
use App\Service\DuplicateDetectionService;
use App\Service\MLClaimClassifier;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Contrôleur pour la gestion des réclamations côté client (espace utilisateur)
 * Permet aux clients de créer, modifier, consulter et annuler leurs réclamations
 * Hérite de BaseClientController pour la vérification d'approbation
 */
#[Route('/client/reclamations')]
class ReclamationController extends BaseClientController
{
    /**
     * Affiche la liste des réclamations de l'utilisateur connecté
     * Avec pagination, filtres et statistiques
     * 
     * @param Request $request - Requête HTTP (paramètres de filtre, pagination)
     * @param ReclamationRepository $repo - Repository des réclamations
     * @param PaginatorInterface $paginator - Service de pagination Knp
     * @return Response - Vue avec la liste paginée
     */
    #[Route('', name: 'app_client_reclamations')]
    public function index(
        Request $request, 
        ReclamationRepository $repo,
        PaginatorInterface $paginator
    ): Response {
        // Vérification que l'utilisateur est approuvé
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();

        // Récupération des paramètres de filtrage et pagination
        $search = $request->query->get('search');           // Recherche textuelle
        $sort = $request->query->get('sort', 'date_desc');  // Tri (date, statut, type)
        $page = $request->query->getInt('page', 1);         // Page courante
        $limit = $request->query->getInt('limit', 10);      // Éléments par page

        // Construction de la requête de base (réclamations de l'utilisateur)
        $qb = $repo->createQueryBuilder('r')
            ->where('r.utilisateur = :user')
            ->setParameter('user', $user);

        // Application du filtre de recherche si fourni
        if (!empty($search)) {
            $qb->andWhere('r.sujet LIKE :search OR r.description LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        // Application du tri selon le paramètre choisi
        switch ($sort) {
            case 'date_asc':
                $qb->orderBy('r.dateReclamation', 'ASC');
                break;
            case 'statut':
                $qb->orderBy('r.statut', 'ASC');
                break;
            case 'type':
                $qb->orderBy('r.type', 'ASC');
                break;
            case 'date_desc':
            default:
                $qb->orderBy('r.dateReclamation', 'DESC');
                break;
        }

        // Pagination des résultats
        $pagination = $paginator->paginate($qb, $page, $limit);

        // Récupération de toutes les réclamations pour les statistiques
        $allReclamations = $repo->createQueryBuilder('r')
            ->where('r.utilisateur = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
            
        // Calcul des statistiques par statut
        $stats = [
            'total' => count($allReclamations),                                                    // Total des réclamations
            'en_attente' => count(array_filter($allReclamations, fn($r) => $r->getStatut() === ReclamationStatus::EN_ATTENTE)), // En attente
            'en_cours' => count(array_filter($allReclamations, fn($r) => $r->getStatut() === ReclamationStatus::EN_COURS)),     // En cours
            'traite' => count(array_filter($allReclamations, fn($r) => $r->getStatut() === ReclamationStatus::TRAITE)),         // Traitées
            'rejete' => count(array_filter($allReclamations, fn($r) => $r->getStatut() === ReclamationStatus::REJETE)),         // Rejetées
        ];

        // Données pré-remplies pour le modal de création (en cas d'erreur)
        $formData = [
            'sujet' => $request->query->get('sujet', ''),
            'description' => $request->query->get('description', ''),
            'type' => $request->query->get('type', '')
        ];
        
        $showModal = $request->query->get('show_modal', false);

        // Rendu de la vue avec toutes les données
        return $this->render('client/reclamation/index.html.twig', [
            'pagination' => $pagination,
            'stats' => $stats,
            'search' => $search,
            'sort' => $sort,
            'limit' => $limit,
            'form_data' => $formData,
            'show_modal' => $showModal
        ]);
    }

    /**
     * Crée une nouvelle réclamation (traitement du formulaire)
     * Intègre la modération d'image, l'analyse de sentiment, la détection de doublons
     * et les suggestions IA (sans modification automatique)
     * 
     * @param Request $request - Requête avec les données du formulaire
     * @param EntityManagerInterface $em - Entity manager
     * @param SluggerInterface $slugger - Pour sécuriser les noms de fichiers
     * @param ImageModerationService $moderationService - Modération des images
     * @param SentimentAnalysisService $sentimentService - Analyse du sentiment
     * @param DuplicateDetectionService $duplicateService - Détection de doublons
     * @param MLClaimClassifier $mlClassifier - Classification ML pour suggestions
     * @return Response - Redirection vers la liste
     */
    #[Route('/new', name: 'app_client_reclamation_new', methods: ['POST'])]
    public function new(
        Request $request, 
        EntityManagerInterface $em, 
        SluggerInterface $slugger,
        ImageModerationService $moderationService,
        SentimentAnalysisService $sentimentService,
        DuplicateDetectionService $duplicateService,
        MLClaimClassifier $mlClassifier
    ): Response {
        // Vérification que l'utilisateur est approuvé
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();
        
        // Récupération des données du formulaire
        $sujet = trim($request->request->get('sujet', ''));
        $description = trim($request->request->get('description', ''));
        $type = $request->request->get('type', 'autre');
        
        // Validation des champs obligatoires
        if (empty($sujet) || empty($description)) {
            $this->addFlash('error', 'Veuillez remplir tous les champs obligatoires.');
            return $this->redirectToRoute('app_client_reclamations', [
                'sujet' => $sujet,
                'description' => $description,
                'type' => $type,
                'show_modal' => 'true'
            ]);
        }
        
        // Détection des doublons (réclamations similaires dans les 7 derniers jours)
        $dateLimite = new \DateTime('-7 days');
        $reclamationsRecent = $em->getRepository(Reclamation::class)->createQueryBuilder('r')
            ->where('r.utilisateur = :user')
            ->andWhere('r.dateReclamation > :date')
            ->setParameter('user', $user)
            ->setParameter('date', $dateLimite)
            ->getQuery()
            ->getResult();
        
        $verificationDoublon = $duplicateService->detecterDoublon($description, $reclamationsRecent);
        
        // Si doublon détecté, on avertit l'utilisateur mais on laisse continuer
        if ($verificationDoublon['est_doublon']) {
            $this->addFlash('warning', $verificationDoublon['message']);
            return $this->redirectToRoute('app_client_reclamations', [
                'sujet' => $sujet,
                'description' => $description,
                'type' => $type,
                'show_modal' => 'true'
            ]);
        }
        
        // ============================================
        // 🧠 SUGGESTION IA (SANS MODIFICATION AUTOMATIQUE)
        // ============================================
        // L'IA ne fait que suggérer, elle ne modifie PAS le type
        // Le type choisi par le client reste celui qu'il a sélectionné
        // (même "autre") pour que l'admin puisse voir la suggestion
        
        if ($mlClassifier->isModelTrained()) {
            $prediction = $mlClassifier->predict($description);
            
            // Stocker la suggestion en session pour l'afficher après redirection
            // ou simplement afficher un message
            if ($type === 'autre' && $prediction['is_reliable']) {
                $this->addFlash('info', sprintf(
                    '🤖 L\'IA suggère la catégorie : %s (confiance: %s%%). Notre équipe traitera votre réclamation avec la plus grande attention.',
                    $prediction['category_label'],
                    $prediction['confidence']
                ));
            }
        }
        
        // Création de la réclamation avec le type CHOISI PAR LE CLIENT
        // (pas modifié par l'IA)
        $reclamation = new Reclamation();
        $reclamation->setUtilisateur($user);
        $reclamation->setSujet($sujet);
        $reclamation->setDescription($description);
        $reclamation->setType($type);  // ← On garde le type choisi par le client
        $reclamation->setStatut(ReclamationStatus::EN_ATTENTE);
        $reclamation->setDateReclamation(new \DateTimeImmutable());
        
        // Analyse du sentiment du texte (positif, négatif, neutre)
        $sentimentResult = $sentimentService->analyserSentiment($description);
        $reclamation->setSentiment($sentimentResult['sentiment']);
        
        // Alerte si le client est insatisfait (priorité élevée)
        if ($sentimentResult['estInsatisfait']) {
            $this->addFlash('warning', '⚠️ Réclamation prioritaire détectée (client insatisfait)');
        }
        
        // Gestion du téléchargement d'image avec modération
        /** @var UploadedFile $imageFile */
        $imageFile = $request->files->get('image');
        
        if ($imageFile && $imageFile->getSize() > 0) {
            // Vérification du contenu de l'image (contenu inapproprié)
            $verification = $moderationService->verifierImage($imageFile);
            
            if (!$verification['is_appropriate']) {
                $this->addFlash('error', $verification['message']);
                return $this->redirectToRoute('app_client_reclamations', [
                    'sujet' => $sujet,
                    'description' => $description,
                    'type' => $type,
                    'show_modal' => 'true'
                ]);
            }
            
            // Sauvegarde sécurisée de l'image
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
            
            try {
                $imageFile->move(
                    $this->getParameter('reclamations_directory'),
                    $newFilename
                );
                $reclamation->setImagePath($newFilename);
            } catch (FileException $e) {
                $this->addFlash('warning', 'L\'image n\'a pas pu être téléchargée mais votre réclamation a été enregistrée.');
            }
        }
        
        // Sauvegarde en base de données
        $em->persist($reclamation);
        $em->flush();
        
        $this->addFlash('success', 'Votre réclamation a été soumise avec succès.');
        return $this->redirectToRoute('app_client_reclamations');
    }

    /**
     * Affiche les détails d'une réclamation spécifique
     * Vérifie que la réclamation appartient bien à l'utilisateur connecté
     * 
     * @param int $id - ID de la réclamation
     * @param EntityManagerInterface $em - Entity manager
     * @return Response - Vue détaillée de la réclamation
     */
    #[Route('/{id}', name: 'app_client_reclamations_show', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $em): Response
    {
        // Vérification que l'utilisateur est approuvé
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;
        
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        // Vérification des droits d'accès (propriétaire de la réclamation)
        if (!$reclamation || $reclamation->getUtilisateur()->getIdUtilisateur() !== $this->getUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        return $this->render('client/reclamation/show.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }

    /**
     * Modifie une réclamation existante (uniquement si elle est en attente)
     * Permet de mettre à jour le sujet, la description, le type et l'image
     * 
     * @param int $id - ID de la réclamation
     * @param Request $request - Requête avec les nouvelles données
     * @param EntityManagerInterface $em - Entity manager
     * @param ValidatorInterface $validator - Validateur de données
     * @param SluggerInterface $slugger - Pour sécuriser les noms de fichiers
     * @param ImageModerationService $moderationService - Modération des images
     * @return Response - Redirection vers la liste
     */
    #[Route('/{id}/edit', name: 'app_client_reclamation_edit', methods: ['POST'])]
    public function edit(
        int $id, 
        Request $request, 
        EntityManagerInterface $em, 
        ValidatorInterface $validator, 
        SluggerInterface $slugger,
        ImageModerationService $moderationService
    ): Response {
        // Vérification que l'utilisateur est approuvé
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;
        
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        // Vérification des droits d'accès
        if (!$reclamation || $reclamation->getUtilisateur()->getIdUtilisateur() !== $this->getUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        // Vérification que la réclamation est modifiable (statut "en attente" uniquement)
        if ($reclamation->getStatut() !== ReclamationStatus::EN_ATTENTE) {
            $this->addFlash('error', 'Seules les réclamations en attente peuvent être modifiées.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        // Récupération des données modifiées
        $sujet = trim($request->request->get('sujet', ''));
        $description = trim($request->request->get('description', ''));
        $type = $request->request->get('type', 'autre');
        
        // Validation des champs obligatoires
        if (empty($sujet) || empty($description)) {
            $this->addFlash('error', 'Veuillez remplir tous les champs obligatoires.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        // Mise à jour des champs
        $reclamation->setSujet($sujet);
        $reclamation->setDescription($description);
        $reclamation->setType($type);
        
        // Gestion du téléchargement d'une nouvelle image
        /** @var UploadedFile $imageFile */
        $imageFile = $request->files->get('image');
        
        if ($imageFile && $imageFile->getSize() > 0) {
            // Vérification du contenu de la nouvelle image
            $verification = $this->verifierImageAvantUpload($imageFile, $moderationService);
            
            if (!$verification['is_appropriate']) {
                $this->addFlash('error', $verification['message']);
                return $this->redirectToRoute('app_client_reclamations');
            }
            
            // Sauvegarde de la nouvelle image
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();
            
            try {
                $imageFile->move(
                    $this->getParameter('reclamations_directory'),
                    $newFilename
                );
                
                // Suppression de l'ancienne image si elle existe
                if ($reclamation->getImagePath()) {
                    $oldImagePath = $this->getParameter('reclamations_directory') . '/' . $reclamation->getImagePath();
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                
                $reclamation->setImagePath($newFilename);
                $this->addFlash('success', '✅ Nouvelle image vérifiée et acceptée.');
                
            } catch (FileException $e) {
                $this->addFlash('warning', 'L\'image n\'a pas pu être mise à jour.');
            }
        }
        
        // Suppression de l'image si demandé
        if ($request->request->has('remove_image') && $reclamation->getImagePath()) {
            $oldImagePath = $this->getParameter('reclamations_directory') . '/' . $reclamation->getImagePath();
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $reclamation->setImagePath(null);
            $this->addFlash('info', 'Image supprimée.');
        }
        
        // Validation des données avant sauvegarde
        if ($response = $this->handleValidationErrors($validator->validate($reclamation))) {
            return $response;
        }
        
        // Sauvegarde en base de données
        $em->flush();
        
        $this->addFlash('success', 'Votre réclamation a été modifiée avec succès.');
        return $this->redirectToRoute('app_client_reclamations');
    }

    /**
     * Annule une réclamation (passe le statut à "rejeté")
     * Uniquement pour les réclamations en attente
     * 
     * @param int $id - ID de la réclamation
     * @param Request $request - Requête avec token CSRF
     * @param EntityManagerInterface $em - Entity manager
     * @return Response - Redirection vers la liste
     */
    #[Route('/{id}/cancel', name: 'app_client_reclamation_cancel', methods: ['POST'])]
    public function cancel(int $id, Request $request, EntityManagerInterface $em): Response
    {
        // Vérification que l'utilisateur est approuvé
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;
        
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        // Vérification des droits d'accès
        if (!$reclamation || $reclamation->getUtilisateur()->getIdUtilisateur() !== $this->getUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        // Vérification que la réclamation est annulable (statut "en attente" uniquement)
        if ($reclamation->getStatut() !== ReclamationStatus::EN_ATTENTE) {
            $this->addFlash('error', 'Seules les réclamations en attente peuvent être annulées.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        // Vérification du token CSRF pour la sécurité
        if ($this->isCsrfTokenValid('cancel' . $reclamation->getId(), $request->request->get('_token'))) {
            $reclamation->setStatut(ReclamationStatus::REJETE);
            $em->flush();
            $this->addFlash('success', 'Votre réclamation a été annulée.');
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }
        
        return $this->redirectToRoute('app_client_reclamations');
    }

    /**
     * Supprime définitivement une réclamation (uniquement si en attente)
     * Supprime également l'image associée
     * 
     * @param int $id - ID de la réclamation
     * @param Request $request - Requête avec token CSRF
     * @param EntityManagerInterface $em - Entity manager
     * @return Response - Redirection vers la liste
     */
    #[Route('/{id}/delete', name: 'app_client_reclamation_delete', methods: ['POST'])]
    public function delete(int $id, Request $request, EntityManagerInterface $em): Response
    {
        // Vérification que l'utilisateur est approuvé
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;
        
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        // Vérification des droits d'accès
        if (!$reclamation || $reclamation->getUtilisateur()->getIdUtilisateur() !== $this->getUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        // Vérification que la réclamation est supprimable (statut "en attente" uniquement)
        if ($reclamation->getStatut() !== ReclamationStatus::EN_ATTENTE) {
            $this->addFlash('error', 'Seules les réclamations en attente peuvent être supprimées.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        // Vérification du token CSRF pour la sécurité
        if ($this->isCsrfTokenValid('delete' . $reclamation->getId(), $request->request->get('_token'))) {
            // Suppression de l'image associée
            if ($reclamation->getImagePath()) {
                $imagePath = $this->getParameter('reclamations_directory') . '/' . $reclamation->getImagePath();
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            
            // Suppression de la réclamation
            $em->remove($reclamation);
            $em->flush();
            $this->addFlash('success', 'Votre réclamation a été supprimée avec succès.');
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }
        
        return $this->redirectToRoute('app_client_reclamations');
    }

    /**
     * Vérifie le contenu d'une image avant téléchargement (wrapper)
     * 
     * @param UploadedFile $imageFile - Fichier image à vérifier
     * @param ImageModerationService $moderationService - Service de modération
     * @return array - Résultat de la vérification (is_appropriate, message)
     */
    private function verifierImageAvantUpload(UploadedFile $imageFile, ImageModerationService $moderationService): array
    {
        return $moderationService->verifierContenuImage($imageFile);
    }

    /**
     * Gère les erreurs de validation et ajoute des messages flash
     * 
     * @param ConstraintViolationListInterface $violations - Liste des violations
     * @return RedirectResponse|null - Redirection si erreurs, null sinon
     */
    private function handleValidationErrors(ConstraintViolationListInterface $violations): ?RedirectResponse
    {
        if (count($violations) === 0) {
            return null;
        }

        foreach ($violations as $violation) {
            $this->addFlash('error', $violation->getMessage());
        }

        return $this->redirectToRoute('app_client_reclamations');
    }
}
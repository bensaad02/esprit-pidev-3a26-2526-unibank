<?php

namespace App\Controller\Admin;

use App\Entity\Reclamation;
use App\Entity\User;
use App\Enum\ReclamationStatus;
use App\Form\ReclamationType;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Service\NotificationService;
use App\Service\AutoReplyService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Knp\Component\Pager\PaginatorInterface;
use App\Service\MLClaimClassifier;
use App\Service\TextSummarizer;

/**
 * Contrôleur pour la gestion des réclamations dans l'interface admin
 * Gère l'affichage, modification, suppression, et analyse des réclamations
 */
#[Route('/admin/reclamations')]
class ReclamationController extends AbstractController
{
    /**
     * Affiche la liste paginée des réclamations avec filtres
     * 
     * @param Request $request - Requête HTTP contenant les paramètres de filtre
     * @param ReclamationRepository $repo - Repository des réclamations
     * @param PaginatorInterface $paginator - Service de pagination Knp
     * @return Response - Vue avec la liste paginée et les statistiques
     */
    #[Route('', name: 'app_admin_reclamations')]
    public function index(
        Request $request, 
        ReclamationRepository $repo,
        PaginatorInterface $paginator
    ): Response
    {
        // Récupération des paramètres de filtrage depuis la requête
        $status = $request->query->get('status', 'all');      // Filtre par statut
        $type = $request->query->get('type', 'all');          // Filtre par type
        $search = $request->query->get('q', '');              // Recherche textuelle
        $sentiment = $request->query->get('sentiment', 'all'); // Filtre par sentiment
        
        // Pagination : numéro de page (défaut: 1)
        $page = $request->query->getInt('page', 1);
        
        // Pagination : nombre d'éléments par page (défaut: 10)
        $limit = $request->query->getInt('limit', 10);

        // Construction de la requête avec les filtres
        $queryBuilder = $repo->createFilteredQueryBuilder($status, $type, $search, $sentiment);
        
        // Tri personnalisé : les sentiments négatifs apparaissent en premier
        $queryBuilder->addSelect('CASE WHEN r.sentiment = :negatif THEN 1 WHEN r.sentiment = :neutre THEN 2 WHEN r.sentiment = :positif THEN 3 ELSE 4 END AS HIDDEN priority')
            ->setParameter('negatif', 'negatif')
            ->setParameter('neutre', 'neutre')
            ->setParameter('positif', 'positif')
            ->orderBy('priority', 'ASC');
        
        // Application de la pagination
        $pagination = $paginator->paginate(
            $queryBuilder,  // QueryBuilder à paginer
            $page,          // Page courante
            $limit          // Éléments par page
        );

        // Calcul des statistiques globales (sur toutes les réclamations)
        $stats = [
            'total' => $repo->countAll(),                                    // Total général
            'en_attente' => $repo->countByStatus(ReclamationStatus::EN_ATTENTE), // En attente
            'en_cours' => $repo->countByStatus(ReclamationStatus::EN_COURS),     // En cours
            'traite' => $repo->countByStatus(ReclamationStatus::TRAITE),         // Traitées
            'rejete' => $repo->countByStatus(ReclamationStatus::REJETE),         // Rejetées
            'positif' => $repo->countBySentiment('positif'),                     // Sentiment positif
            'negatif' => $repo->countBySentiment('negatif'),                     // Sentiment négatif
            'neutre' => $repo->countBySentiment('neutre'),                       // Sentiment neutre
            'prioritaires' => $repo->countBySentiment('negatif'),                // À traiter en priorité
        ];

        // Rendu de la vue avec toutes les données
        return $this->render('admin/reclamation/index.html.twig', [
            'pagination' => $pagination,  // Données paginées
            'stats' => $stats,             // Statistiques
            'status' => $status,           // Filtre statut actif
            'type' => $type,               // Filtre type actif
            'search' => $search,           // Terme de recherche
            'sentiment' => $sentiment,     // Filtre sentiment actif
            'limit' => $limit,             // Limite par page
        ]);
    }

    /**
     * Génère un PDF de toutes les réclamations avec les filtres actuels
     * 
     * @param Request $request - Requête avec les paramètres de filtre
     * @param ReclamationRepository $reclamationRepository - Repository des réclamations
     * @return Response - Fichier PDF en téléchargement
     */
    #[Route('/pdf', name: 'app_admin_reclamations_pdf')]
    public function generatePdf(Request $request, ReclamationRepository $reclamationRepository): Response
    {
        // Récupération des mêmes filtres que l'affichage
        $status = $request->query->get('status');
        $type = $request->query->get('type');
        $sentiment = $request->query->get('sentiment');
        $search = $request->query->get('q');
        
        // Application des filtres pour récupérer les données
        $reclamations = $reclamationRepository->findAllFiltered($status, $type, $search, $sentiment);
        
        // Calcul des statistiques pour l'affichage dans le PDF
        $stats = [
            'total' => $reclamationRepository->countAll(),
            'en_attente' => $reclamationRepository->countByStatus(ReclamationStatus::EN_ATTENTE),
            'en_cours' => $reclamationRepository->countByStatus(ReclamationStatus::EN_COURS),
            'traite' => $reclamationRepository->countByStatus(ReclamationStatus::TRAITE),
            'rejete' => $reclamationRepository->countByStatus(ReclamationStatus::REJETE),
            'positif' => $reclamationRepository->countBySentiment('positif'),
            'negatif' => $reclamationRepository->countBySentiment('negatif'),
            'neutre' => $reclamationRepository->countBySentiment('neutre'),
        ];
        
        // Génération du contenu HTML pour le PDF
        $html = $this->renderView('admin/reclamation/reclamations_pdf.html.twig', [
            'reclamations' => $reclamations,
            'stats' => $stats,
            'filters' => [
                'status' => $status,
                'type' => $type,
                'sentiment' => $sentiment,
                'search' => $search
            ],
            'generated_at' => new \DateTime()
        ]);
        
        // Configuration de Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        
        // Génération du PDF
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');  // Format paysage pour plus de colonnes
        $dompdf->render();
        
        // Téléchargement du fichier
        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="reclamations_' . date('Y-m-d_H-i-s') . '.pdf"'
        ]);
    }

    /**
     * Affiche les détails d'une réclamation spécifique
     * 
     * @param Reclamation $reclamation - La réclamation à afficher (via ParamConverter)
     * @return Response - Vue détaillée de la réclamation
     */
    #[Route('/{id}', name: 'app_admin_reclamations_show', methods: ['GET'])]
    public function show(Reclamation $reclamation): Response
    {
        return $this->render('admin/reclamation/show.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }

    /**
     * Édite une réclamation existante
     * 
     * @param Request $request - Requête HTTP
     * @param Reclamation $reclamation - Réclamation à éditer
     * @param EntityManagerInterface $em - Entity manager pour la sauvegarde
     * @param ValidatorInterface $validator - Validateur de données
     * @param SluggerInterface $slugger - Pour sécuriser les noms de fichiers
     * @return Response - Redirection ou formulaire d'édition
     */
    #[Route('/{id}/edit', name: 'app_admin_reclamations_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reclamation $reclamation, EntityManagerInterface $em, ValidatorInterface $validator, SluggerInterface $slugger): Response
    {
        if ($request->isMethod('POST')) {
            // Récupération des données du formulaire
            $sujet = $request->request->get('sujet');
            $description = $request->request->get('description');
            $statut = $request->request->get('statut');
            $type = $request->request->get('type');
            $sentiment = $request->request->get('sentiment');

            // Mise à jour des champs uniquement s'ils sont fournis
            if ($sujet) $reclamation->setSujet($sujet);
            if ($description) $reclamation->setDescription($description);
            if ($statut) $reclamation->setStatut($statut);
            if ($type) $reclamation->setType($type);
            if ($sentiment) $reclamation->setSentiment($sentiment);

            // Gestion du téléchargement d'image
            /** @var UploadedFile $imageFile */
            $imageFile = $request->files->get('image');
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                try {
                    // Sauvegarde de la nouvelle image
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
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors du téléchargement de l\'image.');
                }
            }

            // Validation des données
            if ($response = $this->handleValidationErrors($validator->validate($reclamation))) {
                return $response;
            }

            // Sauvegarde en base de données
            $em->flush();
            $this->addFlash('success', 'Réclamation modifiée avec succès.');
            return $this->redirectToRoute('app_admin_reclamations');
        }

        return $this->render('admin/reclamation/edit.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }

    /**
     * Change le statut d'une réclamation (AJAX ou formulaire)
     * Envoie une notification par email si le statut devient "traité"
     * 
     * @param int $id - ID de la réclamation
     * @param Request $request - Requête avec le nouveau statut
     * @param EntityManagerInterface $em - Entity manager
     * @param ValidatorInterface $validator - Validateur
     * @param NotificationService $notificationService - Service d'envoi d'emails
     * @return Response - Redirection vers la liste
     */
    #[Route('/{id}/status', name: 'app_admin_reclamations_status', methods: ['POST'])]
    public function changeStatus(
        int $id, 
        Request $request, 
        EntityManagerInterface $em, 
        ValidatorInterface $validator,
        NotificationService $notificationService
    ): Response {
        // Récupération de la réclamation
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        if (!$reclamation) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_admin_reclamations');
        }

        // Récupération des nouvelles données
        $newStatus = $request->request->get('status');
        $reponse = $request->request->get('reponse');

        // Validation du statut
        if (!in_array($newStatus, ['en_attente', 'en_cours', 'traite', 'rejete'])) {
            $this->addFlash('error', 'Statut invalide.');
            return $this->redirectToRoute('app_admin_reclamations');
        }

        $oldStatus = $reclamation->getStatut();
        $reclamation->setStatut($newStatus);

        // Ajout d'une réponse si fournie
        if ($reponse) {
            $reclamation->setReponse($reponse);
            $reclamation->setReponseDate(new \DateTimeImmutable());
            $reclamation->setReponsePar($this->getUser());
        }

        // Enregistrement de la date de traitement si le statut devient "traité"
        if ($newStatus === 'traite' && !$reclamation->getDateTraitement()) {
            $reclamation->setDateTraitement(new \DateTimeImmutable());
        }

        $em->flush();

        // Notification par email si la réclamation est traitée
        if ($newStatus === 'traite' && $oldStatus !== 'traite') {
            $utilisateur = $reclamation->getUtilisateur();
            $notificationService->notifierReclamationTraitee($reclamation, $utilisateur);
            $this->addFlash('success', '✅ Réclamation traitée et client notifié par email.');
        } else {
            $this->addFlash('success', sprintf('Statut changé de "%s" à "%s"', $oldStatus, $newStatus));
        }

        return $this->redirectToRoute('app_admin_reclamations');
    }

    /**
     * Supprime une réclamation (avec suppression de l'image associée)
     * 
     * @param int $id - ID de la réclamation
     * @param Request $request - Requête avec token CSRF
     * @param EntityManagerInterface $em - Entity manager
     * @return Response - Redirection vers la liste
     */
    #[Route('/{id}/delete', name: 'app_admin_reclamations_delete', methods: ['POST'])]
    public function delete(int $id, Request $request, EntityManagerInterface $em): Response
    {
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        if (!$reclamation) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_admin_reclamations');
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
            $this->addFlash('success', 'Réclamation supprimée avec succès.');
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('app_admin_reclamations');
    }

    /**
     * Ajoute une réponse à une réclamation et notifie le client par email
     * 
     * @param int $id - ID de la réclamation
     * @param Request $request - Requête avec le contenu de la réponse
     * @param EntityManagerInterface $em - Entity manager
     * @param NotificationService $notificationService - Service de notification
     * @return Response - Redirection vers la page de la réclamation
     */
    #[Route('/{id}/response', name: 'app_admin_reclamations_response', methods: ['POST'])]
    public function addResponse(
        int $id, 
        Request $request, 
        EntityManagerInterface $em,
        NotificationService $notificationService
    ): Response {
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        if (!$reclamation) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_admin_reclamations');
        }

        $contenu = trim($request->request->get('reponse', ''));
        if (empty($contenu)) {
            $this->addFlash('error', 'La réponse ne peut pas être vide.');
            return $this->redirectToRoute('app_admin_reclamations_show', ['id' => $id]);
        }

        // Création de l'entité Réponse
        $reponse = new \App\Entity\Reponse();
        $reponse->setReclamation($reclamation);
        $reponse->setContenu($contenu);
        $reponse->setAuteur($this->getUser()->getNom() ?? $this->getUser()->getEmail() ?? 'Admin');
        $reponse->setDateReponse(new \DateTimeImmutable());
        
        // Changement automatique du statut si en attente
        if ($reclamation->getStatut() === 'en_attente') {
            $reclamation->setStatut('en_cours');
        }

        $em->persist($reponse);
        $em->flush();

        // Envoi de la notification par email
        $utilisateur = $reclamation->getUtilisateur();
        $emailSent = $notificationService->notifierNouvelleReponse(
            $reclamation, 
            $utilisateur, 
            $contenu, 
            $this->getUser()->getNom() ?? 'Admin'
        );

        if ($emailSent) {
            $this->addFlash('success', '✅ Réponse envoyée et client notifié par email.');
        } else {
            $this->addFlash('warning', '⚠️ Réponse enregistrée mais email non envoyé. Vérifiez la configuration.');
        }

        return $this->redirectToRoute('app_admin_reclamations_show', ['id' => $id]);
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

        return $this->redirectToRoute('app_admin_reclamations');
    }
    
    /**
     * Suggère une réponse automatique pour une réclamation
     * Utilise l'IA pour générer une réponse adaptée au type et au sentiment
     * 
     * @param int $id - ID de la réclamation
     * @param EntityManagerInterface $em - Entity manager
     * @param AutoReplyService $autoReplyService - Service de génération de réponses
     * @return JsonResponse - Suggestion de réponse au format JSON
     */
    #[Route('/{id}/suggest-reply', name: 'app_admin_reclamations_suggest_reply', methods: ['GET'])]
    public function suggestReply(
        int $id,
        EntityManagerInterface $em,
        AutoReplyService $autoReplyService
    ): JsonResponse {
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        if (!$reclamation) {
            return new JsonResponse(['error' => 'Réclamation non trouvée'], 404);
        }
        
        // Génération de la suggestion basée sur la description, le type et le sentiment
        $suggestion = $autoReplyService->suggererReponse(
            $reclamation->getDescription(),
            $reclamation->getType(),
            $reclamation->getSentiment() ?? 'neutre'
        );
        
        return new JsonResponse(['reply' => $suggestion]);
    }

    /**
     * Page de suggestions IA pour les réclamations non catégorisées
     * Affiche les prédictions du modèle ML pour aider à la catégorisation
     * 
     * @param ReclamationRepository $repo - Repository des réclamations
     * @param MLClaimClassifier $mlClassifier - Classifieur ML
     * @return Response - Vue avec les suggestions
     */
    #[Route('/ai-suggestions', name: 'app_admin_reclamations_ai_suggestions')]
    public function aiSuggestions(
        ReclamationRepository $repo,
        MLClaimClassifier $mlClassifier
    ): Response {
        // Récupération des réclamations non catégorisées (type "autre")
        $reclamations = $repo->findBy(['type' => 'autre']);
        
        $suggestions = [];
        foreach ($reclamations as $reclamation) {
            if ($mlClassifier->isModelTrained()) {
                $prediction = $mlClassifier->predict($reclamation->getDescription());
                $suggestions[] = [
                    'reclamation' => $reclamation,
                    'suggestion' => $prediction
                ];
            }
        }
        
        // Statistiques sur la confiance des suggestions
        $stats = [
            'total' => count($suggestions),
            'high_confidence' => count(array_filter($suggestions, fn($s) => $s['suggestion']['confidence'] > 80)),
            'medium_confidence' => count(array_filter($suggestions, fn($s) => $s['suggestion']['confidence'] > 60 && $s['suggestion']['confidence'] <= 80)),
            'low_confidence' => count(array_filter($suggestions, fn($s) => $s['suggestion']['confidence'] <= 60)),
        ];
        
        return $this->render('admin/reclamation/ai_suggestions.html.twig', [
            'suggestions' => $suggestions,
            'stats' => $stats
        ]);
    }

    /**
     * Applique la catégorie suggérée par l'IA à une réclamation
     * 
     * @param int $id - ID de la réclamation
     * @param Request $request - Requête avec la catégorie à appliquer
     * @param EntityManagerInterface $em - Entity manager
     * @return JsonResponse - Statut de l'opération
     */
    #[Route('/{id}/apply-ai-category', name: 'app_admin_reclamations_apply_ai_category', methods: ['POST'])]
    public function applyAICategory(
        int $id,
        Request $request,
        EntityManagerInterface $em
    ): JsonResponse {
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        $data = json_decode($request->getContent(), true);
        
        if (!$reclamation) {
            return new JsonResponse(['success' => false, 'error' => 'Réclamation non trouvée'], 404);
        }
        
        $newType = $data['category'] ?? null;
        $validCategories = ['technique', 'compte', 'transaction', 'carte', 'credit'];
        
        if ($newType && in_array($newType, $validCategories)) {
            $reclamation->setType($newType);
            $em->flush();
            return new JsonResponse(['success' => true]);
        }
        
        return new JsonResponse(['success' => false, 'error' => 'Catégorie invalide'], 400);
    }

    /**
     * Analyse le sentiment d'une réclamation avec le modèle ML
     * Sauvegarde automatiquement le résultat en base de données
     * 
     * @param int $id - ID de la réclamation
     * @param EntityManagerInterface $em - Entity manager
     * @param MLClaimClassifier $mlClassifier - Classifieur ML
     * @return JsonResponse - Résultat de l'analyse
     */
    #[Route('/{id}/ml-classify', name: 'app_admin_reclamations_ml_classify', methods: ['GET'])]
    public function mlClassify(int $id, EntityManagerInterface $em, MLClaimClassifier $mlClassifier): JsonResponse
    {
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        if (!$reclamation) {
            return new JsonResponse(['success' => false, 'error' => 'Réclamation non trouvée'], 404);
        }
        
        $prediction = $mlClassifier->predict($reclamation->getDescription());
        
        // Sauvegarde automatique du sentiment en base de données
        if (isset($prediction['sentiment'])) {
            $reclamation->setSentiment($prediction['sentiment']);
            $em->flush();
            
            $this->addFlash('success', sprintf(
                'Sentiment analysé: %s (confiance: %.1f%%)', 
                $prediction['sentiment'], 
                $prediction['confidence'] ?? 0
            ));
        }
        
        return new JsonResponse([
            'success' => true,
            'prediction' => $prediction,
            'saved' => true
        ]);
    }

    /**
     * Applique la catégorie suggérée par le modèle ML
     * 
     * @param int $id - ID de la réclamation
     * @param Request $request - Requête avec la catégorie
     * @param EntityManagerInterface $em - Entity manager
     * @return JsonResponse - Statut de l'opération
     */
    #[Route('/{id}/apply-ml-category', name: 'app_admin_reclamations_apply_ml_category', methods: ['POST'])]
    public function applyMLCategory(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        if (!$reclamation) {
            return new JsonResponse(['success' => false, 'error' => 'Réclamation non trouvée'], 404);
        }
        
        $data = json_decode($request->getContent(), true);
        $category = $data['category'] ?? null;
        
        $validCategories = ['technique', 'compte', 'transaction', 'carte', 'credit', 'autre'];
        
        if ($category && in_array($category, $validCategories)) {
            $reclamation->setType($category);
            $em->flush();
            return new JsonResponse(['success' => true]);
        }
        
        return new JsonResponse(['success' => false, 'error' => 'Catégorie invalide'], 400);
    }

    /**
     * Génère un résumé automatique d'une réclamation
     * 
     * @param int $id - ID de la réclamation
     * @param EntityManagerInterface $em - Entity manager
     * @param TextSummarizer $summarizer - Service de résumé de texte
     * @return JsonResponse - Résumé généré
     */
    #[Route('/{id}/summarize', name: 'app_admin_reclamations_summarize', methods: ['GET'])]
    public function summarize(
        int $id,
        EntityManagerInterface $em,
        TextSummarizer $summarizer
    ): JsonResponse {
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        if (!$reclamation) {
            return new JsonResponse(['error' => 'Réclamation non trouvée'], 404);
        }
        
        // Combinaison du sujet et de la description pour le résumé
        $fullText = $reclamation->getSujet() . '. ' . $reclamation->getDescription();
        
        // Génération du résumé (3 phrases maximum)
        $summary = $summarizer->summarize(
            $fullText,
            3,  // Nombre de phrases maximum
            $reclamation->getType()
        );
        
        return new JsonResponse([
            'success' => true,
            'reclamation_id' => $reclamation->getId(),
            'original' => [
                'text' => $fullText,
                'length' => $summary['original_length']
            ],
            'summary' => $summary
        ]);
    }

    /**
     * Génère un résumé et le sauvegarde automatiquement
     * Version avec persistance du résumé en base de données
     * 
     * @param int $id - ID de la réclamation
     * @param EntityManagerInterface $em - Entity manager
     * @param TextSummarizer $summarizer - Service de résumé de texte
     * @return JsonResponse - Résumé généré
     */
    #[Route('/{id}/summarize-and-save', name: 'app_admin_reclamations_summarize_save', methods: ['POST'])]
    public function summarizeAndSave(
        int $id,
        EntityManagerInterface $em,
        TextSummarizer $summarizer
    ): JsonResponse {
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        if (!$reclamation) {
            return new JsonResponse(['error' => 'Réclamation non trouvée'], 404);
        }
        
        $fullText = $reclamation->getSujet() . '. ' . $reclamation->getDescription();
        $summary = $summarizer->summarize($fullText, 3, $reclamation->getType());
        
        // Optionnel: Sauvegarder le résumé dans un nouveau champ (à décommenter si le champ existe)
        // $reclamation->setSummary($summary['summary']);
        // $em->flush();
        
        return new JsonResponse([
            'success' => true,
            'summary' => $summary
        ]);
    }
}
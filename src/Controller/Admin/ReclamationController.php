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
use App\Service\MLPredictionService;

#[Route('/admin/reclamations')]
class ReclamationController extends AbstractController
{
    #[Route('', name: 'app_admin_reclamations')]
    public function index(
        Request $request, 
        ReclamationRepository $repo,
        PaginatorInterface $paginator
    ): Response
    {
        $status = $request->query->get('status', 'all');
        $type = $request->query->get('type', 'all');
        $search = $request->query->get('q', '');
        $sentiment = $request->query->get('sentiment', 'all');
        
        $page = $request->query->getInt('page', 1);
        $limit = $request->query->getInt('limit', 10);

        $queryBuilder = $repo->createFilteredQueryBuilder($status, $type, $search, $sentiment);
        
        $queryBuilder->addSelect('CASE WHEN r.sentiment = :negatif THEN 1 WHEN r.sentiment = :neutre THEN 2 WHEN r.sentiment = :positif THEN 3 ELSE 4 END AS HIDDEN priority')
            ->setParameter('negatif', 'negatif')
            ->setParameter('neutre', 'neutre')
            ->setParameter('positif', 'positif')
            ->orderBy('priority', 'ASC');
        
        $pagination = $paginator->paginate($queryBuilder, $page, $limit);

        $stats = [
            'total' => $repo->countAll(),
            'en_attente' => $repo->countByStatus(ReclamationStatus::EN_ATTENTE),
            'en_cours' => $repo->countByStatus(ReclamationStatus::EN_COURS),
            'traite' => $repo->countByStatus(ReclamationStatus::TRAITE),
            'rejete' => $repo->countByStatus(ReclamationStatus::REJETE),
            'positif' => $repo->countBySentiment('positif'),
            'negatif' => $repo->countBySentiment('negatif'),
            'neutre' => $repo->countBySentiment('neutre'),
            'prioritaires' => $repo->countBySentiment('negatif'),
        ];

        return $this->render('admin/reclamation/index.html.twig', [
            'pagination' => $pagination,
            'stats' => $stats,
            'status' => $status,
            'type' => $type,
            'search' => $search,
            'sentiment' => $sentiment,
            'limit' => $limit,
        ]);
    }

    #[Route('/pdf', name: 'app_admin_reclamations_pdf')]
    public function generatePdf(Request $request, ReclamationRepository $reclamationRepository): Response
    {
        $status = $request->query->get('status');
        $type = $request->query->get('type');
        $sentiment = $request->query->get('sentiment');
        $search = $request->query->get('q');
        
        $reclamations = $reclamationRepository->findAllFiltered($status, $type, $search, $sentiment);
        
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
        
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        
        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="reclamations_' . date('Y-m-d_H-i-s') . '.pdf"'
        ]);
    }

    #[Route('/{id}', name: 'app_admin_reclamations_show', methods: ['GET'])]
    public function show(Reclamation $reclamation): Response
    {
        return $this->render('admin/reclamation/show.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_reclamations_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reclamation $reclamation, EntityManagerInterface $em, ValidatorInterface $validator, SluggerInterface $slugger): Response
    {
        if ($request->isMethod('POST')) {
            $sujet = $request->request->get('sujet');
            $description = $request->request->get('description');
            $statut = $request->request->get('statut');
            $type = $request->request->get('type');
            $sentiment = $request->request->get('sentiment');

            if ($sujet) $reclamation->setSujet($sujet);
            if ($description) $reclamation->setDescription($description);
            if ($statut) $reclamation->setStatut($statut);
            if ($type) $reclamation->setType($type);
            if ($sentiment) $reclamation->setSentiment($sentiment);

            $imageFile = $request->files->get('image');
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('reclamations_directory'),
                        $newFilename
                    );
                    
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

            if ($response = $this->handleValidationErrors($validator->validate($reclamation))) {
                return $response;
            }

            $em->flush();
            $this->addFlash('success', 'Réclamation modifiée avec succès.');
            return $this->redirectToRoute('app_admin_reclamations');
        }

        return $this->render('admin/reclamation/edit.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }

    #[Route('/{id}/status', name: 'app_admin_reclamations_status', methods: ['POST'])]
    public function changeStatus(
        int $id, 
        Request $request, 
        EntityManagerInterface $em, 
        ValidatorInterface $validator,
        NotificationService $notificationService
    ): Response {
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        if (!$reclamation) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_admin_reclamations');
        }

        $newStatus = $request->request->get('status');
        $reponse = $request->request->get('reponse');

        if (!in_array($newStatus, ['en_attente', 'en_cours', 'traite', 'rejete'])) {
            $this->addFlash('error', 'Statut invalide.');
            return $this->redirectToRoute('app_admin_reclamations');
        }

        $oldStatus = $reclamation->getStatut();
        $reclamation->setStatut($newStatus);

        if ($reponse) {
            $reclamation->setReponse($reponse);
            $reclamation->setReponseDate(new \DateTimeImmutable());
            $reclamation->setReponsePar($this->getUser());
        }

        if ($newStatus === 'traite' && !$reclamation->getDateTraitement()) {
            $reclamation->setDateTraitement(new \DateTimeImmutable());
        }

        $em->flush();

        if ($newStatus === 'traite' && $oldStatus !== 'traite') {
            $utilisateur = $reclamation->getUtilisateur();
            $notificationService->notifierReclamationTraitee($reclamation, $utilisateur);
            $this->addFlash('success', '✅ Réclamation traitée et client notifié par email.');
        } else {
            $this->addFlash('success', sprintf('Statut changé de "%s" à "%s"', $oldStatus, $newStatus));
        }

        return $this->redirectToRoute('app_admin_reclamations');
    }

    #[Route('/{id}/delete', name: 'app_admin_reclamations_delete', methods: ['POST'])]
    public function delete(int $id, Request $request, EntityManagerInterface $em): Response
    {
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        if (!$reclamation) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_admin_reclamations');
        }

        if ($this->isCsrfTokenValid('delete' . $reclamation->getId(), $request->request->get('_token'))) {
            if ($reclamation->getImagePath()) {
                $imagePath = $this->getParameter('reclamations_directory') . '/' . $reclamation->getImagePath();
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            
            $em->remove($reclamation);
            $em->flush();
            $this->addFlash('success', 'Réclamation supprimée avec succès.');
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('app_admin_reclamations');
    }

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

        $reponse = new \App\Entity\Reponse();
        $reponse->setReclamation($reclamation);
        $reponse->setContenu($contenu);
        $reponse->setAuteur($this->getUser()->getNom() ?? $this->getUser()->getEmail() ?? 'Admin');
        $reponse->setDateReponse(new \DateTimeImmutable());
        
        if ($reclamation->getStatut() === 'en_attente') {
            $reclamation->setStatut('en_cours');
        }

        $em->persist($reponse);
        $em->flush();

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
     * Suggère une réponse automatique via l'IA
     */
    #[Route('/{id}/suggest-reply', name: 'app_admin_reclamations_suggest_reply', methods: ['GET'])]
    public function suggestReply(
        int $id,
        EntityManagerInterface $em,
        MLPredictionService $mlService
    ): JsonResponse {
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        if (!$reclamation) {
            return new JsonResponse(['error' => 'Réclamation non trouvée'], 404);
        }
        
        try {
            // Appel simplifié au modèle ML
            $prediction = $mlService->predict($reclamation->getDescription());
            
            return new JsonResponse([
                'reply' => $prediction['reponse_suggerée'],
                'categorie' => $prediction['categorie'],
                'priorite' => $prediction['priorite'],
                'sentiment' => $prediction['sentiment'],
                'confiance' => $prediction['confiance_categorie'],
                'a_reviser' => $prediction['a_reviser']
            ]);
            
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    #[Route('/ai-suggestions', name: 'app_admin_reclamations_ai_suggestions')]
    public function aiSuggestions(
        ReclamationRepository $repo,
        MLClaimClassifier $mlClassifier
    ): Response {
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
        if ($newType && in_array($newType, ['technique', 'compte', 'transaction', 'carte', 'credit'])) {
            $reclamation->setType($newType);
            $em->flush();
            return new JsonResponse(['success' => true]);
        }
        
        return new JsonResponse(['success' => false, 'error' => 'Catégorie invalide'], 400);
    }

    #[Route('/{id}/ml-classify', name: 'app_admin_reclamations_ml_classify', methods: ['GET'])]
    public function mlClassify(int $id, EntityManagerInterface $em, MLClaimClassifier $mlClassifier): JsonResponse
    {
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        if (!$reclamation) {
            return new JsonResponse(['success' => false, 'error' => 'Réclamation non trouvée'], 404);
        }
        
        $prediction = $mlClassifier->predict($reclamation->getDescription());
        
        if (isset($prediction['sentiment'])) {
            $reclamation->setSentiment($prediction['sentiment']);
            $em->flush();
        }
        
        return new JsonResponse([
            'success' => true,
            'prediction' => $prediction,
            'saved' => true
        ]);
    }

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
        
        $fullText = $reclamation->getSujet() . '. ' . $reclamation->getDescription();
        $summary = $summarizer->summarize($fullText, 3, $reclamation->getType());
        
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
        
        return new JsonResponse([
            'success' => true,
            'summary' => $summary
        ]);
    }
}
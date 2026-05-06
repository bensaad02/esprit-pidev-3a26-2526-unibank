<?php

namespace App\Controller\Client;

use App\Entity\Reclamation;
use App\Entity\Utilisateur;
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

#[Route('/client/reclamations')]
class ReclamationController extends BaseClientController
{
    /**
     * Récupère l'utilisateur connecté et s'assure qu'il est du bon type
     */
    private function getUtilisateur(): ?Utilisateur
    {
        $user = $this->getUser();
        return $user instanceof Utilisateur ? $user : null;
    }

    /**
     * Récupère l'ID de l'utilisateur connecté
     */
    private function getUtilisateurId(): ?int
    {
        $utilisateur = $this->getUtilisateur();
        return $utilisateur?->getIdUtilisateur();
    }

    #[Route('', name: 'app_client_reclamations')]
    public function index(
        Request $request, 
        ReclamationRepository $repo,
        PaginatorInterface $paginator
    ): Response {
        $redirect = $this->checkApproved();
        if ($redirect) {
            return $redirect;
        }

        $user = $this->getUtilisateur();
        if (!$user) {
            throw $this->createAccessDeniedException('Vous devez être connecté');
        }

        $search = $request->query->get('search');
        $sort = $request->query->get('sort', 'date_desc');
        $page = $request->query->getInt('page', 1);
        $limit = $request->query->getInt('limit', 10);

        $qb = $repo->createQueryBuilder('r')
            ->where('r.utilisateur = :user')
            ->setParameter('user', $user);

        if ($search !== null && $search !== '') {
            $qb->andWhere('r.sujet LIKE :search OR r.description LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

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

        $pagination = $paginator->paginate($qb, $page, $limit);

        $allReclamations = $repo->createQueryBuilder('r')
            ->where('r.utilisateur = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
            
        $stats = [
            'total' => count($allReclamations),
            'en_attente' => count(array_filter($allReclamations, fn($r) => $r->getStatut() === ReclamationStatus::EN_ATTENTE)),
            'en_cours' => count(array_filter($allReclamations, fn($r) => $r->getStatut() === ReclamationStatus::EN_COURS)),
            'traite' => count(array_filter($allReclamations, fn($r) => $r->getStatut() === ReclamationStatus::TRAITE)),
            'rejete' => count(array_filter($allReclamations, fn($r) => $r->getStatut() === ReclamationStatus::REJETE)),
        ];

        $formData = [
            'sujet' => $request->query->get('sujet', ''),
            'description' => $request->query->get('description', ''),
            'type' => $request->query->get('type', '')
        ];
        
        $showModal = $request->query->get('show_modal', false);

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
        $redirect = $this->checkApproved();
        if ($redirect) {
            return $redirect;
        }

        $user = $this->getUtilisateur();
        if (!$user) {
            throw $this->createAccessDeniedException('Vous devez être connecté');
        }
        
        $sujet = trim($request->request->get('sujet', ''));
        $description = trim($request->request->get('description', ''));
        $type = $request->request->get('type', 'autre');
        
        if ($sujet === '' || $description === '') {
            $this->addFlash('error', 'Veuillez remplir tous les champs obligatoires.');
            return $this->redirectToRoute('app_client_reclamations', [
                'sujet' => $sujet,
                'description' => $description,
                'type' => $type,
                'show_modal' => 'true'
            ]);
        }
        
        $dateLimite = new \DateTime('-7 days');
        $reclamationsRecent = $em->getRepository(Reclamation::class)->createQueryBuilder('r')
            ->where('r.utilisateur = :user')
            ->andWhere('r.dateReclamation > :date')
            ->setParameter('user', $user)
            ->setParameter('date', $dateLimite)
            ->getQuery()
            ->getResult();
        
        $verificationDoublon = $duplicateService->detecterDoublon($description, $reclamationsRecent);
        
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
        if ($mlClassifier->isModelTrained()) {
            $prediction = $mlClassifier->predict($description);
            
            if ($type === 'autre' && $prediction['is_reliable']) {
                $this->addFlash('info', sprintf(
                    '🤖 L\'IA suggère la catégorie : %s (confiance: %s%%). Notre équipe traitera votre réclamation avec la plus grande attention.',
                    $prediction['category_label'],
                    $prediction['confidence']
                ));
            }
        }
        
        // Création de la réclamation
        $reclamation = new Reclamation();
        $reclamation->setUtilisateur($user);
        $reclamation->setSujet($sujet);
        $reclamation->setDescription($description);
        $reclamation->setType($type);
        $reclamation->setStatut(ReclamationStatus::EN_ATTENTE);
        $reclamation->setDateReclamation(new \DateTimeImmutable());
        
        $sentimentResult = $sentimentService->analyserSentiment($description);
        $reclamation->setSentiment($sentimentResult['sentiment']);
        
        if ($sentimentResult['estInsatisfait']) {
            $this->addFlash('warning', '⚠️ Réclamation prioritaire détectée (client insatisfait)');
        }
        
        /** @var UploadedFile|null $imageFile */
        $imageFile = $request->files->get('image');
        
        if ($imageFile && $imageFile->getSize() > 0) {
            // Utilisation de la méthode existante verifierImage
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
        
        $em->persist($reclamation);
        $em->flush();
        
        $this->addFlash('success', 'Votre réclamation a été soumise avec succès.');
        return $this->redirectToRoute('app_client_reclamations');
    }

    #[Route('/{id}', name: 'app_client_reclamations_show', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $em): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) {
            return $redirect;
        }
        
        $userId = $this->getUtilisateurId();
        if (!$userId) {
            throw $this->createAccessDeniedException('Vous devez être connecté');
        }
        
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        $utilisateur = $reclamation?->getUtilisateur();
        
        if (!$reclamation || !$utilisateur || $utilisateur->getIdUtilisateur() !== $userId) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        return $this->render('client/reclamation/show.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_client_reclamation_edit', methods: ['POST'])]
    public function edit(
        int $id, 
        Request $request, 
        EntityManagerInterface $em, 
        ValidatorInterface $validator, 
        SluggerInterface $slugger,
        ImageModerationService $moderationService
    ): Response {
        $redirect = $this->checkApproved();
        if ($redirect) {
            return $redirect;
        }
        
        $userId = $this->getUtilisateurId();
        if (!$userId) {
            throw $this->createAccessDeniedException('Vous devez être connecté');
        }
        
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        $utilisateur = $reclamation?->getUtilisateur();
        
        if (!$reclamation || !$utilisateur || $utilisateur->getIdUtilisateur() !== $userId) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        if ($reclamation->getStatut() !== ReclamationStatus::EN_ATTENTE) {
            $this->addFlash('error', 'Seules les réclamations en attente peuvent être modifiées.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        $sujet = trim($request->request->get('sujet', ''));
        $description = trim($request->request->get('description', ''));
        $type = $request->request->get('type', 'autre');
        
        if ($sujet === '' || $description === '') {
            $this->addFlash('error', 'Veuillez remplir tous les champs obligatoires.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        $reclamation->setSujet($sujet);
        $reclamation->setDescription($description);
        $reclamation->setType($type);
        
        /** @var UploadedFile|null $imageFile */
        $imageFile = $request->files->get('image');
        
        if ($imageFile && $imageFile->getSize() > 0) {
            $verification = $moderationService->verifierImage($imageFile);
            
            if (!$verification['is_appropriate']) {
                $this->addFlash('error', $verification['message']);
                return $this->redirectToRoute('app_client_reclamations');
            }
            
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
                $this->addFlash('success', '✅ Nouvelle image vérifiée et acceptée.');
                
            } catch (FileException $e) {
                $this->addFlash('warning', 'L\'image n\'a pas pu être mise à jour.');
            }
        }
        
        if ($request->request->has('remove_image') && $reclamation->getImagePath()) {
            $oldImagePath = $this->getParameter('reclamations_directory') . '/' . $reclamation->getImagePath();
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $reclamation->setImagePath(null);
            $this->addFlash('info', 'Image supprimée.');
        }
        
        $violations = $validator->validate($reclamation);
        if (count($violations) > 0) {
            foreach ($violations as $violation) {
                $this->addFlash('error', $violation->getMessage());
            }
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        $em->flush();
        
        $this->addFlash('success', 'Votre réclamation a été modifiée avec succès.');
        return $this->redirectToRoute('app_client_reclamations');
    }

    #[Route('/{id}/cancel', name: 'app_client_reclamation_cancel', methods: ['POST'])]
    public function cancel(int $id, Request $request, EntityManagerInterface $em): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) {
            return $redirect;
        }
        
        $userId = $this->getUtilisateurId();
        if (!$userId) {
            throw $this->createAccessDeniedException('Vous devez être connecté');
        }
        
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        $utilisateur = $reclamation?->getUtilisateur();
        
        if (!$reclamation || !$utilisateur || $utilisateur->getIdUtilisateur() !== $userId) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        if ($reclamation->getStatut() !== ReclamationStatus::EN_ATTENTE) {
            $this->addFlash('error', 'Seules les réclamations en attente peuvent être annulées.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        $token = $request->request->get('_token');
        if ($token && $this->isCsrfTokenValid('cancel' . $reclamation->getId(), $token)) {
            $reclamation->setStatut(ReclamationStatus::REJETE);
            $em->flush();
            $this->addFlash('success', 'Votre réclamation a été annulée.');
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }
        
        return $this->redirectToRoute('app_client_reclamations');
    }

    #[Route('/{id}/delete', name: 'app_client_reclamation_delete', methods: ['POST'])]
    public function delete(int $id, Request $request, EntityManagerInterface $em): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) {
            return $redirect;
        }
        
        $userId = $this->getUtilisateurId();
        if (!$userId) {
            throw $this->createAccessDeniedException('Vous devez être connecté');
        }
        
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        $utilisateur = $reclamation?->getUtilisateur();
        
        if (!$reclamation || !$utilisateur || $utilisateur->getIdUtilisateur() !== $userId) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        if ($reclamation->getStatut() !== ReclamationStatus::EN_ATTENTE) {
            $this->addFlash('error', 'Seules les réclamations en attente peuvent être supprimées.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        $token = $request->request->get('_token');
        if ($token && $this->isCsrfTokenValid('delete' . $reclamation->getId(), $token)) {
            if ($reclamation->getImagePath()) {
                $imagePath = $this->getParameter('reclamations_directory') . '/' . $reclamation->getImagePath();
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            
            $em->remove($reclamation);
            $em->flush();
            $this->addFlash('success', 'Votre réclamation a été supprimée avec succès.');
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }
        
        return $this->redirectToRoute('app_client_reclamations');
    }
}
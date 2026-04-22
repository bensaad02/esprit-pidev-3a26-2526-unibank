<?php

namespace App\Controller\Client;

use App\Entity\Reclamation;
use App\Enum\ReclamationStatus;
use App\Repository\ReclamationRepository;
use App\Service\AIService;
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

#[Route('/client/reclamations')]
class ReclamationController extends BaseClientController
{
    

#[Route('', name: 'app_client_reclamations')]
public function index(Request $request, ReclamationRepository $repo): Response
{
    $redirect = $this->checkApproved();
    if ($redirect) return $redirect;

    $user = $this->getUser();

    // 🔍 Récup paramètres
    $search = $request->query->get('search');
    $sort = $request->query->get('sort', 'date_desc');

    // 🧠 Query Builder principal
    $qb = $repo->createQueryBuilder('r')
        ->where('r.utilisateur = :user')
        ->setParameter('user', $user);

    // 🔍 Recherche
    if (!empty($search)) {
        $qb->andWhere('r.sujet LIKE :search OR r.description LIKE :search')
           ->setParameter('search', '%' . $search . '%');
    }

    // 🔽 TRI
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

        default: // date_desc
            $qb->orderBy('r.dateReclamation', 'DESC');
            break;
    }

    // 📊 Résultat final
    $reclamations = $qb->getQuery()->getResult();

    // 📈 Statistiques
    $stats = [
        'total' => count($reclamations),
        'en_attente' => count(array_filter($reclamations, fn($r) => $r->getStatut() === ReclamationStatus::EN_ATTENTE)),
        'en_cours' => count(array_filter($reclamations, fn($r) => $r->getStatut() === ReclamationStatus::EN_COURS)),
        'traite' => count(array_filter($reclamations, fn($r) => $r->getStatut() === ReclamationStatus::TRAITE)),
        'rejete' => count(array_filter($reclamations, fn($r) => $r->getStatut() === ReclamationStatus::REJETE)),
    ];

    return $this->render('client/reclamation/index.html.twig', [
        'reclamations' => $reclamations,
        'stats' => $stats,
        'search' => $search,
        'sort' => $sort
    ]);
}



    #[Route('/new', name: 'app_client_reclamation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, ValidatorInterface $validator, SluggerInterface $slugger, AIService $aiService): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        if ($request->isMethod('POST')) {
            $user = $this->getUser();

            $sujet = trim($request->request->get('sujet', ''));
            $description = trim($request->request->get('description', ''));
            $type = $request->request->get('type', 'autre');

            if (empty($sujet) || empty($description)) {
                $this->addFlash('error', 'Veuillez remplir tous les champs obligatoires.');
                return $this->redirectToRoute('app_client_reclamation_new');
            }

            $textToAnalyze = $sujet . ' ' . $description;
            if ($aiService->isToxic($textToAnalyze)) {
                $this->addFlash('error', 'Votre message contient un langage inappropriate. Veuillez reformuler votre reclamation de maniere respectueuse.');
                return $this->redirectToRoute('app_client_reclamation_new');
            }

            $reclamation = new Reclamation();
            $reclamation->setUtilisateur($user);
            $reclamation->setSujet($sujet);
            $reclamation->setDescription($description);
            $reclamation->setType($type);
            $reclamation->setStatut(ReclamationStatus::EN_ATTENTE);
            $reclamation->setDateReclamation(new \DateTimeImmutable());

            $sentiment = $aiService->analyzeSentiment($textToAnalyze);
            $reclamation->setSentiment($sentiment);
            
            /** @var UploadedFile $imageFile */
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
                    $reclamation->setImagePath($newFilename);
                } catch (FileException $e) {
                    $this->addFlash('warning', 'L\'image n\'a pas pu être téléchargée mais votre réclamation a été enregistrée.');
                }
            }
            
            if ($response = $this->handleValidationErrors($validator->validate($reclamation))) {
                return $response;
            }
            
            $em->persist($reclamation);
            $em->flush();
            
            $this->addFlash('success', 'Votre réclamation a été soumise avec succès. Un agent la traitera dans les plus brefs délais.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        return $this->render('client/reclamation/new.html.twig');
    }

    #[Route('/{id}', name: 'app_client_reclamations_show', methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $em): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;
        
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        if (!$reclamation || $reclamation->getUtilisateur()->getIdUtilisateur() !== $this->getUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        return $this->render('client/reclamation/show.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_client_reclamation_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request, EntityManagerInterface $em, ValidatorInterface $validator, SluggerInterface $slugger): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;
        
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        if (!$reclamation || $reclamation->getUtilisateur()->getIdUtilisateur() !== $this->getUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        if ($reclamation->getStatut() !== ReclamationStatus::EN_ATTENTE) {
            $this->addFlash('error', 'Seules les réclamations en attente peuvent être modifiées.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        if ($request->isMethod('POST')) {
            $sujet = trim($request->request->get('sujet', ''));
            $description = trim($request->request->get('description', ''));
            $type = $request->request->get('type', 'autre');
            
            if (empty($sujet) || empty($description)) {
                $this->addFlash('error', 'Veuillez remplir tous les champs obligatoires.');
                return $this->redirectToRoute('app_client_reclamation_edit', ['id' => $id]);
            }
            
            $reclamation->setSujet($sujet);
            $reclamation->setDescription($description);
            $reclamation->setType($type);
            
            /** @var UploadedFile $imageFile */
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
                    $this->addFlash('warning', 'L\'image n\'a pas pu être mise à jour.');
                }
            }
            
            if ($response = $this->handleValidationErrors($validator->validate($reclamation))) {
                return $response;
            }
            
            $em->flush();
            
            $this->addFlash('success', 'Votre réclamation a été modifiée avec succès.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        return $this->render('client/reclamation/edit.html.twig', [
            'reclamation' => $reclamation,
        ]);
    }

    #[Route('/{id}/cancel', name: 'app_client_reclamation_cancel', methods: ['POST'])]
    public function cancel(int $id, Request $request, EntityManagerInterface $em): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;
        
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        if (!$reclamation || $reclamation->getUtilisateur()->getIdUtilisateur() !== $this->getUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        if ($reclamation->getStatut() !== ReclamationStatus::EN_ATTENTE) {
            $this->addFlash('error', 'Seules les réclamations en attente peuvent être annulées.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        // Vérifier le token CSRF
        if ($this->isCsrfTokenValid('cancel' . $reclamation->getId(), $request->request->get('_token'))) {
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
        if ($redirect) return $redirect;
        
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        
        if (!$reclamation || $reclamation->getUtilisateur()->getIdUtilisateur() !== $this->getUser()->getIdUtilisateur()) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_client_reclamations');
        }
        
        if ($reclamation->getStatut() !== ReclamationStatus::EN_ATTENTE) {
            $this->addFlash('error', 'Seules les réclamations en attente peuvent être supprimées.');
            return $this->redirectToRoute('app_client_reclamations');
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
            $this->addFlash('success', 'Votre réclamation a été supprimée avec succès.');
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }
        
        return $this->redirectToRoute('app_client_reclamations');
    }

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
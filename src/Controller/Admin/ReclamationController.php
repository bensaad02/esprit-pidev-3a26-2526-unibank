<?php

namespace App\Controller\Admin;

use App\Entity\Reclamation;
use App\Entity\User;
use App\Enum\ReclamationStatus;
use App\Form\ReclamationType;
use App\Repository\ReclamationRepository;
use App\Service\SupabaseStorageService;
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

#[Route('/admin/reclamations')]
class ReclamationController extends AbstractController
{
    #[Route('', name: 'app_admin_reclamations')]
    public function index(Request $request, ReclamationRepository $repo): Response
    {
        $status = $request->query->get('status', 'all');
        $type = $request->query->get('type', 'all');
        $search = $request->query->get('q', '');
        $sentiment = $request->query->get('sentiment', 'all');

        return $this->render('admin/reclamation/index.html.twig', [
            'reclamations' => $repo->findAllFiltered($status, $type, $search, $sentiment),
            'stats' => [
                'total' => $repo->countAll(),
                'en_attente' => $repo->countByStatus(ReclamationStatus::EN_ATTENTE),
                'en_cours' => $repo->countByStatus(ReclamationStatus::EN_COURS),
                'traite' => $repo->countByStatus(ReclamationStatus::TRAITE),
                'rejete' => $repo->countByStatus(ReclamationStatus::REJETE),
                'positif' => $repo->countBySentiment('positif'),
                'negatif' => $repo->countBySentiment('negatif'),
                'neutre' => $repo->countBySentiment('neutre'),
            ],
            'status' => $status,
            'type' => $type,
            'search' => $search,
            'sentiment' => $sentiment,
        ]);
    }

    #[Route('/pdf', name: 'app_admin_reclamations_pdf')]
    public function generatePdf(Request $request, ReclamationRepository $reclamationRepository, SupabaseStorageService $supabase): Response
    {
        // Récupérer les mêmes filtres que l'affichage
        $status = $request->query->get('status');
        $type = $request->query->get('type');
        $sentiment = $request->query->get('sentiment');
        $search = $request->query->get('q');
        
        // Appliquer les filtres (même logique que votre méthode index)
        $reclamations = $reclamationRepository->findAllFiltered($status, $type, $search, $sentiment);
        
        // Calculer les statistiques pour le PDF
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
        
        // Générer le HTML du PDF
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
        
        // Configurer Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $pdfBytes = $dompdf->output();

        $path = $supabase->makePath('admin/reclamations', 'Rapport_Reclamations');
        $url  = $supabase->upload($path, $pdfBytes);

        if ($url) {
            return new RedirectResponse($url);
        }

        return new Response($pdfBytes, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="reclamations_' . date('Y-m-d_H-i-s') . '.pdf"',
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
                    
                    // Supprimer l'ancienne image si elle existe
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
    public function changeStatus(int $id, Request $request, EntityManagerInterface $em, ValidatorInterface $validator): Response
    {
        $reclamation = $em->getRepository(Reclamation::class)->find($id);
        if (!$reclamation) {
            $this->addFlash('error', 'Réclamation introuvable.');
            return $this->redirectToRoute('app_admin_reclamations');
        }

        $newStatus = $request->request->get('status');
        $reponse = $request->request->get('reponse');

        if (!in_array($newStatus, [ReclamationStatus::EN_ATTENTE, ReclamationStatus::EN_COURS, ReclamationStatus::TRAITE, ReclamationStatus::REJETE])) {
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

        if ($newStatus === ReclamationStatus::TRAITE && !$reclamation->getDateTraitement()) {
            $reclamation->setDateTraitement(new \DateTimeImmutable());
        }

        if ($response = $this->handleValidationErrors($validator->validate($reclamation))) {
            return $response;
        }

        $em->flush();

        $this->addFlash('success', sprintf('Statut changé de "%s" à "%s"', $oldStatus, $newStatus));
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
            // Supprimer l'image associée si elle existe
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
    public function addResponse(int $id, Request $request, EntityManagerInterface $em): Response
    {
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

        // Création de la nouvelle réponse
        $reponse = new \App\Entity\Reponse();
        $reponse->setReclamation($reclamation);
        $reponse->setContenu($contenu);
        $reponse->setAuteur($this->getUser()->getNom() ?? 'Admin'); // Nom de l'admin
        $reponse->setDateReponse(new \DateTimeImmutable());
        // Optionnel : mettre à jour le statut de la réclamation
        if ($reclamation->getStatut() === ReclamationStatus::EN_ATTENTE) {
            $reclamation->setStatut(ReclamationStatus::EN_COURS);
        }

        $em->persist($reponse);
        $em->flush();

        $this->addFlash('success', 'Votre réponse a été envoyée avec succès.');
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
}
<?php

namespace App\Controller\Client;

use App\Entity\Carte;
use App\Form\CarteType;
use App\Repository\CarteRepository;
use App\Service\SupabaseStorageService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
    #[Route('/client/cartes', name: 'app_client_cartes')]
    public function index(Request $request, CarteRepository $repo): Response
    {
        $search = $request->query->get('search');

        $qb = $repo->createQueryBuilder('c')
            ->andWhere('c.utilisateur = :user')
            ->setParameter('user', $this->getUser());

        if ($search) {
            $qb->andWhere('c.typeCarte LIKE :s')
               ->setParameter('s', "%$search%");
        }

        $cartes = $qb->getQuery()->getResult();

        return $this->render('client/cartes/index.html.twig', [
            'cartes' => $cartes,
            'search' => $search
        ]);
    }

    #[Route('/client/cartes/add', name: 'app_client_cartes_add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $carte = new Carte();

        $form = $this->createForm(CarteType::class, $carte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // 👤 assign user
            $carte->setUtilisateur($this->getUser());

            // 🔥 FIX: auto fill nom/prenom (VERY IMPORTANT)
            $carte->setNom($this->getUser()->getNom());
            $carte->setPrenom($this->getUser()->getPrenom());

            // status
            $carte->setStatus('EN_ATTENTE');

            // optional
            $carte->setCardNumber(null);

            $em->persist($carte);
            $em->flush();

            $this->addFlash('success', 'Demande envoyée ✅');

            return $this->redirectToRoute('app_client_cartes');
        }

        return $this->render('client/cartes/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
#[Route('/client/cartes/edit/{id}', name: 'app_client_cartes_edit')]
public function edit(Carte $carte, Request $request, EntityManagerInterface $em): Response
{
    // 🔒 SECURITY FIX
    if ($carte->getUtilisateur() !== $this->getUser()) {
        throw $this->createAccessDeniedException();
    }

    $form = $this->createForm(CarteType::class, $carte);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        // 🔥 keep user + names safe
        $carte->setUtilisateur($this->getUser());
        $carte->setNom($this->getUser()->getNom());
        $carte->setPrenom($this->getUser()->getPrenom());

        $em->flush();

        $this->addFlash('success', 'Carte modifiée ✅');

        return $this->redirectToRoute('app_client_cartes');
    }

    return $this->render('client/cartes/edit.html.twig', [
        'form' => $form->createView()
    ]);
}

    #[Route('/client/cartes/pdf', name: 'app_client_cartes_pdf')]
    public function exportPdf(CarteRepository $repo, SupabaseStorageService $supabase): Response
    {
        $cartes = $repo->findBy([
            'utilisateur' => $this->getUser()
        ]);

        $html = $this->renderView('client/cartes/pdf.html.twig', [
            'cartes' => $cartes
        ]);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdfBytes = $dompdf->output();

        $user = $this->getUser();
        $path = $supabase->makePath('cartes', 'Cartes_' . $user->getEmail());
        $url  = $supabase->upload($path, $pdfBytes);

        if ($url) {
            return new RedirectResponse($url);
        }

        return new Response($pdfBytes, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="mes_cartes.pdf"',
        ]);
    }
#[Route('/client/cartes/delete/{id}', name: 'app_client_cartes_delete', methods: ['GET','POST'])]
    public function delete(Carte $carte, EntityManagerInterface $em): Response
    {
        if ($carte->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $em->remove($carte);
        $em->flush();

        return $this->redirectToRoute('app_client_cartes');
    }

    #[Route('/client/cartes/alimenter/{id}', name: 'app_client_cartes_alimenter')]
    public function alimenter(Carte $carte, Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {

            // 🔥 FIX: cast montant to float
            $montant = (float) $request->request->get('montant');

            $compte = $this->getUser()->getComptes()[0] ?? null;

            if (!$compte) {
                $this->addFlash('error', 'Aucun compte trouvé ❌');
                return $this->redirectToRoute('app_client_cartes');
            }

            if ($compte->getSolde() < $montant) {
                $this->addFlash('error', 'Solde insuffisant ❌');
                return $this->redirectToRoute('app_client_cartes');
            }

            $compte->setSolde($compte->getSolde() - $montant);
            $carte->setSolde($carte->getSolde() + $montant);

            $em->flush();

            $this->addFlash('success', 'Carte alimentée 💰');

            return $this->redirectToRoute('app_client_cartes');
        }

        return $this->render('client/cartes/alimenter.html.twig', [
            'carte' => $carte
        ]);
    }
}
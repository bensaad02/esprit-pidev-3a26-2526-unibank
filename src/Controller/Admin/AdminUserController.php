<?php

namespace App\Controller\Admin;

use App\Entity\Compte;
use App\Entity\Utilisateur;
use App\Enum\ClientStatus;
use App\Enum\TypeCompte;
use App\Repository\UtilisateurRepository;
use App\Service\EmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/users')]
class AdminUserController extends AbstractController
{
    #[Route('', name: 'app_admin_users')]
    public function list(Request $request, UtilisateurRepository $repo): Response
    {
        $search = $request->query->get('q', '');
        $statusFilter = $request->query->get('status', 'all');

        $clients = $repo->searchClients($search, $statusFilter);

        return $this->render('admin/user/list.html.twig', [
            'clients' => $clients,
            'search' => $search,
            'statusFilter' => $statusFilter,
        ]);
    }

    #[Route('/pending', name: 'app_admin_pending')]
    public function pending(UtilisateurRepository $repo): Response
    {
        $pending = $repo->findPendingClients();

        return $this->render('admin/user/pending.html.twig', [
            'clients' => $pending,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_user_edit', methods: ['POST'])]
    public function edit(int $id, Request $request, EntityManagerInterface $em): Response
    {
        $user = $em->getRepository(Utilisateur::class)->find($id);
        if (!$user) {
            if ($request->isXmlHttpRequest()) {
                return $this->json(['success' => false, 'errors' => ['_global' => 'Utilisateur introuvable.']]);
            }
            $this->addFlash('error', 'Utilisateur introuvable.');
            return $this->redirectToRoute('app_admin_users');
        }

        $nom = trim($request->request->get('nom', ''));
        $prenom = trim($request->request->get('prenom', ''));
        $email = trim($request->request->get('email', ''));
        $telephone = trim($request->request->get('telephone', ''));
        $cin = trim($request->request->get('cin', ''));
        $adresse = trim($request->request->get('adresse', ''));

        $errors = [];

        if (strlen($nom) < 2) {
            $errors['nom'] = 'Le nom doit contenir au moins 2 caracteres.';
        }
        if (strlen($prenom) < 2) {
            $errors['prenom'] = 'Le prenom doit contenir au moins 2 caracteres.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'L\'email n\'est pas valide.';
        }
        if (!preg_match('/^\+?[\d\s\-]{8,15}$/', $telephone)) {
            $errors['telephone'] = 'Le numero de telephone n\'est pas valide.';
        }
        if (!preg_match('/^\d{8}$/', $cin)) {
            $errors['cin'] = 'Le CIN doit contenir exactement 8 chiffres numeriques.';
        }
        if (strlen($adresse) < 5) {
            $errors['adresse'] = 'L\'adresse doit contenir au moins 5 caracteres.';
        }

        if (empty($errors)) {
            $existing = $em->getRepository(Utilisateur::class)->findOneBy(['email' => $email]);
            if ($existing && $existing->getIdUtilisateur() !== $user->getIdUtilisateur()) {
                $errors['email'] = 'Cet email est deja utilise par un autre compte.';
            }
        }
        if (empty($errors) || !isset($errors['cin'])) {
            $existingCin = $em->getRepository(Utilisateur::class)->findOneBy(['cin' => $cin]);
            if ($existingCin && $existingCin->getIdUtilisateur() !== $user->getIdUtilisateur()) {
                $errors['cin'] = 'Ce CIN est deja utilise par un autre compte.';
            }
        }

        if (!empty($errors)) {
            if ($request->isXmlHttpRequest()) {
                return $this->json(['success' => false, 'errors' => $errors]);
            }
            $this->addFlash('error', array_values($errors)[0]);
            return $this->redirectToRoute('app_admin_users');
        }

        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setEmail($email);
        $user->setTelephone($telephone);
        $user->setCin($cin);
        $user->setAdresse($adresse);

        $em->flush();

        if ($request->isXmlHttpRequest()) {
            return $this->json(['success' => true, 'message' => 'Client "' . $prenom . ' ' . $nom . '" modifie avec succes.']);
        }

        $this->addFlash('success', 'Client "' . $prenom . ' ' . $nom . '" modifie avec succes.');
        return $this->redirectToRoute('app_admin_users');
    }

    #[Route('/{id}/ban', name: 'app_admin_user_ban', methods: ['POST'])]
    public function ban(int $id, EntityManagerInterface $em, EmailService $emailService): Response
    {
        $user = $em->getRepository(Utilisateur::class)->find($id);
        if (!$user) {
            $this->addFlash('error', 'Utilisateur introuvable.');
            return $this->redirectToRoute('app_admin_users');
        }

        $wasBanning = $user->isEstActif();
        $user->setEstActif(!$user->isEstActif());
        $em->flush();

        try {
            if ($wasBanning) {
                $emailService->sendBanEmail($user);
            } else {
                $emailService->sendUnbanEmail($user);
            }
        } catch (\Exception $e) {
        }

        $action = $user->isEstActif() ? 'debanni' : 'banni';
        $this->addFlash('success', 'Client "' . $user->getPrenom() . ' ' . $user->getNom() . '" ' . $action . ' avec succes.');
        return $this->redirectToRoute('app_admin_users');
    }

    #[Route('/{id}/delete', name: 'app_admin_user_delete', methods: ['POST'])]
    public function delete(int $id, EntityManagerInterface $em): Response
    {
        $user = $em->getRepository(Utilisateur::class)->find($id);
        if (!$user) {
            $this->addFlash('error', 'Utilisateur introuvable.');
            return $this->redirectToRoute('app_admin_users');
        }

        $name = $user->getPrenom() . ' ' . $user->getNom();
        $em->remove($user);
        $em->flush();

        $this->addFlash('success', 'Client "' . $name . '" supprime definitivement.');
        return $this->redirectToRoute('app_admin_users');
    }

    #[Route('/{id}/approve', name: 'app_admin_user_approve', methods: ['POST'])]
    public function approve(int $id, EntityManagerInterface $em): Response
    {
        $user = $em->getRepository(Utilisateur::class)->find($id);
        if (!$user) {
            $this->addFlash('error', 'Utilisateur introuvable.');
            return $this->redirectToRoute('app_admin_pending');
        }

        $user->setClientStatus(ClientStatus::APPROVED);

        $type = TypeCompte::COURANT;
        if ($user->getSelectedOffer() && str_contains(strtoupper($user->getSelectedOffer()), 'EPARGNE')) {
            $type = TypeCompte::EPARGNE;
        }

        $compte = new Compte();
        $compte->setUtilisateur($user);
        $compte->setNumeroCompte('UB' . str_pad((string) mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT));
        $compte->setTypeCompte($type);
        $compte->setEstActif(true);

        $em->persist($compte);
        $em->flush();

        $this->addFlash('success', 'Client "' . $user->getPrenom() . ' ' . $user->getNom() . '" approuve. Compte ' . $type->value . ' cree.');
        return $this->redirectToRoute('app_admin_pending');
    }

    #[Route('/{id}/reject', name: 'app_admin_user_reject', methods: ['POST'])]
    public function reject(int $id, EntityManagerInterface $em): Response
    {
        $user = $em->getRepository(Utilisateur::class)->find($id);
        if (!$user) {
            $this->addFlash('error', 'Utilisateur introuvable.');
            return $this->redirectToRoute('app_admin_pending');
        }

        $user->setClientStatus(ClientStatus::REJECTED);
        $em->flush();

        $this->addFlash('success', 'Client "' . $user->getPrenom() . ' ' . $user->getNom() . '" rejete.');
        return $this->redirectToRoute('app_admin_pending');
    }
}

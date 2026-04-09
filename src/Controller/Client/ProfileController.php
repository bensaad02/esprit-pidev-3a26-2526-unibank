<?php

namespace App\Controller\Client;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/profile')]
class ProfileController extends BaseClientController
{
    #[Route('', name: 'app_client_profile', methods: ['GET', 'POST'])]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();

        if ($request->isMethod('POST')) {
            $prenom = trim($request->request->get('prenom', ''));
            $nom = trim($request->request->get('nom', ''));
            $telephone = trim($request->request->get('telephone', ''));
            $adresse = trim($request->request->get('adresse', ''));

            $errors = [];
            if (strlen($prenom) < 2) $errors[] = 'Le prenom doit contenir au moins 2 caracteres.';
            if (strlen($nom) < 2) $errors[] = 'Le nom doit contenir au moins 2 caracteres.';
            if (strlen($telephone) < 8) $errors[] = 'Le telephone doit contenir au moins 8 caracteres.';
            if (strlen($adresse) < 5) $errors[] = "L'adresse doit contenir au moins 5 caracteres.";

            if (count($errors) > 0) {
                foreach ($errors as $e) {
                    $this->addFlash('error', $e);
                }
                return $this->render('client/profile/index.html.twig');
            }

            $user->setPrenom($prenom);
            $user->setNom($nom);
            $user->setTelephone($telephone);
            $user->setAdresse($adresse);
            $em->flush();

            $this->addFlash('success', 'Profil mis a jour avec succes.');
            return $this->redirectToRoute('app_client_profile');
        }

        return $this->render('client/profile/index.html.twig');
    }

    #[Route('/password', name: 'app_client_password', methods: ['POST'])]
    public function password(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasher): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();

        $current = $request->request->get('current_password', '');
        $newPass = $request->request->get('new_password', '');
        $confirm = $request->request->get('confirm_password', '');

        if (!$hasher->isPasswordValid($user, $current)) {
            $this->addFlash('error', 'Le mot de passe actuel est incorrect.');
            return $this->redirectToRoute('app_client_profile');
        }

        if (strlen($newPass) < 8) {
            $this->addFlash('error', 'Le nouveau mot de passe doit contenir au moins 8 caracteres.');
            return $this->redirectToRoute('app_client_profile');
        }

        if ($newPass !== $confirm) {
            $this->addFlash('error', 'Les mots de passe ne correspondent pas.');
            return $this->redirectToRoute('app_client_profile');
        }

        $user->setMotDePasse($hasher->hashPassword($user, $newPass));
        $em->flush();

        $this->addFlash('success', 'Mot de passe modifie avec succes.');
        return $this->redirectToRoute('app_client_profile');
    }
}

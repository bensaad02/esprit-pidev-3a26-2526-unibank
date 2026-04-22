<?php

namespace App\Controller\Client;

use App\Entity\Compte;
use App\Entity\Utilisateur;
use App\Enum\TypeCompte;
use App\Enum\TransactionType;
use App\Repository\TransactionBancaireRepository;
use App\Service\ExchangeRateService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/compte')]
class CompteController extends BaseClientController
{
    #[Route('', name: 'app_client_compte')]
    public function index(EntityManagerInterface $em, TransactionBancaireRepository $txnRepo, ExchangeRateService $fx): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();
        $compte = $em->getRepository(Compte::class)->findOneBy(['utilisateur' => $user]);

        $stats = null;
        $recentTransactions = [];

        if ($compte) {
            $stats = [
                'depots' => $txnRepo->countByCompteAndType($compte->getIdCompte(), TransactionType::DEPOT),
                'retraits' => $txnRepo->countByCompteAndType($compte->getIdCompte(), TransactionType::RETRAIT),
                'virements' => $txnRepo->countByCompteAndType($compte->getIdCompte(), TransactionType::VIREMENT),
            ];

            $recentTransactions = $txnRepo->findByCompte($compte->getIdCompte());
            $recentTransactions = array_slice($recentTransactions, 0, 5);
        }

        $converted = $compte ? $fx->convert((float) $compte->getSolde()) : [];

        return $this->render('client/compte/index.html.twig', [
            'compte'             => $compte,
            'stats'              => $stats,
            'recentTransactions' => $recentTransactions,
            'rates'              => $fx->getRates(),
            'converted'          => $converted,
        ]);
    }

    #[Route('/type', name: 'app_client_compte_type', methods: ['POST'])]
    public function changeType(Request $request, EntityManagerInterface $em): Response
    {
        $redirect = $this->checkApproved();
        if ($redirect) return $redirect;

        $user = $this->getUser();
        $compte = $em->getRepository(Compte::class)->findOneBy(['utilisateur' => $user]);

        if (!$compte) {
            $this->addFlash('error', 'Aucun compte trouve.');
            return $this->redirectToRoute('app_client_compte');
        }

        if (!$compte->isEstActif()) {
            $this->addFlash('error', 'Votre compte est desactive. Modification impossible.');
            return $this->redirectToRoute('app_client_compte');
        }

        $newType = TypeCompte::tryFrom($request->request->get('type', ''));
        if (!$newType) {
            $this->addFlash('error', 'Type de compte invalide.');
            return $this->redirectToRoute('app_client_compte');
        }

        if ($compte->getTypeCompte() === $newType) {
            $this->addFlash('warning', 'Aucune modification detectee.');
            return $this->redirectToRoute('app_client_compte');
        }

        $compte->setTypeCompte($newType);
        $em->flush();

        $label = $newType === TypeCompte::EPARGNE ? 'Compte Epargne' : 'Compte Courant';
        $this->addFlash('success', 'Type de compte modifie en ' . $label . '.');
        return $this->redirectToRoute('app_client_compte');
    }
}

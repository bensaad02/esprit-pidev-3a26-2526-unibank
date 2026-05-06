<?php
// src/Service/ReclamationBusinessService.php

namespace App\Service;

use App\Entity\Reclamation;
use App\Entity\Utilisateur;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\EntityManagerInterface;

class ReclamationBusinessService
{
    private ReclamationRepository $reclamationRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(
        ReclamationRepository $reclamationRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->reclamationRepository = $reclamationRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * RÈGLE MÉTIER 1 : Vérifier si un utilisateur peut créer une nouvelle réclamation
     * Maximum 3 réclamations par jour par utilisateur
     */
    public function canCreateReclamation(Utilisateur $utilisateur): bool
    {
        $today = new \DateTimeImmutable('today');
        $tomorrow = new \DateTimeImmutable('tomorrow');
        
        $reclamationsToday = $this->reclamationRepository->createQueryBuilder('r')
            ->where('r.utilisateur = :user')
            ->andWhere('r.dateReclamation >= :start')
            ->andWhere('r.dateReclamation < :end')
            ->setParameter('user', $utilisateur)
            ->setParameter('start', $today)
            ->setParameter('end', $tomorrow)
            ->getQuery()
            ->getResult();
        
        return count($reclamationsToday) < 3;
    }

    /**
     * RÈGLE MÉTIER 2 : Vérifier si une réclamation peut être modifiée
     * Une réclamation en attente ne peut pas être modifiée après 7 jours
     */
    public function canModifyReclamation(Reclamation $reclamation): bool
    {
        // Vérifier si la réclamation est en attente
        if ($reclamation->getStatut() !== 'en_attente') {
            return false;
        }
        
        // Vérifier si elle a moins de 7 jours
        $now = new \DateTimeImmutable();
        $dateCreation = $reclamation->getDateReclamation();
        $interval = $now->diff($dateCreation);
        
        return $interval->days < 7;
    }

    /**
     * RÈGLE MÉTIER 1 (Bonus) : Obtenir le nombre de réclamations restantes aujourd'hui
     */
    public function getRemainingReclamationsToday(Utilisateur $utilisateur): int
    {
        $today = new \DateTimeImmutable('today');
        $tomorrow = new \DateTimeImmutable('tomorrow');
        
        $reclamationsToday = $this->reclamationRepository->createQueryBuilder('r')
            ->where('r.utilisateur = :user')
            ->andWhere('r.dateReclamation >= :start')
            ->andWhere('r.dateReclamation < :end')
            ->setParameter('user', $utilisateur)
            ->setParameter('start', $today)
            ->setParameter('end', $tomorrow)
            ->getQuery()
            ->getResult();
        
        return 3 - count($reclamationsToday);
    }
}
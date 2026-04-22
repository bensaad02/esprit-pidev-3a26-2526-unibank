<?php

namespace App\Repository;

use App\Entity\Reclamation;
use App\Enum\ReclamationStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ReclamationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reclamation::class);
    }

    public function findAllFiltered(?string $status = 'all', ?string $type = 'all', ?string $search = '', ?string $sentiment = 'all'): array
    {
        $qb = $this->createQueryBuilder('r')
            ->leftJoin('r.utilisateur', 'u')
            ->addSelect('u');

        if ($status && $status !== 'all') {
            $qb->andWhere('r.statut = :status')
               ->setParameter('status', $status);
        }

        if ($type && $type !== 'all') {
            $qb->andWhere('r.type = :type')
               ->setParameter('type', $type);
        }

        if ($sentiment && $sentiment !== 'all') {
            $qb->andWhere('r.sentiment = :sentiment')
               ->setParameter('sentiment', $sentiment);
        }

        if ($search && !empty($search)) {
            $qb->andWhere('r.sujet LIKE :search OR r.description LIKE :search OR u.nom LIKE :search OR u.prenom LIKE :search OR u.email LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        return $qb->orderBy('r.dateReclamation', 'DESC')
                  ->getQuery()
                  ->getResult();
    }

    public function countAll(): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countByStatus(string $status): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->where('r.statut = :status')
            ->setParameter('status', $status)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countBySentiment(string $sentiment): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->where('r.sentiment = :sentiment')
            ->setParameter('sentiment', $sentiment)
            ->getQuery()
            ->getSingleScalarResult();
    }

  public function findByUtilisateur(int $userId)
{
    return $this->createQueryBuilder('r')
        ->where('r.utilisateur = :user')
        ->setParameter('user', $userId)
        ->orderBy('r.dateReclamation', 'DESC')
        ->getQuery()
        ->getResult();
}
}
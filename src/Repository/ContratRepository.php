<?php

namespace App\Repository;

use App\Entity\Contrat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ContratRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contrat::class);
    }

    public function findAllFiltered(?string $status = null, ?string $search = null): array
    {
        $qb = $this->createQueryBuilder('c')
            ->join('c.client', 'u')
            ->orderBy('c.dateCreation', 'DESC');

        if ($status && $status !== 'all') {
            $qb->andWhere('c.statut = :status')->setParameter('status', $status);
        }

        if ($search) {
            $qb->andWhere('u.nom LIKE :q OR u.prenom LIKE :q OR u.email LIKE :q OR c.numeroContrat LIKE :q')
                ->setParameter('q', '%' . $search . '%');
        }

        return $qb->getQuery()->getResult();
    }

    public function findByClient(int $clientId): array
    {
        return $this->createQueryBuilder('c')
            ->join('c.client', 'u')
            ->where('u.idUtilisateur = :cid')
            ->setParameter('cid', $clientId)
            ->orderBy('c.dateCreation', 'DESC')
            ->getQuery()->getResult();
    }

    public function countAll(): int
    {
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.idContrat)')
            ->getQuery()->getSingleScalarResult();
    }

    public function countActive(): int
    {
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.idContrat)')
            ->where('c.statut = :s')
            ->setParameter('s', 'ACTIVE')
            ->getQuery()->getSingleScalarResult();
    }

    public function countCompleted(): int
    {
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.idContrat)')
            ->where('c.statut = :s')
            ->setParameter('s', 'COMPLETED')
            ->getQuery()->getSingleScalarResult();
    }

    public function countFinalizedPipeline(): int
    {
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.idContrat)')
            ->where('c.statut IN (:statuses)')
            ->setParameter('statuses', ['ACTIVE', 'COMPLETED'])
            ->getQuery()->getSingleScalarResult();
    }
}

<?php

namespace App\Repository;

use App\Entity\Credit;
use App\Enum\CreditStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CreditRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Credit::class);
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

    public function hasActiveOrPending(int $clientId): bool
    {
        $count = $this->createQueryBuilder('c')
            ->select('COUNT(c.idCredit)')
            ->join('c.client', 'u')
            ->where('u.idUtilisateur = :cid')
            ->andWhere('c.statut IN (:statuses)')
            ->setParameter('cid', $clientId)
            ->setParameter('statuses', [CreditStatus::PENDING, CreditStatus::APPROVED, CreditStatus::CONTRACT_PENDING, CreditStatus::ACTIVE])
            ->getQuery()->getSingleScalarResult();
        return $count > 0;
    }

    public function findAllFiltered(?string $status = null, ?string $search = null): array
    {
        $qb = $this->createQueryBuilder('c')
            ->join('c.client', 'u')
            ->orderBy('c.dateCreation', 'DESC');

        if ($status && $status !== 'all') {
            $enumStatus = CreditStatus::tryFrom($status);
            if ($enumStatus) {
                $qb->andWhere('c.statut = :status')->setParameter('status', $enumStatus);
            }
        }

        if ($search) {
            $qb->andWhere('u.nom LIKE :q OR u.prenom LIKE :q OR u.email LIKE :q OR u.cin LIKE :q OR c.montant LIKE :q')
                ->setParameter('q', '%' . $search . '%');
        }

        return $qb->getQuery()->getResult();
    }

    public function countByStatus(CreditStatus $status): int
    {
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.idCredit)')
            ->where('c.statut = :s')
            ->setParameter('s', $status)
            ->getQuery()->getSingleScalarResult();
    }

    public function countAll(): int
    {
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.idCredit)')
            ->getQuery()->getSingleScalarResult();
    }

    public function totalApprovedAmount(): string
    {
        return $this->createQueryBuilder('c')
            ->select('COALESCE(SUM(c.montant), 0)')
            ->where('c.statut IN (:s)')
            ->setParameter('s', [CreditStatus::APPROVED, CreditStatus::CONTRACT_PENDING, CreditStatus::ACTIVE, CreditStatus::COMPLETED])
            ->getQuery()->getSingleScalarResult();
    }

    public function countApprovedPipeline(): int
    {
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.idCredit)')
            ->where('c.statut IN (:statuses)')
            ->setParameter('statuses', [
                CreditStatus::APPROVED,
                CreditStatus::CONTRACT_PENDING,
                CreditStatus::ACTIVE,
                CreditStatus::COMPLETED,
            ])
            ->getQuery()->getSingleScalarResult();
    }
}

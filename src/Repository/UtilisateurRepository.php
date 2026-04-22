<?php

namespace App\Repository;

use App\Entity\Utilisateur;
use App\Enum\ClientStatus;
use App\Enum\UserType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateur::class);
    }

    public function findAllClients(): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.role = :role')
            ->setParameter('role', UserType::CLIENT)
            ->orderBy('u.dateCreation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findPendingClients(): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.role = :role')
            ->andWhere('u.clientStatus = :status')
            ->andWhere('u.isVerified = true')
            ->andWhere('u.selectedOffer IS NOT NULL')
            ->setParameter('role', UserType::CLIENT)
            ->setParameter('status', ClientStatus::PENDING)
            ->orderBy('u.dateCreation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function searchClients(string $query, ?string $statusFilter): array
    {
        $qb = $this->createQueryBuilder('u')
            ->where('u.role = :role')
            ->setParameter('role', UserType::CLIENT);

        if (!empty($query)) {
            $qb->andWhere('u.nom LIKE :q OR u.prenom LIKE :q OR u.email LIKE :q OR u.cin LIKE :q')
                ->setParameter('q', '%' . $query . '%');
        }

        if ($statusFilter && $statusFilter !== 'all') {
            $status = ClientStatus::tryFrom($statusFilter);
            if ($status) {
                $qb->andWhere('u.clientStatus = :status')
                    ->setParameter('status', $status);
            }
        }

        return $qb->orderBy('u.dateCreation', 'DESC')->getQuery()->getResult();
    }

    public function countByStatus(ClientStatus $status): int
    {
        return $this->createQueryBuilder('u')
            ->select('COUNT(u.idUtilisateur)')
            ->where('u.role = :role')
            ->andWhere('u.clientStatus = :status')
            ->setParameter('role', UserType::CLIENT)
            ->setParameter('status', $status)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countClients(): int
    {
        return $this->createQueryBuilder('u')
            ->select('COUNT(u.idUtilisateur)')
            ->where('u.role = :role')
            ->setParameter('role', UserType::CLIENT)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countBanned(): int
    {
        return $this->createQueryBuilder('u')
            ->select('COUNT(u.idUtilisateur)')
            ->where('u.role = :role')
            ->andWhere('u.estActif = false')
            ->setParameter('role', UserType::CLIENT)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /** Returns last 6 months registrations [['label' => 'Jan', 'count' => 3], ...] */
    public function getLast6MonthsRegistrations(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT DATE_FORMAT(date_creation, '%Y-%m') as month, COUNT(*) as cnt
                FROM utilisateur
                WHERE role = 'CLIENT' AND date_creation >= DATE_SUB(CURDATE(), INTERVAL 5 MONTH)
                GROUP BY month ORDER BY month ASC";
        $rows = $conn->executeQuery($sql)->fetchAllAssociative();

        $result = [];
        for ($i = 5; $i >= 0; $i--) {
            $dt    = new \DateTime("first day of -{$i} month");
            $key   = $dt->format('Y-m');
            $label = $dt->format('M');
            $count = 0;
            foreach ($rows as $row) {
                if ($row['month'] === $key) { $count = (int) $row['cnt']; break; }
            }
            $result[] = ['label' => $label, 'count' => $count];
        }
        return $result;
    }
}

<?php

namespace App\Repository;

use App\Entity\TransactionBancaire;
use App\Enum\TransactionType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TransactionBancaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransactionBancaire::class);
    }

    public function findByCompte(int $compteId, ?string $type = null, ?string $search = null, ?\DateTimeInterface $dateFrom = null, ?\DateTimeInterface $dateTo = null): array
    {
        $qb = $this->createQueryBuilder('t')
            ->leftJoin('t.compteSource', 'cs')
            ->leftJoin('cs.utilisateur', 'us')
            ->leftJoin('t.compteDestination', 'cd')
            ->leftJoin('cd.utilisateur', 'ud')
            ->where('t.compteSource = :compteId OR t.compteDestination = :compteId')
            ->setParameter('compteId', $compteId);

        if ($type && $type !== 'all') {
            $enumType = TransactionType::tryFrom($type);
            if ($enumType) {
                $qb->andWhere('t.type = :type')->setParameter('type', $enumType);
            }
        }

        if ($search) {
            $qb->andWhere('t.description LIKE :q OR us.nom LIKE :q OR us.prenom LIKE :q OR ud.nom LIKE :q OR ud.prenom LIKE :q OR t.montant LIKE :q')
                ->setParameter('q', '%' . $search . '%');
        }

        if ($dateFrom) {
            $qb->andWhere('t.dateCreation >= :dateFrom')->setParameter('dateFrom', $dateFrom);
        }
        if ($dateTo) {
            $dateTo = (clone $dateTo)->setTime(23, 59, 59);
            $qb->andWhere('t.dateCreation <= :dateTo')->setParameter('dateTo', $dateTo);
        }

        return $qb->orderBy('t.dateCreation', 'DESC')->getQuery()->getResult();
    }

    public function findAllFiltered(?string $type = null, ?string $search = null, ?string $clientFilter = null, ?string $accountFilter = null): array
    {
        $qb = $this->createQueryBuilder('t')
            ->leftJoin('t.compteSource', 'cs')
            ->leftJoin('cs.utilisateur', 'us')
            ->leftJoin('t.compteDestination', 'cd')
            ->leftJoin('cd.utilisateur', 'ud');

        if ($type && $type !== 'all') {
            $enumType = TransactionType::tryFrom($type);
            if ($enumType) {
                $qb->andWhere('t.type = :type')->setParameter('type', $enumType);
            }
        }

        if ($search) {
            $qb->andWhere('t.description LIKE :q OR t.montant LIKE :q OR us.nom LIKE :q OR us.prenom LIKE :q OR ud.nom LIKE :q OR ud.prenom LIKE :q')
                ->setParameter('q', '%' . $search . '%');
        }

        if ($clientFilter) {
            $qb->andWhere('us.nom LIKE :cf OR us.prenom LIKE :cf OR ud.nom LIKE :cf OR ud.prenom LIKE :cf')
                ->setParameter('cf', '%' . $clientFilter . '%');
        }

        if ($accountFilter) {
            $qb->andWhere('cs.numeroCompte LIKE :af OR cd.numeroCompte LIKE :af')
                ->setParameter('af', '%' . $accountFilter . '%');
        }

        return $qb->orderBy('t.dateCreation', 'DESC')->getQuery()->getResult();
    }

    public function countByCompteAndType(int $compteId, TransactionType $type): int
    {
        return $this->createQueryBuilder('t')
            ->select('COUNT(t.idTransaction)')
            ->where('(t.compteSource = :cid OR t.compteDestination = :cid)')
            ->andWhere('t.type = :type')
            ->setParameter('cid', $compteId)
            ->setParameter('type', $type)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countByType(TransactionType $type): int
    {
        return $this->createQueryBuilder('t')
            ->select('COUNT(t.idTransaction)')
            ->where('t.type = :type')
            ->setParameter('type', $type)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countAll(): int
    {
        return $this->createQueryBuilder('t')
            ->select('COUNT(t.idTransaction)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /** Returns [['day' => 'Mon', 'count' => 5], ...] for the last N days */
    public function getLast7DaysCounts(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT DATE(date_creation) as day, COUNT(*) as cnt
                FROM transaction_bancaire
                WHERE date_creation >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
                GROUP BY DATE(date_creation)
                ORDER BY day ASC";
        $rows = $conn->executeQuery($sql)->fetchAllAssociative();

        $result = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = (new \DateTime("-{$i} days"))->format('Y-m-d');
            $label = (new \DateTime("-{$i} days"))->format('d/m');
            $count = 0;
            foreach ($rows as $row) {
                if ($row['day'] === $date) { $count = (int) $row['cnt']; break; }
            }
            $result[] = ['label' => $label, 'count' => $count];
        }
        return $result;
    }

    /** Returns volumes (sum montant) by type for donut chart */
    public function getVolumeByType(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT type, COALESCE(SUM(montant), 0) as total FROM transaction_bancaire GROUP BY type";
        return $conn->executeQuery($sql)->fetchAllAssociative();
    }
}

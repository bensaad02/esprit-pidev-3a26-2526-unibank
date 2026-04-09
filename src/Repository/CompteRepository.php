<?php

namespace App\Repository;

use App\Entity\Compte;
use App\Enum\TypeCompte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CompteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Compte::class);
    }

    public function findByNumero(string $numero): ?Compte
    {
        return $this->findOneBy(['numeroCompte' => $numero]);
    }

    public function findByUser(int $userId): ?Compte
    {
        return $this->createQueryBuilder('c')
            ->join('c.utilisateur', 'u')
            ->where('u.idUtilisateur = :uid')
            ->setParameter('uid', $userId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findAllFiltered(?string $type = null, ?string $status = null, ?string $search = null): array
    {
        $qb = $this->createQueryBuilder('c')
            ->join('c.utilisateur', 'u')
            ->orderBy('c.dateCreation', 'DESC');

        if ($type && $type !== 'all') {
            $enumType = TypeCompte::tryFrom($type);
            if ($enumType) {
                $qb->andWhere('c.typeCompte = :type')->setParameter('type', $enumType);
            }
        }

        if ($status && $status !== 'all') {
            $isActive = $status === 'active';
            $qb->andWhere('c.estActif = :active')->setParameter('active', $isActive);
        }

        if ($search) {
            $qb->andWhere('u.nom LIKE :q OR u.prenom LIKE :q OR u.email LIKE :q OR c.numeroCompte LIKE :q')
                ->setParameter('q', '%' . $search . '%');
        }

        return $qb->getQuery()->getResult();
    }

    public function countAll(): int
    {
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.idCompte)')
            ->getQuery()->getSingleScalarResult();
    }

    public function countActive(): int
    {
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.idCompte)')
            ->where('c.estActif = true')
            ->getQuery()->getSingleScalarResult();
    }

    public function totalSolde(): string
    {
        return $this->createQueryBuilder('c')
            ->select('COALESCE(SUM(c.solde), 0)')
            ->where('c.estActif = true')
            ->getQuery()->getSingleScalarResult();
    }
}

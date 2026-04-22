<?php

namespace App\Repository;

use App\Entity\Reclamation;
use App\Enum\ReclamationStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Repository pour l'entité Reclamation
 * 
 * Ce repository fournit toutes les méthodes d'accès aux données des réclamations :
 * - Recherches filtrées (par statut, type, sentiment, texte)
 * - Comptages (total, par statut, par sentiment)
 * - Requêtes spécifiques pour les utilisateurs
 * - Construction de QueryBuilder pour la pagination
 */
class ReclamationRepository extends ServiceEntityRepository
{
    /**
     * Constructeur - Injection du registre Doctrine
     * 
     * @param ManagerRegistry $registry - Registre des gestionnaires d'entités
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reclamation::class);
    }

    /**
     * Récupère toutes les réclamations avec filtres appliqués
     * Utilisé principalement pour l'export PDF
     * 
     * @param string|null $status - Filtre par statut (en_attente, en_cours, traite, rejete, all)
     * @param string|null $type - Filtre par type (technique, compte, transaction, carte, credit, autre, all)
     * @param string|null $search - Recherche textuelle (sujet, description, nom, prénom, email)
     * @param string|null $sentiment - Filtre par sentiment (positif, negatif, neutre, all)
     * @return array - Liste des réclamations correspondant aux filtres
     */
    public function findAllFiltered(?string $status = 'all', ?string $type = 'all', ?string $search = '', ?string $sentiment = 'all'): array
    {
        // Construction de la requête avec jointure sur l'utilisateur
        $qb = $this->createQueryBuilder('r')
            ->leftJoin('r.utilisateur', 'u')
            ->addSelect('u');

        // Filtrage par statut (si différent de 'all')
        if ($status && $status !== 'all') {
            $qb->andWhere('r.statut = :status')
               ->setParameter('status', $status);
        }

        // Filtrage par type (si différent de 'all')
        if ($type && $type !== 'all') {
            $qb->andWhere('r.type = :type')
               ->setParameter('type', $type);
        }

        // Filtrage par sentiment (si différent de 'all')
        if ($sentiment && $sentiment !== 'all') {
            $qb->andWhere('r.sentiment = :sentiment')
               ->setParameter('sentiment', $sentiment);
        }

        // Recherche textuelle dans plusieurs champs
        if ($search && !empty($search)) {
            $qb->andWhere('r.sujet LIKE :search OR r.description LIKE :search OR u.nom LIKE :search OR u.prenom LIKE :search OR u.email LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        // Tri par date décroissante (les plus récentes d'abord)
        return $qb->orderBy('r.dateReclamation', 'DESC')
                  ->getQuery()
                  ->getResult();
    }

    /**
     * Compte le nombre total de réclamations
     * Utilisé pour les statistiques du tableau de bord
     * 
     * @return int - Nombre total de réclamations
     */
    public function countAll(): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Compte le nombre de réclamations par statut
     * Utilisé pour les statistiques et les graphiques
     * 
     * @param string $status - Statut à compter (en_attente, en_cours, traite, rejete)
     * @return int - Nombre de réclamations avec ce statut
     */
    public function countByStatus(string $status): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->where('r.statut = :status')
            ->setParameter('status', $status)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Compte le nombre de réclamations par sentiment
     * Utilisé pour analyser la satisfaction client
     * 
     * @param string $sentiment - Sentiment à compter (positif, negatif, neutre)
     * @return int - Nombre de réclamations avec ce sentiment
     */
    public function countBySentiment(string $sentiment): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->where('r.sentiment = :sentiment')
            ->setParameter('sentiment', $sentiment)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Récupère toutes les réclamations d'un utilisateur spécifique
     * Utilisé dans l'espace client pour afficher l'historique
     * 
     * @param int $userId - ID de l'utilisateur
     * @return array - Liste des réclamations de l'utilisateur (triées par date décroissante)
     */
    public function findByUtilisateur(int $userId)
    {
        return $this->createQueryBuilder('r')
            ->where('r.utilisateur = :user')
            ->setParameter('user', $userId)
            ->orderBy('r.dateReclamation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Crée un QueryBuilder avec les filtres appliqués
     * Utilisé pour la pagination avec KnpPaginatorBundle
     * 
     * Cette méthode est similaire à findAllFiltered() mais retourne un QueryBuilder
     * au lieu d'un tableau, ce qui permet d'appliquer la pagination.
     * 
     * @param string $status - Filtre par statut (all ou valeur spécifique)
     * @param string $type - Filtre par type (all ou valeur spécifique)
     * @param string $search - Terme de recherche textuelle
     * @param string $sentiment - Filtre par sentiment (all ou valeur spécifique)
     * @return \Doctrine\ORM\QueryBuilder - QueryBuilder configuré avec les filtres
     */
    public function createFilteredQueryBuilder($status, $type, $search, $sentiment)
    {
        // Construction du QueryBuilder avec jointure sur l'utilisateur
        $qb = $this->createQueryBuilder('r')
            ->leftJoin('r.utilisateur', 'u')
            ->addSelect('u');

        // Application du filtre statut
        if ($status !== 'all') {
            $qb->andWhere('r.statut = :status')
               ->setParameter('status', $status);
        }

        // Application du filtre type
        if ($type !== 'all') {
            $qb->andWhere('r.type = :type')
               ->setParameter('type', $type);
        }

        // Application du filtre sentiment
        if ($sentiment !== 'all') {
            $qb->andWhere('r.sentiment = :sentiment')
               ->setParameter('sentiment', $sentiment);
        }

        // Application de la recherche textuelle (si non vide)
        if (!empty($search)) {
            $qb->andWhere('r.sujet LIKE :search OR r.description LIKE :search OR u.nom LIKE :search OR u.prenom LIKE :search OR u.email LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        // Note : Le tri est appliqué par le contrôleur avant la pagination
        return $qb;
    }
}
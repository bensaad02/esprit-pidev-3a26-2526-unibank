<?php

namespace App\Repository;

use App\Entity\Contrat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

// Ce repository centralise les requetes de lecture et de filtrage sur les contrats
class ContratRepository extends ServiceEntityRepository
{
    // Lorsque Symfony cree ce repository, ce constructeur le relie a l'entite Contrat via Doctrine
    // Initialise le repository
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contrat::class);
    }

    // Lorsque l'admin filtre ou recherche des contrats, recupere 
    public function findAllFiltered(?string $status = null, ?string $search = null): array
    {
        // Cree une requete de base sur les contrats
        $qb = $this->createQueryBuilder('c')
            // Joint le client pour pouvoir chercher par ses informations
            ->join('c.client', 'u')
            // Trie  decr
            ->orderBy('c.dateCreation', 'DESC');

        // Si un statut est fourni, on applique un filtre dessus
        if ($status && $status !== 'all') {
            // Ajoute la condition sur le statut
            $qb->andWhere('c.statut = :status')->setParameter('status', $status);
        }

        // Si une recherche est fournie, on cherche dans plusieurs champs
        if ($search) {
            $qb->andWhere('u.nom LIKE :q OR u.prenom LIKE :q OR u.email LIKE :q OR c.numeroContrat LIKE :q')
                // Ajoute les jokers SQL autour du texte recherche
                ->setParameter('q', '%' . $search . '%');
        }

        // Execute la requete et retourne la liste finale
        return $qb->getQuery()->getResult();
    }

    // Lorsque le client ouvre sa page contrat, 
    // Recupere tous les contrats d'un client donnes
    public function findByClient(int $clientId): array
    {
        // Cree une requete sur l'entite Contrat par c
        return $this->createQueryBuilder('c')
            // Joint le client par contrat
            ->join('c.client', 'u')
            // Just les contrats du client demande
            ->where('u.idUtilisateur = :cid')
            // Remplace :cid par la vraie valeur recue en parametre
            ->setParameter('cid', $clientId)
            // Trie les contrats par date de creation decroissante
            ->orderBy('c.dateCreation', 'DESC')
            // Donne req final et retourne la liste
            ->getQuery()->getResult();
    }

    // Lorsque l'admin veut voir le total global,
    // Compte le nombre total de contrats sans filtre
    public function countAll(): int
    {
        // Compte tous les contrats presents dans la table
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.idContrat)')
            ->getQuery()->getSingleScalarResult();
    }

    // Lorsque l'admin consulte les statistiques, cette fonction compte les contrats actifs
    // Compte le nombre de contrats actifs
    public function countActive(): int
    {
        // Construit une requete qui retourne seulement un nombre
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.idContrat)')
            // Garde uniquement les contrats actifs
            ->where('c.statut = :s')
            // Remplace le parametre par la valeur recue
            ->setParameter('s', 'ACTIVE')
            // Execute la requete et retourne le nombre
            ->getQuery()->getSingleScalarResult();
    }
}

<?php

namespace App\Repository;

use App\Entity\Credit;
use App\Enum\CreditStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

// Ce repository centralise les requetes de lecture et de filtrage sur les credits
class CreditRepository extends ServiceEntityRepository
{
    // Lorsque Symfony cree ce repository, ce constructeur le relie a l'entite Credit via Doctrine
    // Initialise le repository
    public function __construct(ManagerRegistry $registry) // intermedi entre repostory w doctrine
    {
        // Indique a Doctrine que ce repository gere l'entite Credit
        parent::__construct($registry, Credit::class);
    }

    // Lorsque le client ouvre sa page credit, cette fonction recupere ses credits du plus recent au plus ancien
    // Recupere tous les credits d'un client donnes,
    public function findByClient(int $clientId): array
    {
        // Cree une requete sur l'entite Credit par c
        return $this->createQueryBuilder('c')
            // Joint le client par credit 
            ->join('c.client', 'u')
            // just les credits du client demande
            ->where('u.idUtilisateur = :cid')
            // Remplace :cid par la vraie valeur recue en parametre
            ->setParameter('cid', $clientId)
            // Trie les credits par date de creation decroissante
            ->orderBy('c.dateCreation', 'DESC')
            // donne req final et retourne la liste
            ->getQuery()->getResult();
    }

    // clien demande Verifie si un client a deja un credit en attente, approuve ou actif


    public function hasActiveOrPending(int $clientId): bool
    {
        // Compte les credits du client ayant un statut bloquant
        $count = $this->createQueryBuilder('c')
            // On veut un nombre et non une liste d'objets
            ->select('COUNT(c.idCredit)')
            // Joint le client du credit
            ->join('c.client', 'u')
            // Filtre sur le client concerne
            ->where('u.idUtilisateur = :cid')
            // Garde seulement les statuts consideres comme deja en cours
            ->andWhere('c.statut IN (:statuses)')
            // Injecte l'identifiant du client dans la requete
            ->setParameter('cid', $clientId)
            // Injecte la liste des statuts a verifier
            ->setParameter('statuses', [CreditStatus::PENDING, CreditStatus::APPROVED, CreditStatus::CONTRACT_PENDING, CreditStatus::ACTIVE])
            // Retourne une seule valeur numerique
            ->getQuery()->getSingleScalarResult(); // ececut return val uniq
        // tru ila un credit 
        return $count > 0;
    }

    // Lorsque l'admin filtre ou recherche des credits, 
    // Recupere la liste complete des credits admin avec filtre par statut et recherche
    public function findAllFiltered(?string $status = null, ?string $search = null): array
    {
        // Cree une requete 
        $qb = $this->createQueryBuilder('c')
            // Joint le client pour pouvoir chercher par ses informations
            ->join('c.client', 'u')
            // Trie du plus recent au plus ancien
            ->orderBy('c.dateCreation', 'DESC');

        // Si un statut est fourni, on applique un filtre dessus
        if ($status && $status !== 'all') {
            // Convertit la chaine recue en enum CreditStatus
            $enumStatus = CreditStatus::tryFrom($status);
            if ($enumStatus) {
                // Ajoute la condition sur le statut si la valeur est valide
                $qb->andWhere('c.statut = :status')->setParameter('status', $enumStatus);
            }
        }

        // Si une recherche est fournie, on cherche dans plusieurs champs
        if ($search) {
            $qb->andWhere('u.nom LIKE :q OR u.prenom LIKE :q OR u.email LIKE :q OR u.cin LIKE :q OR c.montant LIKE :q')
                // Ajoute les jokers SQL autour du texte recherche
                ->setParameter('q', '%' . $search . '%');
        }

        // Execute la requete et retourne la liste finale
        return $qb->getQuery()->getResult();
    }

    // Lorsque l'admin consulte les statistiques, cette fonction compte les credits d'un statut donne
    public function countByStatus(CreditStatus $status): int
    {
        // Construit une requete qui retourne seulement un nombre
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.idCredit)')
            // Garde uniquement les credits du statut demande
            ->where('c.statut = :s')
            // Remplace le parametre par l'enum recu
            ->setParameter('s', $status)
            // Execute la requete et retourne le nombre
            ->getQuery()->getSingleScalarResult();
    }

    // Lorsque l'admin veut voir le total global, cette fonction compte tous les credits enregistres
    // Compte le nombre total de credits sans filtre
    public function countAll(): int
    {
        // Compte tous les credits presents dans la table
        return $this->createQueryBuilder('c')
            ->select('COUNT(c.idCredit)')
            ->getQuery()->getSingleScalarResult();
    }






    // Lorsque l'admin consulte le montant approuve, cette fonction calcule la somme des credits valides
    // Calcule la somme des montants des credits approuves, en cours ou termines



    
    public function totalApprovedAmount(): string
    {
        // Additionne les montants, et retourne 0 si aucun resultat
        return $this->createQueryBuilder('c')
            ->select('COALESCE(SUM(c.montant), 0)')
            // Garde seulement les statuts utiles pour ce total
            ->where('c.statut IN (:s)')
            // Injecte la liste des statuts a prendre en compte
            ->setParameter('s', [CreditStatus::APPROVED, CreditStatus::CONTRACT_PENDING, CreditStatus::ACTIVE, CreditStatus::COMPLETED])
            // Execute la requete et retourne la somme
            ->getQuery()->getSingleScalarResult();
    }
}

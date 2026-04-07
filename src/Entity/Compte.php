<?php

namespace App\Entity;

use App\Enum\TypeCompte;
use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CompteRepository::class)]
#[ORM\Table(name: 'compte')]
class Compte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idCompte = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'comptes')]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'id_utilisateur', nullable: false)]
    #[Assert\NotNull]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(length: 30, unique: true)]
    #[Assert\NotBlank(message: 'Le numero de compte est obligatoire.')]
    #[Assert\Length(max: 30, maxMessage: 'Le numero de compte ne doit pas depasser {{ limit }} caracteres.')]
    private ?string $numeroCompte = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    #[Assert\PositiveOrZero(message: 'Le solde ne peut pas etre negatif.')]
    private string $solde = '0.00';

    #[ORM\Column(length: 20, enumType: TypeCompte::class)]
    private TypeCompte $typeCompte = TypeCompte::COURANT;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $estActif = true;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\OneToMany(targetEntity: TransactionBancaire::class, mappedBy: 'compteSource')]
    private Collection $transactionsSortantes;

    #[ORM\OneToMany(targetEntity: TransactionBancaire::class, mappedBy: 'compteDestination')]
    private Collection $transactionsEntrantes;

    public function __construct()
    {
        $this->dateCreation = new \DateTime();
        $this->transactionsSortantes = new ArrayCollection();
        $this->transactionsEntrantes = new ArrayCollection();
    }

    public function getIdCompte(): ?int
    {
        return $this->idCompte;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    public function getNumeroCompte(): ?string
    {
        return $this->numeroCompte;
    }

    public function setNumeroCompte(string $numeroCompte): static
    {
        $this->numeroCompte = $numeroCompte;
        return $this;
    }

    public function getSolde(): string
    {
        return $this->solde;
    }

    public function setSolde(string $solde): static
    {
        $this->solde = $solde;
        return $this;
    }

    public function getTypeCompte(): TypeCompte
    {
        return $this->typeCompte;
    }

    public function setTypeCompte(TypeCompte $typeCompte): static
    {
        $this->typeCompte = $typeCompte;
        return $this;
    }

    public function isEstActif(): bool
    {
        return $this->estActif;
    }

    public function setEstActif(bool $estActif): static
    {
        $this->estActif = $estActif;
        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }
}

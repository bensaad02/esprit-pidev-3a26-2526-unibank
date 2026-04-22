<?php

namespace App\Entity;

use App\Repository\CarteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarteRepository::class)]
#[ORM\Table(name: 'cartes')]
class Carte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'cartes')]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id_utilisateur', nullable: false)]
    private ?Utilisateur $utilisateur = null;

    // ❗ removed NotBlank to avoid blocking form
    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 100)]
    private ?string $bank = 'UniBank';

    #[ORM\Column(length: 30)]
    private string $status = 'EN_ATTENTE';

    #[ORM\Column(length: 30)]
    private ?string $typeCarte = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $cardNumber = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $expirationDate = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    private string $solde = '0.00';

    #[ORM\OneToMany(mappedBy: 'carte', targetEntity: TransactionCarte::class)]
    private Collection $transactions;

    #[ORM\OneToOne(mappedBy: 'carte', targetEntity: CarteSecurity::class, cascade: ['persist', 'remove'])]
    private ?CarteSecurity $security = null;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
        $this->status = 'EN_ATTENTE'; // ✅ default safety
    }

    // ================= GETTERS / SETTERS =================

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getBank(): ?string
    {
        return $this->bank;
    }

    public function setBank(?string $bank): static
    {
        $this->bank = $bank;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getTypeCarte(): ?string
    {
        return $this->typeCarte;
    }

    public function setTypeCarte(?string $typeCarte): static
    {
        $this->typeCarte = $typeCarte;
        return $this;
    }

    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    public function setCardNumber(?string $cardNumber): static
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    public function getExpirationDate(): ?string
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(?string $expirationDate): static
    {
        $this->expirationDate = $expirationDate;
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

    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function getSecurity(): ?CarteSecurity
    {
        return $this->security;
    }

    public function setSecurity(?CarteSecurity $security): static
    {
        $this->security = $security;
        return $this;
    }
}
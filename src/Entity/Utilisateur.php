<?php

namespace App\Entity;

use App\Enum\ClientStatus;
use App\Enum\UserType;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\Table(name: 'utilisateur')]
#[ORM\HasLifecycleCallbacks]
#[UniqueEntity(fields: ['email'], message: 'Un compte avec cet email existe deja.')]
#[UniqueEntity(fields: ['cin'], message: 'Un compte avec ce CIN existe deja.')]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idUtilisateur = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Le nom est obligatoire.')]
    #[Assert\Length(min: 2, max: 50, minMessage: 'Le nom doit contenir au moins {{ limit }} caracteres.')]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Le prenom est obligatoire.')]
    #[Assert\Length(min: 2, max: 50, minMessage: 'Le prenom doit contenir au moins {{ limit }} caracteres.')]
    private ?string $prenom = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank(message: "L'email est obligatoire.")]
    #[Assert\Email(message: "L'email '{{ value }}' n'est pas valide.")]
    private ?string $email = null;

    #[ORM\Column]
    private ?string $motDePasse = null;

    #[ORM\Column(length: 15)]
    #[Assert\NotBlank(message: 'Le telephone est obligatoire.')]
    #[Assert\Length(min: 8, max: 15, minMessage: 'Le telephone doit contenir au moins {{ limit }} caracteres.')]
    #[Assert\Regex(pattern: '/^\+?[\d\s\-]{8,15}$/', message: 'Le numero de telephone n\'est pas valide.')]
    private ?string $telephone = null;

    #[ORM\Column(length: 20, enumType: UserType::class)]
    private UserType $role = UserType::CLIENT;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $isVerified = false;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $estActif = false;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $verificationToken = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $tokenExpiry = null;

    #[ORM\Column(length: 8, unique: true)]
    #[Assert\NotBlank(message: 'Le CIN est obligatoire.')]
    #[Assert\Length(exactly: 8, exactMessage: 'Le CIN doit contenir exactement 8 chiffres.')]
    #[Assert\Regex(pattern: '/^\d{8}$/', message: 'Le CIN doit contenir exactement 8 chiffres numeriques.')]
    private ?string $cin = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L'adresse est obligatoire.")]
    #[Assert\Length(min: 5, minMessage: "L'adresse doit contenir au moins {{ limit }} caracteres.")]
    private ?string $adresse = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message: 'La date de naissance est obligatoire.')]
    #[Assert\LessThanOrEqual(value: '-18 years', message: 'Vous devez avoir au moins 18 ans pour vous inscrire.')]
    #[Assert\GreaterThan(value: '-120 years', message: 'La date de naissance n\'est pas valide.')]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $selectedOffer = null;

    #[ORM\Column(length: 20, enumType: ClientStatus::class, nullable: true)]
    private ?ClientStatus $clientStatus = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $matricule = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $departement = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateMaj = null;

    #[ORM\OneToMany(targetEntity: Compte::class, mappedBy: 'utilisateur')]
    private Collection $comptes;

    #[ORM\OneToMany(targetEntity: Carte::class, mappedBy: 'utilisateur')]
    private Collection $cartes;

    #[ORM\OneToMany(targetEntity: Reclamation::class, mappedBy: 'utilisateur')]
    private Collection $reclamations;

    public function __construct()
    {
        $this->dateCreation = new \DateTime();
        $this->dateMaj = new \DateTime();
        $this->estActif = false;
        $this->isVerified = false;
        $this->comptes = new ArrayCollection();
        $this->cartes = new ArrayCollection();
        $this->reclamations = new ArrayCollection();
    }

    #[Assert\Callback]
    public function validateAge(ExecutionContextInterface $context): void
    {
        if ($this->dateNaissance === null) {
            return;
        }

        $now = new \DateTime();
        $age = $now->diff($this->dateNaissance)->y;
        if ($age < 18) {
            $context->buildViolation('Vous devez avoir au moins 18 ans.')
                ->atPath('dateNaissance')
                ->addViolation();
        }
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): static
    {
        $this->motDePasse = $motDePasse;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getRole(): UserType
    {
        return $this->role;
    }

    public function setRole(UserType $role): static
    {
        $this->role = $role;
        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;
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

    public function getVerificationToken(): ?string
    {
        return $this->verificationToken;
    }

    public function setVerificationToken(?string $verificationToken): static
    {
        $this->verificationToken = $verificationToken;
        return $this;
    }

    public function getTokenExpiry(): ?\DateTimeInterface
    {
        return $this->tokenExpiry;
    }

    public function setTokenExpiry(?\DateTimeInterface $tokenExpiry): static
    {
        $this->tokenExpiry = $tokenExpiry;
        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): static
    {
        $this->cin = $cin;
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    public function getSelectedOffer(): ?string
    {
        return $this->selectedOffer;
    }

    public function setSelectedOffer(?string $selectedOffer): static
    {
        $this->selectedOffer = $selectedOffer;
        return $this;
    }

    public function getClientStatus(): ?ClientStatus
    {
        return $this->clientStatus;
    }

    public function setClientStatus(?ClientStatus $clientStatus): static
    {
        $this->clientStatus = $clientStatus;
        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): static
    {
        $this->matricule = $matricule;
        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(?string $departement): static
    {
        $this->departement = $departement;
        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function getDateMaj(): ?\DateTimeInterface
    {
        return $this->dateMaj;
    }

    #[ORM\PreUpdate]
    public function updateDateMaj(): void
    {
        $this->dateMaj = new \DateTime();
    }

    public function getComptes(): Collection
    {
        return $this->comptes;
    }

    public function getCartes(): Collection
    {
        return $this->cartes;
    }

    public function getReclamations(): Collection
    {
        return $this->reclamations;
    }

    public function getFullName(): string
    {
        return $this->prenom . ' ' . $this->nom;
    }

    public function getRoles(): array
    {
        return match ($this->role) {
            UserType::AGENT => ['ROLE_AGENT', 'ROLE_USER'],
            UserType::CLIENT => ['ROLE_CLIENT', 'ROLE_USER'],
        };
    }

    public function getPassword(): ?string
    {
        return $this->motDePasse;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function eraseCredentials(): void
    {
    }
}

<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

// Cette classe Contrat est une entite Doctrine liee a la table contrat.
// Son repository ContratRepository est utilise pour effectuer les requetes personnalisees.
#[ORM\Entity(repositoryClass: ContratRepository::class)]
#[ORM\Table(name: 'contrat')]
#[ORM\HasLifecycleCallbacks] // achtive  callbacks Doctrine auto mjd(date)
class Contrat
{
    // Identifiant unique du contrat, genere automatiquement par la base de donnees
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idContrat = null;

    // Credit auquel ce contrat est rattache
    #[ORM\ManyToOne(targetEntity: Credit::class)]
    #[ORM\JoinColumn(name: 'id_credit', referencedColumnName: 'id_credit', nullable: false)]
    #[Assert\NotNull] // champ oblig no nul
    private ?Credit $credit = null;

    // Client concerne par ce contrat
    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_client', referencedColumnName: 'id_utilisateur', nullable: false)]
    #[Assert\NotNull]
    private ?Utilisateur $client = null;

    // Agent interne qui a traite ou genere le contrat
    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_agent', referencedColumnName: 'id_utilisateur', nullable: false)]
    #[Assert\NotNull]
    private ?Utilisateur $agent = null;

    // Numero unique attribue au contrat
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Le numero de contrat est obligatoire.')]
    #[Assert\Length(max: 50, maxMessage: 'Le numero de contrat ne doit pas depasser {{ limit }} caracteres.')]
    private ?string $numeroContrat = null;

    // Montant principal du credit indique dans le contrat
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    #[Assert\NotBlank(message: 'Le montant du credit est obligatoire.')]
    #[Assert\Positive(message: 'Le montant du credit doit etre superieur a 0.')]
    private ?string $montantCredit = null;

    // Taux d'interet applique au contrat
    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    #[Assert\NotBlank(message: 'Le taux d\'interet est obligatoire.')]
    #[Assert\Positive(message: 'Le taux d\'interet doit etre superieur a 0.')]
    private ?string $tauxInteret = null;

    // Duree totale du contrat exprimee en mois
    #[ORM\Column]
    #[Assert\NotBlank(message: 'La duree du contrat est obligatoire.')]
    #[Assert\Positive(message: 'La duree du contrat doit etre superieure a 0.')]
    private ?int $dureeEnMois = null;

    // Montant que le client paie chaque mois
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    #[Assert\NotBlank(message: 'La mensualite est obligatoire.')]
    #[Assert\Positive(message: 'La mensualite doit etre superieure a 0.')]
    private ?string $mensualite = null;

    // Somme totale que le client remboursera a la fin du contrat
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    #[Assert\NotBlank(message: 'Le montant total est obligatoire.')]
    #[Assert\Positive(message: 'Le montant total doit etre superieur a 0.')]
    private ?string $montantTotal = null;

    // Date de debut du contrat
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull(message: 'La date de debut est obligatoire.')]
    private ?\DateTimeInterface $dateDebut = null;

    // Date de fin prevue du contrat
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull(message: 'La date de fin est obligatoire.')]
    private ?\DateTimeInterface $dateFin = null;

    // Date a laquelle le contrat a ete genere
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateGeneration = null;

    // Date a laquelle le client a signe le contrat, si la signature a deja eu lieu
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateSignature = null;

    // Statut actuel du contrat
    #[ORM\Column(length: 30)]
    private string $statut = 'ACTIVE';

    // Date de creation de l'enregistrement du contrat
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    // Date de la derniere mise a jour du contrat
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateMaj = null;

    // Lorsqu'un nouveau contrat est cree, ce constructeur initialise automatiquement ses dates techniques
    public function __construct()
    {
        $this->dateCreation = new \DateTime();
        $this->dateMaj = new \DateTime();
        $this->dateGeneration = new \DateTime();
    }

    // Cette validation personnalisee verifie que la date de fin est bien posterieure a la date de debut
    #[Assert\Callback]
    public function validateDates(ExecutionContextInterface $context): void
    {
        if ($this->dateDebut !== null && $this->dateFin !== null && $this->dateFin <= $this->dateDebut) {
            $context->buildViolation('La date de fin doit etre posterieure a la date de debut.')
                ->atPath('dateFin')
                ->addViolation();
        }
    }

    // Avant chaque mise a jour, Doctrine actualise automatiquement la date de modification
    #[ORM\PreUpdate]
    public function updateDateMaj(): void
    {
        $this->dateMaj = new \DateTime();
    }

    public function getIdContrat(): ?int
    {
        return $this->idContrat;
    }
    public function getCredit(): ?Credit
    {
        return $this->credit;
    }
    public function setCredit(?Credit $credit): static
    {
        $this->credit = $credit;
        return $this;
    }
    public function getClient(): ?Utilisateur
    {
        return $this->client;
    }
    public function setClient(?Utilisateur $client): static
    {
        $this->client = $client;
        return $this;
    }
    public function getAgent(): ?Utilisateur
    {
        return $this->agent;
    }
    public function setAgent(?Utilisateur $agent): static
    {
        $this->agent = $agent;
        return $this;
    }
    public function getNumeroContrat(): ?string
    {
        return $this->numeroContrat;
    }
    public function setNumeroContrat(string $numeroContrat): static
    {
        $this->numeroContrat = $numeroContrat;
        return $this;
    }
    public function getMontantCredit(): ?string
    {
        return $this->montantCredit;
    }
    public function setMontantCredit(string $montantCredit): static
    {
        $this->montantCredit = $montantCredit;
        return $this;
    }
    public function getTauxInteret(): ?string
    {
        return $this->tauxInteret;
    }
    public function setTauxInteret(string $tauxInteret): static
    {
        $this->tauxInteret = $tauxInteret;
        return $this;
    }
    public function getDureeEnMois(): ?int
    {
        return $this->dureeEnMois;
    }
    public function setDureeEnMois(int $dureeEnMois): static
    {
        $this->dureeEnMois = $dureeEnMois;
        return $this;
    }
    public function getMensualite(): ?string
    {
        return $this->mensualite;
    }
    public function setMensualite(string $mensualite): static
    {
        $this->mensualite = $mensualite;
        return $this;
    }
    public function getMontantTotal(): ?string
    {
        return $this->montantTotal;
    }
    public function setMontantTotal(string $montantTotal): static
    {
        $this->montantTotal = $montantTotal;
        return $this;
    }
    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }
    public function setDateDebut(\DateTimeInterface $dateDebut): static
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }
    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }
    public function setDateFin(\DateTimeInterface $dateFin): static
    {
        $this->dateFin = $dateFin;
        return $this;
    }
    public function getDateGeneration(): ?\DateTimeInterface
    {
        return $this->dateGeneration;
    }
    public function getDateSignature(): ?\DateTimeInterface
    {
        return $this->dateSignature;
    }
    public function setDateSignature(?\DateTimeInterface $dateSignature): static
    {
        $this->dateSignature = $dateSignature;
        return $this;
    }
    public function getStatut(): string
    {
        return $this->statut;
    }
    public function setStatut(string $statut): static
    {
        $this->statut = $statut;
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
}

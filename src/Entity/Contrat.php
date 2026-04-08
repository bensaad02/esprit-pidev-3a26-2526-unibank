<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
#[ORM\Table(name: 'contrat')]
#[ORM\HasLifecycleCallbacks]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idContrat = null;

    #[ORM\ManyToOne(targetEntity: Credit::class)]
    #[ORM\JoinColumn(name: 'id_credit', referencedColumnName: 'id_credit', nullable: false)]
    #[Assert\NotNull]
    private ?Credit $credit = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_client', referencedColumnName: 'id_utilisateur', nullable: false)]
    #[Assert\NotNull]
    private ?Utilisateur $client = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_agent', referencedColumnName: 'id_utilisateur', nullable: false)]
    #[Assert\NotNull]
    private ?Utilisateur $agent = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Le numero de contrat est obligatoire.')]
    #[Assert\Length(max: 50, maxMessage: 'Le numero de contrat ne doit pas depasser {{ limit }} caracteres.')]
    private ?string $numeroContrat = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    #[Assert\NotBlank(message: 'Le montant du credit est obligatoire.')]
    #[Assert\Positive(message: 'Le montant du credit doit etre superieur a 0.')]
    private ?string $montantCredit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    #[Assert\NotBlank(message: 'Le taux d\'interet est obligatoire.')]
    #[Assert\Positive(message: 'Le taux d\'interet doit etre superieur a 0.')]
    private ?string $tauxInteret = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'La duree du contrat est obligatoire.')]
    #[Assert\Positive(message: 'La duree du contrat doit etre superieure a 0.')]
    private ?int $dureeEnMois = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    #[Assert\NotBlank(message: 'La mensualite est obligatoire.')]
    #[Assert\Positive(message: 'La mensualite doit etre superieure a 0.')]
    private ?string $mensualite = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    #[Assert\NotBlank(message: 'Le montant total est obligatoire.')]
    #[Assert\Positive(message: 'Le montant total doit etre superieur a 0.')]
    private ?string $montantTotal = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull(message: 'La date de debut est obligatoire.')]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull(message: 'La date de fin est obligatoire.')]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateGeneration = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateSignature = null;

    #[ORM\Column(length: 30)]
    private string $statut = 'ACTIVE';

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateMaj = null;

    public function __construct()
    {
        $this->dateCreation = new \DateTime();
        $this->dateMaj = new \DateTime();
        $this->dateGeneration = new \DateTime();
    }

    #[Assert\Callback]
    public function validateDates(ExecutionContextInterface $context): void
    {
        if ($this->dateDebut !== null && $this->dateFin !== null && $this->dateFin <= $this->dateDebut) {
            $context->buildViolation('La date de fin doit etre posterieure a la date de debut.')
                ->atPath('dateFin')
                ->addViolation();
        }
    }

    #[ORM\PreUpdate]
    public function updateDateMaj(): void
    {
        $this->dateMaj = new \DateTime();
    }

    public function getIdContrat(): ?int { return $this->idContrat; }
    public function getCredit(): ?Credit { return $this->credit; }
    public function setCredit(?Credit $credit): static { $this->credit = $credit; return $this; }
    public function getClient(): ?Utilisateur { return $this->client; }
    public function setClient(?Utilisateur $client): static { $this->client = $client; return $this; }
    public function getAgent(): ?Utilisateur { return $this->agent; }
    public function setAgent(?Utilisateur $agent): static { $this->agent = $agent; return $this; }
    public function getNumeroContrat(): ?string { return $this->numeroContrat; }
    public function setNumeroContrat(string $numeroContrat): static { $this->numeroContrat = $numeroContrat; return $this; }
    public function getMontantCredit(): ?string { return $this->montantCredit; }
    public function setMontantCredit(string $montantCredit): static { $this->montantCredit = $montantCredit; return $this; }
    public function getTauxInteret(): ?string { return $this->tauxInteret; }
    public function setTauxInteret(string $tauxInteret): static { $this->tauxInteret = $tauxInteret; return $this; }
    public function getDureeEnMois(): ?int { return $this->dureeEnMois; }
    public function setDureeEnMois(int $dureeEnMois): static { $this->dureeEnMois = $dureeEnMois; return $this; }
    public function getMensualite(): ?string { return $this->mensualite; }
    public function setMensualite(string $mensualite): static { $this->mensualite = $mensualite; return $this; }
    public function getMontantTotal(): ?string { return $this->montantTotal; }
    public function setMontantTotal(string $montantTotal): static { $this->montantTotal = $montantTotal; return $this; }
    public function getDateDebut(): ?\DateTimeInterface { return $this->dateDebut; }
    public function setDateDebut(\DateTimeInterface $dateDebut): static { $this->dateDebut = $dateDebut; return $this; }
    public function getDateFin(): ?\DateTimeInterface { return $this->dateFin; }
    public function setDateFin(\DateTimeInterface $dateFin): static { $this->dateFin = $dateFin; return $this; }
    public function getDateGeneration(): ?\DateTimeInterface { return $this->dateGeneration; }
    public function getDateSignature(): ?\DateTimeInterface { return $this->dateSignature; }
    public function setDateSignature(?\DateTimeInterface $dateSignature): static { $this->dateSignature = $dateSignature; return $this; }
    public function getStatut(): string { return $this->statut; }
    public function setStatut(string $statut): static { $this->statut = $statut; return $this; }
    public function getDateCreation(): ?\DateTimeInterface { return $this->dateCreation; }
    public function getDateMaj(): ?\DateTimeInterface { return $this->dateMaj; }
}

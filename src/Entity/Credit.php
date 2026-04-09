<?php

namespace App\Entity;

use App\Enum\CreditStatus;
use App\Enum\TypeContrat;
use App\Repository\CreditRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity(repositoryClass: CreditRepository::class)]
#[ORM\Table(name: 'credit')]
#[ORM\HasLifecycleCallbacks]
class Credit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idCredit = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_client', referencedColumnName: 'id_utilisateur', nullable: false)]
    #[Assert\NotNull]
    private ?Utilisateur $client = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_agent', referencedColumnName: 'id_utilisateur', nullable: true)]
    private ?Utilisateur $agent = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    #[Assert\NotBlank(message: 'Le montant est obligatoire.')]
    #[Assert\Positive(message: 'Le montant doit etre superieur a 0.')]
    #[Assert\Range(
        min: 1000,
        max: 500000,
        notInRangeMessage: 'Le montant doit etre entre {{ min }} et {{ max }} DT.'
    )]
    private ?string $montant = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    #[Assert\NotBlank(message: 'Le taux d\'interet est obligatoire.')]
    #[Assert\Positive(message: 'Le taux d\'interet doit etre superieur a 0.')]
    private ?string $tauxInteret = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'La duree est obligatoire.')]
    #[Assert\Positive(message: 'La duree doit etre superieure a 0.')]
    #[Assert\Range(
        min: 12,
        max: 300,
        notInRangeMessage: 'La duree doit etre entre 1 et 25 ans.'
    )]
    private ?int $dureeEnMois = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    private ?string $mensualite = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    private ?string $montantTotal = null;

    #[ORM\Column(length: 30, enumType: CreditStatus::class)]
    private CreditStatus $statut = CreditStatus::PENDING;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\NotBlank(message: 'Le motif de la demande est obligatoire.')]
    #[Assert\Length(
        min: 10,
        minMessage: 'Le motif doit contenir au moins {{ limit }} caracteres.'
    )]
    private ?string $motifDemande = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $motifRejet = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    #[Assert\Positive(message: 'Le salaire doit etre superieur a 0.')]
    private ?string $salaireMensuel = null;

    #[ORM\Column(length: 40, enumType: TypeContrat::class, nullable: true)]
    private ?TypeContrat $typeContrat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datePrise = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDebutPaiement = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateTraitement = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateMaj = null;

    public function __construct()
    {
        $this->dateCreation = new \DateTime();
        $this->dateMaj = new \DateTime();
    }

    #[Assert\Callback]
    public function validateCreditRules(ExecutionContextInterface $context): void
    {
        if (
            $this->montant !== null &&
            $this->tauxInteret !== null &&
            $this->dureeEnMois !== null &&
            $this->salaireMensuel !== null
        ) {
            $this->calculatePayments();

            if ($this->mensualite !== null && (float) $this->mensualite > ((float) $this->salaireMensuel * 0.33)) {
                $context->buildViolation('Votre salaire est insuffisant. La mensualite depasse 33% de votre salaire.')
                    ->atPath('salaireMensuel')
                    ->addViolation();
            }
        }

        if ($this->statut === CreditStatus::REJECTED && trim((string) $this->motifRejet) === '') {
            $context->buildViolation('Le motif du rejet est obligatoire.')
                ->atPath('motifRejet')
                ->addViolation();
        }
    }

    public function calculatePayments(): void
    {
        if ($this->montant === null || $this->tauxInteret === null || $this->dureeEnMois === null) {
            return;
        }

        $principal = (float) $this->montant;
        $annualRate = (float) $this->tauxInteret;
        $months = $this->dureeEnMois;

        $monthlyRate = $annualRate / 100 / 12;

        if ($monthlyRate > 0) {
            $this->mensualite = number_format(
                $principal * $monthlyRate * pow(1 + $monthlyRate, $months) / (pow(1 + $monthlyRate, $months) - 1),
                2, '.', ''
            );
        } else {
            $this->mensualite = number_format($principal / $months, 2, '.', '');
        }

        $this->montantTotal = number_format((float) $this->mensualite * $months, 2, '.', '');
    }

    #[ORM\PreUpdate]
    public function updateDateMaj(): void
    {
        $this->dateMaj = new \DateTime();
    }

    public function getIdCredit(): ?int
    {
        return $this->idCredit;
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

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): static
    {
        $this->montant = $montant;
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

    public function getMontantTotal(): ?string
    {
        return $this->montantTotal;
    }

    public function getStatut(): CreditStatus
    {
        return $this->statut;
    }

    public function setStatut(CreditStatus $statut): static
    {
        $this->statut = $statut;
        return $this;
    }

    public function getMotifDemande(): ?string
    {
        return $this->motifDemande;
    }

    public function setMotifDemande(?string $motifDemande): static
    {
        $this->motifDemande = $motifDemande;
        return $this;
    }

    public function getMotifRejet(): ?string
    {
        return $this->motifRejet;
    }

    public function setMotifRejet(?string $motifRejet): static
    {
        $this->motifRejet = $motifRejet;
        return $this;
    }

    public function getSalaireMensuel(): ?string
    {
        return $this->salaireMensuel;
    }

    public function setSalaireMensuel(?string $salaireMensuel): static
    {
        $this->salaireMensuel = $salaireMensuel;
        return $this;
    }

    public function getTypeContrat(): ?TypeContrat
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(?TypeContrat $typeContrat): static
    {
        $this->typeContrat = $typeContrat;
        return $this;
    }

    public function getDatePrise(): ?\DateTimeInterface
    {
        return $this->datePrise;
    }

    public function setDatePrise(?\DateTimeInterface $datePrise): static
    {
        $this->datePrise = $datePrise;
        return $this;
    }

    public function getDateDebutPaiement(): ?\DateTimeInterface
    {
        return $this->dateDebutPaiement;
    }

    public function setDateDebutPaiement(?\DateTimeInterface $dateDebutPaiement): static
    {
        $this->dateDebutPaiement = $dateDebutPaiement;
        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function getDateTraitement(): ?\DateTimeInterface
    {
        return $this->dateTraitement;
    }

    public function setDateTraitement(?\DateTimeInterface $dateTraitement): static
    {
        $this->dateTraitement = $dateTraitement;
        return $this;
    }

    public function getDateMaj(): ?\DateTimeInterface
    {
        return $this->dateMaj;
    }

    public function getCoutCredit(): float
    {
        return (float) $this->montantTotal - (float) $this->montant;
    }
}

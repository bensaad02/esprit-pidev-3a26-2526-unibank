<?php

namespace App\Entity;

use App\Enum\CreditStatus;
use App\Enum\TypeContrat;
use App\Repository\CreditRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

// Entité Doctrine pour stocker les informations d'un crédit
// Cette classe représente la table `credit` en base de données
#[ORM\Entity(repositoryClass: CreditRepository::class)] // class credit relie par repostor il pred des requet ..
#[ORM\Table(name: 'credit')]
#[ORM\HasLifecycleCallbacks]
class Credit
{
    // Identifiant unique du crédit
    #[ORM\Id]
    #[ORM\GeneratedValue] //gener automatiquement
    #[ORM\Column]
    private ?int $idCredit = null;

    // Le client qui demande le crédit (relation ManyToOne)
    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_client', referencedColumnName: 'id_utilisateur', nullable: false)] // oblig ne pas vide 
    #[Assert\NotNull] // validation (obli, not null(mawjoud))
    private ?Utilisateur $client = null;

    // L'agent interne qui traite le crédit (optionnel)
    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_agent', referencedColumnName: 'id_utilisateur', nullable: true)] // optionrl
    private ?Utilisateur $agent = null;

    // Montant demandé pour le crédit
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    #[Assert\NotBlank(message: 'Le montant est obligatoire.')] // oblig no vide 
    #[Assert\Positive(message: 'Le montant doit etre superieur a 0.')] // akber 0
    #[Assert\Range(
        min: 1000,
        max: 500000,
        notInRangeMessage: 'Le montant doit etre entre {{ min }} et {{ max }} DT.' // msgerr persol
    )]
    private ?string $montant = null;

    // Taux d'interet annuel applique au crédit
    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    #[Assert\NotBlank(message: 'Le taux d\'interet est obligatoire.')]
    #[Assert\Positive(message: 'Le taux d\'interet doit etre superieur a 0.')]
    private ?string $tauxInteret = null;

    // Durée du crédit en mois
    #[ORM\Column]
    #[Assert\NotBlank(message: 'La duree est obligatoire.')]
    #[Assert\Positive(message: 'La duree doit etre superieure a 0.')]
    #[Assert\Range(
        min: 12,
        max: 300,
        notInRangeMessage: 'La duree doit etre entre 1 et 25 ans.'
    )]
    private ?int $dureeEnMois = null;

    // Montant de la mensualite calculee
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    private ?string $mensualite = null;

    // Montant total a rembourser
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    private ?string $montantTotal = null;

    // Statut du crédit (pending, approved, rejected, etc.)
    #[ORM\Column(length: 30, enumType: CreditStatus::class)]
    private CreditStatus $statut = CreditStatus::PENDING;

    // Motif de la demande fourni par le client
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\NotBlank(message: 'Le motif de la demande est obligatoire.')]
    #[Assert\Length(
        min: 10,
        minMessage: 'Le motif doit contenir au moins {{ limit }} caracteres.'
    )]
    private ?string $motifDemande = null;

    // Motif du rejet si le crédit est refusé
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $motifRejet = null;

    // Salaire mensuel du client, utile pour calcul de capacité de remboursement
    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    #[Assert\Positive(message: 'Le salaire doit etre superieur a 0.')]
    private ?string $salaireMensuel = null;

    // Type de contrat choisi pour le paiement du crédit
    #[ORM\Column(length: 40, enumType: TypeContrat::class, nullable: true)]
    private ?TypeContrat $typeContrat = null;

    // Date de prise du crédit si applicable
    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datePrise = null;

    // Date de debut de paiement mensuel
    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDebutPaiement = null; //\DateTimeInterface  type php

    // Date de creation de l'enregistrement
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    // Date de traitement du crédit (approbation/rejet)
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateTraitement = null;

    // Date de la derniere mise a jour
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateMaj = null;

    // Constructeur: initialise les dates de creation et de mise a jour
    public function __construct()
    {
        $this->dateCreation = new \DateTime();
        $this->dateMaj = new \DateTime();
    }

    // Valide les règles métier supplémentaires pour un crédit
    //  vérifier l'endettement et les motifs en cas de rejet
    #[Assert\Callback]
    public function validateCreditRules(ExecutionContextInterface $context): void
    {
        // Validation sur la capacité de paiement si toutes les données sont présentes
        if (
            $this->montant !== null &&
            $this->tauxInteret !== null &&
            $this->dureeEnMois !== null &&
            $this->salaireMensuel !== null
        ) {
            $this->calculatePayments();

            // Vérifie que la mensualité ne dépasse pas 33% du salaire
            if ($this->mensualite !== null && (float) $this->mensualite > ((float) $this->salaireMensuel * 0.33)) {
                $context->buildViolation('Votre salaire est insuffisant. La mensualite depasse 33% de votre salaire.') // creer msg atraver calback
                    ->atPath('salaireMensuel') //champ correcp
                    ->addViolation(); // execute , enregistre 
            }
        }

        // Si le crédit est rejeté, le motif de rejet doit être rempli
        if ($this->statut === CreditStatus::REJECTED && trim((string) $this->motifRejet) === '') {
            $context->buildViolation('Le motif du rejet est obligatoire.')
                ->atPath('motifRejet')
                ->addViolation();
        }
    }

    // Calcule la mensualité et le montant total du crédit
    //  mettre à jour les valeurs calculées chaque fois que les paramètres changent
    public function calculatePayments(): void
    {
        // Si les données ne sont pas toutes présentes, on ne calcule rien
        if ($this->montant === null || $this->tauxInteret === null || $this->dureeEnMois === null) {
            return;
        }

        $principal = (float) $this->montant; // capital emprunté
        $annualRate = (float) $this->tauxInteret; // taux annuel
        $months = $this->dureeEnMois; // durée en mois

        $monthlyRate = $annualRate / 100 / 12; // taux mensuel

        if ($monthlyRate > 0) {
            // Formule de calcul de mensualité pour un prêt amortissable
            $this->mensualite = number_format(
                $principal * $monthlyRate * pow(1 + $monthlyRate, $months) / (pow(1 + $monthlyRate, $months) - 1),
                2,
                '.',
                ''
            );
        } else {
            // Si le taux est à 0, on divise simplement le capital par les mois
            $this->mensualite = number_format($principal / $months, 2, '.', '');
        }

        // Montant total remboursé = mensualité * nombre de mois
        $this->montantTotal = number_format((float) $this->mensualite * $months, 2, '.', '');
    }

    // Callback Doctrine exécuté avant chaque mise à jour en base
    //: mettre à jour automatiquement la date de modification
    #[ORM\PreUpdate] // mertre ajouter date pour voir quante le dernier modification
    public function updateDateMaj(): void
    {
        $this->dateMaj = new \DateTime();
    }

    // ----- Getters et setters -----

    // Retourne l'identifiant du crédit
    public function getIdCredit(): ?int
    {
        return $this->idCredit;
    }

    // Retourne le client lié au crédit
    public function getClient(): ?Utilisateur
    {
        return $this->client;
    }

    // Définit le client associé
    public function setClient(?Utilisateur $client): static
    {
        $this->client = $client;
        return $this;
    }

    // Retourne l'agent qui a traité le crédit
    public function getAgent(): ?Utilisateur
    {
        return $this->agent;
    }

    // Définit l'agent associé
    public function setAgent(?Utilisateur $agent): static
    {
        $this->agent = $agent;
        return $this;
    }

    // Retourne le montant du crédit
    public function getMontant(): ?string
    {
        return $this->montant;
    }

    // Définit le montant du crédit
    public function setMontant(string $montant): static
    {
        $this->montant = $montant;
        return $this;
    }

    // Retourne le taux d'intérêt
    public function getTauxInteret(): ?string
    {
        return $this->tauxInteret;
    }

    // Définit le taux d'intérêt
    public function setTauxInteret(string $tauxInteret): static
    {
        $this->tauxInteret = $tauxInteret;
        return $this;
    }

    // Retourne la durée en mois
    public function getDureeEnMois(): ?int
    {
        return $this->dureeEnMois;
    }

    // Définit la durée en mois
    public function setDureeEnMois(int $dureeEnMois): static
    {
        $this->dureeEnMois = $dureeEnMois;
        return $this;
    }

    // Retourne la mensualité calculée
    public function getMensualite(): ?string
    {
        return $this->mensualite;
    }

    // Retourne le montant total remboursé
    public function getMontantTotal(): ?string
    {
        return $this->montantTotal;
    }

    // Retourne le statut du crédit
    public function getStatut(): CreditStatus
    {
        return $this->statut;
    }

    // Définit le statut du crédit
    public function setStatut(CreditStatus $statut): static
    {
        $this->statut = $statut;
        return $this;
    }

    // Retourne le motif de la demande
    public function getMotifDemande(): ?string
    {
        return $this->motifDemande;
    }

    // Définit le motif de la demande
    public function setMotifDemande(?string $motifDemande): static
    {
        $this->motifDemande = $motifDemande;
        return $this;
    }

    // Retourne le motif de rejet
    public function getMotifRejet(): ?string
    {
        return $this->motifRejet;
    }

    // Définit le motif de rejet
    public function setMotifRejet(?string $motifRejet): static
    {
        $this->motifRejet = $motifRejet;
        return $this;
    }

    // Retourne le salaire mensuel
    public function getSalaireMensuel(): ?string
    {
        return $this->salaireMensuel;
    }

    // Définit le salaire mensuel
    public function setSalaireMensuel(?string $salaireMensuel): static
    {
        $this->salaireMensuel = $salaireMensuel;
        return $this;
    }

    // Retourne le type de contrat
    public function getTypeContrat(): ?TypeContrat
    {
        return $this->typeContrat;
    }

    // Définit le type de contrat
    public function setTypeContrat(?TypeContrat $typeContrat): static
    {
        $this->typeContrat = $typeContrat;
        return $this;
    }

    // Retourne la date de prise du crédit
    public function getDatePrise(): ?\DateTimeInterface
    {
        return $this->datePrise;
    }

    // Définit la date de prise du crédit
    public function setDatePrise(?\DateTimeInterface $datePrise): static
    {
        $this->datePrise = $datePrise;
        return $this;
    }

    // Retourne la date de debut des paiements
    public function getDateDebutPaiement(): ?\DateTimeInterface
    {
        return $this->dateDebutPaiement;
    }

    // Définit la date de debut des paiements
    public function setDateDebutPaiement(?\DateTimeInterface $dateDebutPaiement): static
    {
        $this->dateDebutPaiement = $dateDebutPaiement;
        return $this;
    }

    // Retourne la date de creation du crédit
    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    // Retourne la date de traitement
    public function getDateTraitement(): ?\DateTimeInterface
    {
        return $this->dateTraitement;
    }

    // Définit la date de traitement
    public function setDateTraitement(?\DateTimeInterface $dateTraitement): static
    {
        $this->dateTraitement = $dateTraitement;
        return $this;
    }

    // Retourne la date de derniere mise à jour
    public function getDateMaj(): ?\DateTimeInterface
    {
        return $this->dateMaj;
    }

    // Calcule le coût total du crédit (intérêts payés)
    public function getCoutCredit(): float
    {
        return (float) $this->montantTotal - (float) $this->montant;
    }
}

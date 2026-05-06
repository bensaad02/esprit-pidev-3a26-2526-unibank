<?php

namespace App\Entity;

use App\Enum\TransactionType;
use App\Repository\TransactionBancaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity(repositoryClass: TransactionBancaireRepository::class)]
#[ORM\Table(name: 'transaction_bancaire')]
class TransactionBancaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idTransaction = null;

    #[ORM\ManyToOne(targetEntity: Compte::class, inversedBy: 'transactionsSortantes')]
    #[ORM\JoinColumn(name: 'id_compte_source', referencedColumnName: 'id_compte', nullable: false)]
    #[Assert\NotNull]
    private ?Compte $compteSource = null;

    #[ORM\ManyToOne(targetEntity: Compte::class, inversedBy: 'transactionsEntrantes')]
    #[ORM\JoinColumn(name: 'id_compte_destination', referencedColumnName: 'id_compte', nullable: true)]
    private ?Compte $compteDestination = null;

    #[ORM\Column(length: 20, enumType: TransactionType::class)]
    #[Assert\NotNull]
    private ?TransactionType $type = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    #[Assert\NotBlank(message: 'Le montant est obligatoire.')]
    #[Assert\Positive(message: 'Le montant doit etre positif.')]
    private ?string $montant = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    public function __construct()
    {
        $this->dateCreation = new \DateTime();
    }

    #[Assert\Callback]
    public function validateTransaction(ExecutionContextInterface $context): void
    {
        if ($this->type === TransactionType::VIREMENT && $this->compteDestination === null) {
            $context->buildViolation('Le numero de compte destinataire est obligatoire.')
                ->atPath('compteDestination')
                ->addViolation();
        }

        if (
            $this->type === TransactionType::VIREMENT &&
            $this->compteSource !== null &&
            $this->compteDestination !== null &&
            $this->compteSource->getIdCompte() === $this->compteDestination->getIdCompte()
        ) {
            $context->buildViolation('Impossible de faire un virement vers le meme compte.')
                ->atPath('compteDestination')
                ->addViolation();
        }
    }

    public function getIdTransaction(): ?int { return $this->idTransaction; }
    public function getCompteSource(): ?Compte { return $this->compteSource; }
    public function setCompteSource(?Compte $compteSource): static { $this->compteSource = $compteSource; return $this; }
    public function getCompteDestination(): ?Compte { return $this->compteDestination; }
    public function setCompteDestination(?Compte $compteDestination): static { $this->compteDestination = $compteDestination; return $this; }
    public function getType(): ?TransactionType { return $this->type; }
    public function setType(TransactionType $type): static { $this->type = $type; return $this; }
    public function getMontant(): ?string { return $this->montant; }
    public function setMontant(string $montant): static { $this->montant = $montant; return $this; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): static { $this->description = $description; return $this; }
    public function getDateCreation(): ?\DateTimeInterface { return $this->dateCreation; }
}

<?php

namespace App\Entity;

use App\Repository\TransactionCarteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionCarteRepository::class)]
class TransactionCarte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Carte::class, inversedBy: 'transactions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Carte $carte = null;

    #[ORM\Column]
    private float $montant;

    #[ORM\Column(length: 50)]
    private string $type;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $date;

    public function __construct()
    {
        $this->date = new \DateTime(); // 🔥 FIX date issue
    }

    // ===== GETTERS / SETTERS =====

    public function getId(): ?int { return $this->id; }

    public function getCarte(): ?Carte { return $this->carte; }
    public function setCarte(?Carte $carte): static { $this->carte = $carte; return $this; }

    public function getMontant(): float { return $this->montant; }
    public function setMontant(float $montant): static { $this->montant = $montant; return $this; }

    public function getType(): string { return $this->type; }
    public function setType(string $type): static { $this->type = $type; return $this; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): static { $this->description = $description; return $this; }

    public function getDate(): \DateTimeInterface { return $this->date; }
    public function setDate(\DateTimeInterface $date): static { $this->date = $date; return $this; }
}
<?php

namespace App\Entity;

use App\Repository\CarteSecurityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class CarteSecurity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // 🔗 relation with Carte
    #[ORM\OneToOne(inversedBy: 'security', targetEntity: Carte::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Carte $carte = null;

    #[ORM\Column(length: 10)]
    private ?string $pin = null;

    #[ORM\Column(length: 10)]
    private ?string $cvv = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    // getters + setters...
    public function getId(): ?int
{
    return $this->id;
}

// 🔗 CARTE
public function getCarte(): ?Carte
{
    return $this->carte;
}

public function setCarte(?Carte $carte): static
{
    $this->carte = $carte;
    return $this;
}

// 🔐 PIN
public function getPin(): ?string
{
    return $this->pin;
}

public function setPin(string $pin): static
{
    $this->pin = $pin;
    return $this;
}

// 🔐 CVV
public function getCvv(): ?string
{
    return $this->cvv;
}

public function setCvv(string $cvv): static
{
    $this->cvv = $cvv;
    return $this;
}

// 🕒 DATE
public function getCreatedAt(): ?\DateTimeImmutable
{
    return $this->createdAt;
}

public function setCreatedAt(?\DateTimeImmutable $createdAt): static
{
    $this->createdAt = $createdAt;
    return $this;
}
}
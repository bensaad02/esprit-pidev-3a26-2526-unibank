<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'app_session')]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idSession = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'id_utilisateur', nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(length: 500)]
    private ?string $token = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateExpiration = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $estActive = true;

    public function __construct()
    {
        $this->dateCreation = new \DateTime();
        $this->dateExpiration = (new \DateTime())->modify('+24 hours');
    }

    public function isExpired(): bool
    {
        return $this->dateExpiration < new \DateTime();
    }

    public function isValid(): bool
    {
        return $this->estActive && !$this->isExpired();
    }

    public function getIdSession(): ?int { return $this->idSession; }
    public function getUtilisateur(): ?Utilisateur { return $this->utilisateur; }
    public function setUtilisateur(?Utilisateur $utilisateur): static { $this->utilisateur = $utilisateur; return $this; }
    public function getToken(): ?string { return $this->token; }
    public function setToken(string $token): static { $this->token = $token; return $this; }
    public function getDateCreation(): ?\DateTimeInterface { return $this->dateCreation; }
    public function getDateExpiration(): ?\DateTimeInterface { return $this->dateExpiration; }
    public function setDateExpiration(\DateTimeInterface $dateExpiration): static { $this->dateExpiration = $dateExpiration; return $this; }
    public function isEstActive(): bool { return $this->estActive; }
    public function setEstActive(bool $estActive): static { $this->estActive = $estActive; return $this; }
}

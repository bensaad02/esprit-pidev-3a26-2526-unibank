<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'historique_connexion')]
class HistoriqueConnexion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idHistorique = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'id_utilisateur', nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $ipAddress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $deviceInfo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $browserInfo = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateConnexion = null;

    #[ORM\Column(length: 30)]
    private string $statut = 'SUCCESS';

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $raisonEchec = null;

    public function __construct()
    {
        $this->dateConnexion = new \DateTime();
    }

    public function getIdHistorique(): ?int { return $this->idHistorique; }
    public function getUtilisateur(): ?Utilisateur { return $this->utilisateur; }
    public function setUtilisateur(?Utilisateur $utilisateur): static { $this->utilisateur = $utilisateur; return $this; }
    public function getIpAddress(): ?string { return $this->ipAddress; }
    public function setIpAddress(?string $ipAddress): static { $this->ipAddress = $ipAddress; return $this; }
    public function getDeviceInfo(): ?string { return $this->deviceInfo; }
    public function setDeviceInfo(?string $deviceInfo): static { $this->deviceInfo = $deviceInfo; return $this; }
    public function getBrowserInfo(): ?string { return $this->browserInfo; }
    public function setBrowserInfo(?string $browserInfo): static { $this->browserInfo = $browserInfo; return $this; }
    public function getDateConnexion(): ?\DateTimeInterface { return $this->dateConnexion; }
    public function getStatut(): string { return $this->statut; }
    public function setStatut(string $statut): static { $this->statut = $statut; return $this; }
    public function getRaisonEchec(): ?string { return $this->raisonEchec; }
    public function setRaisonEchec(?string $raisonEchec): static { $this->raisonEchec = $raisonEchec; return $this; }
}

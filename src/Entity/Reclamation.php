<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'reclamation')]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le sujet est obligatoire.')]
    private ?string $sujet = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'La description est obligatoire.')]
    private ?string $description = null;

    #[ORM\Column(length: 30)]
    private string $statut = 'EN_ATTENTE';

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'reclamations')]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'id_utilisateur', nullable: false)]
    #[Assert\NotNull]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateReclamation = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $sentiment = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imagePath = null;

    #[ORM\OneToMany(targetEntity: Reponse::class, mappedBy: 'reclamation')]
    private Collection $reponses;

    public function __construct()
    {
        $this->dateReclamation = new \DateTime();
        $this->reponses = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }
    public function getSujet(): ?string { return $this->sujet; }
    public function setSujet(string $sujet): static { $this->sujet = $sujet; return $this; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(string $description): static { $this->description = $description; return $this; }
    public function getStatut(): string { return $this->statut; }
    public function setStatut(string $statut): static { $this->statut = $statut; return $this; }
    public function getUtilisateur(): ?Utilisateur { return $this->utilisateur; }
    public function setUtilisateur(?Utilisateur $utilisateur): static { $this->utilisateur = $utilisateur; return $this; }
    public function getDateReclamation(): ?\DateTimeInterface { return $this->dateReclamation; }
    public function getSentiment(): ?string { return $this->sentiment; }
    public function setSentiment(?string $sentiment): static { $this->sentiment = $sentiment; return $this; }
    public function getImagePath(): ?string { return $this->imagePath; }
    public function setImagePath(?string $imagePath): static { $this->imagePath = $imagePath; return $this; }
    public function getReponses(): Collection { return $this->reponses; }
}

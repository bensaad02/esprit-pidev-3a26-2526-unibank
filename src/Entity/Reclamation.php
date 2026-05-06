<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
#[ORM\Table(name: 'reclamation')]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private ?string $sujet = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 30)]
    private ?string $statut = null;

    #[ORM\Column(name: 'date_reclamation', type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $dateReclamation = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $sentiment = null;

    #[ORM\Column(name: 'image_path', length: 255, nullable: true)]
    private ?string $imagePath = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'id_utilisateur', nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reponse = null;

    #[ORM\Column(name: 'reponse_date', type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $reponseDate = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'reponse_par', referencedColumnName: 'id_utilisateur', nullable: true)]
    private ?Utilisateur $reponsePar = null;

    #[ORM\Column(name: 'date_traitement', type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateTraitement = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $token = null;

    // Relation OneToMany avec Reponse - CORRIGÉ avec orphanRemoval=true
    #[ORM\OneToMany(mappedBy: 'reclamation', targetEntity: Reponse::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $reponses;

    public function __construct()
    {
        $this->dateReclamation = new \DateTimeImmutable();
        $this->statut = 'en_attente';
        $this->reponses = new ArrayCollection();
    }

    // Getters et Setters
    public function getId(): int 
    { 
        return $this->id; 
    }

    public function getSujet(): ?string 
    { 
        return $this->sujet; 
    }
    
    public function setSujet(string $sujet): static 
    { 
        $this->sujet = $sujet; 
        return $this; 
    }

    public function getDescription(): ?string 
    { 
        return $this->description; 
    }
    
    public function setDescription(string $description): static 
    { 
        $this->description = $description; 
        return $this; 
    }

    public function getStatut(): ?string 
    { 
        return $this->statut; 
    }
    
    public function setStatut(string $statut): static 
    { 
        $this->statut = $statut; 
        return $this; 
    }

    public function getDateReclamation(): ?\DateTimeImmutable 
    { 
        return $this->dateReclamation; 
    }
    
    public function setDateReclamation(\DateTimeImmutable $dateReclamation): static 
    { 
        $this->dateReclamation = $dateReclamation; 
        return $this; 
    }

    public function getSentiment(): ?string 
    { 
        return $this->sentiment; 
    }
    
    public function setSentiment(?string $sentiment): static 
    { 
        $this->sentiment = $sentiment; 
        return $this; 
    }

    public function getImagePath(): ?string 
    { 
        return $this->imagePath; 
    }
    
    public function setImagePath(?string $imagePath): static 
    { 
        $this->imagePath = $imagePath; 
        return $this; 
    }

    public function getUtilisateur(): ?Utilisateur 
    { 
        return $this->utilisateur; 
    }
    
    public function setUtilisateur(?Utilisateur $utilisateur): static 
    { 
        $this->utilisateur = $utilisateur; 
        return $this; 
    }

    public function getReponse(): ?string 
    { 
        return $this->reponse; 
    }
    
    public function setReponse(?string $reponse): static 
    { 
        $this->reponse = $reponse; 
        return $this; 
    }

    public function getReponseDate(): ?\DateTimeImmutable 
    { 
        return $this->reponseDate; 
    }
    
    public function setReponseDate(?\DateTimeImmutable $reponseDate): static 
    { 
        $this->reponseDate = $reponseDate; 
        return $this; 
    }

    public function getReponsePar(): ?Utilisateur 
    { 
        return $this->reponsePar; 
    }
    
    public function setReponsePar(?Utilisateur $reponsePar): static 
    { 
        $this->reponsePar = $reponsePar; 
        return $this; 
    }

    public function getDateTraitement(): ?\DateTimeImmutable 
    { 
        return $this->dateTraitement; 
    }
    
    public function setDateTraitement(?\DateTimeImmutable $dateTraitement): static 
    { 
        $this->dateTraitement = $dateTraitement; 
        return $this; 
    }

    public function getType(): ?string 
    { 
        return $this->type; 
    }
    
    public function setType(string $type): static 
    { 
        $this->type = $type; 
        return $this; 
    }

    public function getToken(): ?string 
    { 
        return $this->token; 
    }

    public function setToken(?string $token): static 
    { 
        $this->token = $token; 
        return $this; 
    }

    /**
     * @return Collection|Reponse[]
     */
    public function getReponses(): Collection 
    { 
        return $this->reponses; 
    }

    public function addReponse(Reponse $reponse): static
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses->add($reponse);
            $reponse->setReclamation($this);
        }
        return $this;
    }

    public function removeReponse(Reponse $reponse): static
    {
        if ($this->reponses->removeElement($reponse)) {
            $reponse->setReclamation(null);
        }
        return $this;
    }
}
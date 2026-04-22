<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entité Reclamation
 * Représente une réclamation soumise par un client
 * 
 * Cette entité gère toutes les informations liées à une réclamation :
 * - Son contenu (sujet, description)
 * - Son état (statut, type, sentiment)
 * - Les dates importantes (création, réponse, traitement)
 * - Les relations (utilisateur, réponses)
 * - La preuve visuelle (image)
 */
#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
#[ORM\Table(name: 'reclamation')]
class Reclamation
{
    // ==========================================
    // PROPRIÉTÉS DE BASE
    // ==========================================

    /**
     * Identifiant unique de la réclamation
     * Généré automatiquement par la base de données
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * Sujet/titre de la réclamation
     * Description courte du problème (max 255 caractères)
     */
    #[ORM\Column(length: 255)]
    private ?string $sujet = null;

    /**
     * Description détaillée de la réclamation
     * Texte libre expliquant le problème rencontré
     */
    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * Statut actuel de la réclamation
     * Valeurs possibles : en_attente, en_cours, traite, rejete
     */
    #[ORM\Column(length: 30)]
    private ?string $statut = null;

    /**
     * Date de création de la réclamation
     * Horodatage au moment de la soumission
     */
    #[ORM\Column(name: 'date_reclamation', type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $dateReclamation = null;

    /**
     * Analyse de sentiment du texte
     * Valeurs possibles : positif, negatif, neutre
     * Utilisé pour prioriser les réclamations urgentes
     */
    #[ORM\Column(length: 50, nullable: true)]
    private ?string $sentiment = null;

    /**
     * Chemin vers l'image jointe (optionnelle)
     * Stockée dans le dossier public/uploads/reclamations/
     */
    #[ORM\Column(name: 'image_path', length: 255, nullable: true)]
    private ?string $imagePath = null;

    // ==========================================
    // RELATIONS
    // ==========================================

    /**
     * Utilisateur qui a soumis la réclamation
     * Relation ManyToOne : un utilisateur peut avoir plusieurs réclamations
     */
    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'id_utilisateur', nullable: false)]
    private ?Utilisateur $utilisateur = null;

    /**
     * Réponse de l'administrateur (champ texte direct)
     * Alternative à la collection de réponses pour une réponse simple
     * @deprecated Utiliser plutôt la collection $reponses pour l'historique
     */
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reponse = null;

    /**
     * Date de la réponse de l'administrateur
     */
    #[ORM\Column(name: 'reponse_date', type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $reponseDate = null;

    /**
     * Administrateur qui a répondu à la réclamation
     * Relation ManyToOne vers l'entité Utilisateur
     */
    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'reponse_par', referencedColumnName: 'id_utilisateur', nullable: true)]
    private ?Utilisateur $reponsePar = null;

    /**
     * Date de traitement final de la réclamation
     * Remplie automatiquement quand le statut passe à "traité"
     */
    #[ORM\Column(name: 'date_traitement', type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateTraitement = null;

    /**
     * Catégorie/type de la réclamation
     * Valeurs possibles : technique, compte, transaction, carte, credit, autre
     */
    #[ORM\Column(length: 50)]
    private ?string $type = null;

    /**
     * Collection des réponses associées à cette réclamation
     * Permet de suivre l'historique complet des échanges
     * Relation OneToMany : une réclamation peut avoir plusieurs réponses
     * 
     * @var Collection<int, Reponse>
     */
    #[ORM\OneToMany(mappedBy: 'reclamation', targetEntity: Reponse::class, cascade: ['persist', 'remove'])]
    private Collection $reponses;

    /**
     * Token unique pour l'accès sécurisé à la réclamation
     * Utilisé pour les liens de suivi sans authentification
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $token = null;

    // ==========================================
    // CONSTRUCTEUR
    // ==========================================

    /**
     * Constructeur - Initialise les valeurs par défaut
     * - Date de création : maintenant
     * - Statut initial : en_attente
     * - Collection de réponses : tableau vide
     */
    public function __construct()
    {
        $this->dateReclamation = new \DateTimeImmutable();
        $this->statut = 'en_attente';
        $this->reponses = new ArrayCollection();
    }

    // ==========================================
    // GETTERS ET SETTERS
    // ==========================================

    /**
     * Récupère l'ID de la réclamation
     */
    public function getId(): ?int 
    { 
        return $this->id; 
    }

    /**
     * Récupère le sujet de la réclamation
     */
    public function getSujet(): ?string 
    { 
        return $this->sujet; 
    }

    /**
     * Définit le sujet de la réclamation
     */
    public function setSujet(string $sujet): static 
    { 
        $this->sujet = $sujet; 
        return $this; 
    }

    /**
     * Récupère la description détaillée
     */
    public function getDescription(): ?string 
    { 
        return $this->description; 
    }

    /**
     * Définit la description détaillée
     */
    public function setDescription(string $description): static 
    { 
        $this->description = $description; 
        return $this; 
    }

    /**
     * Récupère le statut actuel
     */
    public function getStatut(): ?string 
    { 
        return $this->statut; 
    }

    /**
     * Définit le statut de la réclamation
     */
    public function setStatut(string $statut): static 
    { 
        $this->statut = $statut; 
        return $this; 
    }

    /**
     * Récupère la date de création
     */
    public function getDateReclamation(): ?\DateTimeImmutable 
    { 
        return $this->dateReclamation; 
    }

    /**
     * Définit la date de création
     */
    public function setDateReclamation(\DateTimeImmutable $dateReclamation): static 
    { 
        $this->dateReclamation = $dateReclamation; 
        return $this; 
    }

    /**
     * Récupère l'analyse de sentiment
     */
    public function getSentiment(): ?string 
    { 
        return $this->sentiment; 
    }

    /**
     * Définit l'analyse de sentiment
     */
    public function setSentiment(?string $sentiment): static 
    { 
        $this->sentiment = $sentiment; 
        return $this; 
    }

    /**
     * Récupère le chemin de l'image
     */
    public function getImagePath(): ?string 
    { 
        return $this->imagePath; 
    }

    /**
     * Définit le chemin de l'image
     */
    public function setImagePath(?string $imagePath): static 
    { 
        $this->imagePath = $imagePath; 
        return $this; 
    }

    /**
     * Récupère l'utilisateur associé
     */
    public function getUtilisateur(): ?Utilisateur 
    { 
        return $this->utilisateur; 
    }

    /**
     * Définit l'utilisateur associé
     */
    public function setUtilisateur(?Utilisateur $utilisateur): static 
    { 
        $this->utilisateur = $utilisateur; 
        return $this; 
    }

    /**
     * Récupère la réponse simple (déprécié)
     */
    public function getReponse(): ?string 
    { 
        return $this->reponse; 
    }

    /**
     * Définit la réponse simple
     */
    public function setReponse(?string $reponse): static 
    { 
        $this->reponse = $reponse; 
        return $this; 
    }

    /**
     * Récupère la date de réponse
     */
    public function getReponseDate(): ?\DateTimeImmutable 
    { 
        return $this->reponseDate; 
    }

    /**
     * Définit la date de réponse
     */
    public function setReponseDate(?\DateTimeImmutable $reponseDate): static 
    { 
        $this->reponseDate = $reponseDate; 
        return $this; 
    }

    /**
     * Récupère l'administrateur qui a répondu
     */
    public function getReponsePar(): ?Utilisateur 
    { 
        return $this->reponsePar; 
    }

    /**
     * Définit l'administrateur qui a répondu
     */
    public function setReponsePar(?Utilisateur $reponsePar): static 
    { 
        $this->reponsePar = $reponsePar; 
        return $this; 
    }

    /**
     * Récupère la date de traitement
     */
    public function getDateTraitement(): ?\DateTimeImmutable 
    { 
        return $this->dateTraitement; 
    }

    /**
     * Définit la date de traitement
     */
    public function setDateTraitement(?\DateTimeImmutable $dateTraitement): static 
    { 
        $this->dateTraitement = $dateTraitement; 
        return $this; 
    }

    /**
     * Récupère le type/catégorie de la réclamation
     */
    public function getType(): ?string 
    { 
        return $this->type; 
    }

    /**
     * Définit le type/catégorie de la réclamation
     */
    public function setType(string $type): static 
    { 
        $this->type = $type; 
        return $this; 
    }

    // ==========================================
    // GESTION DE LA COLLECTION DE RÉPONSES
    // ==========================================

    /**
     * Récupère la collection des réponses
     * 
     * @return Collection<int, Reponse>
     */
    public function getReponses(): Collection 
    { 
        return $this->reponses; 
    }

    /**
     * Ajoute une réponse à la réclamation
     * Établit également la relation bidirectionnelle
     * 
     * @param Reponse $reponse - La réponse à ajouter
     * @return static
     */
    public function addReponse(Reponse $reponse): static
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses->add($reponse);
            $reponse->setReclamation($this);
        }
        return $this;
    }

    /**
     * Supprime une réponse de la réclamation
     * Supprime également la relation bidirectionnelle
     * 
     * @param Reponse $reponse - La réponse à supprimer
     * @return static
     */
    public function removeReponse(Reponse $reponse): static
    {
        if ($this->reponses->removeElement($reponse)) {
            if ($reponse->getReclamation() === $this) {
                $reponse->setReclamation(null);
            }
        }
        return $this;
    }

    // ==========================================
    // GESTION DU TOKEN DE SUIVI
    // ==========================================

    /**
     * Récupère le token de suivi
     * Permet un accès sécurisé sans authentification
     * 
     * @return string|null
     */
    public function getToken(): ?string 
    { 
        return $this->token; 
    }

    /**
     * Définit le token de suivi
     * Généré lors de la création pour les liens de suivi
     * 
     * @param string $token
     * @return self
     */
    public function setToken(string $token): self 
    { 
        $this->token = $token; 
        return $this; 
    }
}
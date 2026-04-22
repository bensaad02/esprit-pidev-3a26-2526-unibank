<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[ORM\Table(name: 'reponse')]
class Reponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Reclamation::class, inversedBy: 'reponses')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    private ?Reclamation $reclamation = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Le contenu de la reponse est obligatoire.')]
    private ?string $contenu = null;

   #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
private ?\DateTimeImmutable $dateReponse = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank]
    private ?string $auteur = null;

    public function __construct()
    {
    $this->dateReponse = new \DateTimeImmutable(); // ✅ immutable
    }

    public function getId(): ?int { return $this->id; }
    public function getReclamation(): ?Reclamation { return $this->reclamation; }
    public function setReclamation(?Reclamation $reclamation): static { $this->reclamation = $reclamation; return $this; }
    public function getContenu(): ?string { return $this->contenu; }
    public function setContenu(string $contenu): static { $this->contenu = $contenu; return $this; }
    public function getAuteur(): ?string { return $this->auteur; }
    public function setAuteur(string $auteur): static { $this->auteur = $auteur; return $this; }



public function getDateReponse(): ?\DateTimeImmutable
{
    return $this->dateReponse;
}

public function setDateReponse(\DateTimeImmutable $dateReponse): static
{
    $this->dateReponse = $dateReponse;
    return $this;
}
    }

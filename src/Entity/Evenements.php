<?php

namespace App\Entity;

use App\Repository\EvenementsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementsRepository::class)]
class Evenements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column(length: 255)]
    private ?string $Ville = null;

    #[ORM\Column]
    private ?int $Invites = null;

    #[ORM\Column(length: 255)]
    private ?string $Destination = null;

    #[ORM\Column(length: 255)]
    private ?string $Prestation = null;

    #[ORM\Column]
    private ?int $Budget = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Precisions = null;

    #[ORM\Column]
    private ?bool $Confirmation = null;

    #[ORM\OneToOne(inversedBy: 'evenement', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateurs $utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getInvites(): ?int
    {
        return $this->Invites;
    }

    public function setInvites(int $Invites): self
    {
        $this->Invites = $Invites;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->Destination;
    }

    public function setDestination(string $Destination): self
    {
        $this->Destination = $Destination;

        return $this;
    }

    public function getPrestation(): ?string
    {
        return $this->Prestation;
    }

    public function setPrestation(string $Prestation): self
    {
        $this->Prestation = $Prestation;

        return $this;
    }

    public function getBudget(): ?int
    {
        return $this->Budget;
    }

    public function setBudget(int $Budget): self
    {
        $this->Budget = $Budget;

        return $this;
    }

    public function getPrecisions(): ?string
    {
        return $this->Precisions;
    }

    public function setPrecisions(string $Precisions): self
    {
        $this->Precisions = $Precisions;

        return $this;
    }

    public function isConfirmation(): ?bool
    {
        return $this->Confirmation;
    }

    public function setConfirmation(bool $Confirmation): self
    {
        $this->Confirmation = $Confirmation;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateurs
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(Utilisateurs $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}

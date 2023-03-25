<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column(length: 255)]
    private ?string $alt = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Auteur::class, mappedBy: 'Category')]
    private Collection $id_auteur;

    public function __construct()
    {
        $this->id_auteur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Auteur>
     */
    public function getIdAuteur(): Collection
    {
        return $this->id_auteur;
    }

    public function addIdAuteur(Auteur $idAuteur): self
    {
        if (!$this->id_auteur->contains($idAuteur)) {
            $this->id_auteur->add($idAuteur);
            $idAuteur->addCategory($this);
        }

        return $this;
    }

    public function removeIdAuteur(Auteur $idAuteur): self
    {
        if ($this->id_auteur->removeElement($idAuteur)) {
            $idAuteur->removeCategory($this);
        }

        return $this;
    }
}

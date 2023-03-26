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

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\ManyToMany(targetEntity: Editeur::class, mappedBy: 'category')]
    private Collection $id_editeur;

    public function __construct()
    {
        $this->id_auteur = new ArrayCollection();
        $this->panier = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->id_editeur = new ArrayCollection();
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

    /**
     * @return Collection<int, Panier>
     */
    public function getPanier(): Collection
    {
        return $this->panier;
    }

    public function addPanier(Panier $panier): self
    {
        if (!$this->panier->contains($panier)) {
            $this->panier->add($panier);
            $panier->addCategory($this);
        }

        return $this;
    }

    public function removePanier(Panier $panier): self
    {
        if ($this->panier->removeElement($panier)) {
            $panier->removeCategory($this);
        }

        return $this;
    }

    public function getIdEditeur(): ?Editeur
    {
        return $this->id_editeur;
    }

    public function setIdEditeur(?Editeur $id_editeur): self
    {
        $this->id_editeur = $id_editeur;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addCategory($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeCategory($this);
        }

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function addIdEditeur(Editeur $idEditeur): self
    {
        if (!$this->id_editeur->contains($idEditeur)) {
            $this->id_editeur->add($idEditeur);
            $idEditeur->addCategory($this);
        }

        return $this;
    }

    public function removeIdEditeur(Editeur $idEditeur): self
    {
        if ($this->id_editeur->removeElement($idEditeur)) {
            $idEditeur->removeCategory($this);
        }

        return $this;
    }
}

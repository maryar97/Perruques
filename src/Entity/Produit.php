<?php

namespace App\Entity;

use App\Entity\Fournisseur;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $rubriqueart = null;

    #[ORM\Column(length: 255)]
    private ?string $sousrubriqueart = null;

    #[ORM\Column(length: 255)]
    private ?string $libcourt = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $liblong = null;

    #[ORM\Column(length: 100)]
    private ?string $reffou = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $prixachat = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    

    

    #[ORM\ManyToOne(inversedBy: 'Produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fournisseur $fournisseur = null;

    #[ORM\ManyToOne(inversedBy: 'Produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie = null;

    #[ORM\OneToMany(mappedBy: 'Produit', targetEntity: Detailscommandes::class)]
    private Collection $detailscommandes;

    
    public function __construct()
    {
        $this->detailscommandes = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }
    

    public function getRubriqueart(): ?string
    {
        return $this->rubriqueart;
    }

    public function setRubriqueart(string $rubriqueart): self
    {
        $this->rubriqueart = $rubriqueart;

        return $this;
    }

    public function getSousrubriqueart(): ?string
    {
        return $this->sousrubriqueart;
    }

    public function setSousrubriqueart(string $sousrubriqueart): self
    {
        $this->sousrubriqueart = $sousrubriqueart;

        return $this;
    }

    public function getLibcourt(): ?string
    {
        return $this->libcourt;
    }

    public function setLibcourt(string $libcourt): self
    {
        $this->libcourt = $libcourt;

        return $this;
    }

    public function getLiblong(): ?string
    {
        return $this->liblong;
    }

    public function setLiblong(string $liblong): self
    {
        $this->liblong = $liblong;

        return $this;
    }

    public function getReffou(): ?string
    {
        return $this->reffou;
    }

    public function setReffou(string $reffou): self
    {
        $this->reffou = $reffou;

        return $this;
    }

    public function getPrixachat(): ?float
    {
        return $this->prixachat;
    }

    public function setPrixachat(float $prixachat): self
    {
        $this->prixachat = $prixachat;

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

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, Detailscommandes>
     */
    public function getDetailscommandes(): Collection
    {
        return $this->detailscommandes;
    }

    public function addDetailscommande(Detailscommandes $detailscommande): static
    {
        if (!$this->detailscommandes->contains($detailscommande)) {
            $this->detailscommandes->add($detailscommande);
            $detailscommande->setProduit($this);
        }

        return $this;
    }

    public function removeDetailscommande(Detailscommandes $detailscommande): static
    {
        if ($this->detailscommandes->removeElement($detailscommande)) {
            // set the owning side to null (unless already changed)
            if ($detailscommande->getProduit() === $this) {
                $detailscommande->setProduit(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Entity\Fournisseur;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

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
    #[Assert\NotBlank(message: 'Le nom du produit ne peut pas être vide')]
    private ?string $libcourt = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $liblong = null;

    #[ORM\Column(length: 100)]
    private ?string $reffou = null;

    
    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[Vich\UploadableField(mapping: 'produit_photo', fileNameProperty: 'photo')]
    private ?File $photoFille = null; 

    #[ORM\Column]
    private ?int $prixachat = null;

    #[ORM\Column(nullable: true)]
    private ?int $stock = null;
    

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

    

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPhotoFile(): ?File
    {
        return $this->photoFile;
    }

    public function setPhotoFile(?File $photoFile): void
    {
        $this->photoFILE = $photoFile;

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

    public function getPrixAchat(): ?int
    {
        return $this->prixachat;
    }

    public function setPrixAchat(int $prixachat): static
    {
        $this->prixachat = $prixachat;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    
}

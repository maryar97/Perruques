<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomfou = null;

    #[ORM\Column(length: 255)]
    private ?string $adrfou = null;

    #[ORM\Column(length: 100)]
    private ?string $postfou = null;

    #[ORM\Column(length: 255)]
    private ?string $villefou = null;

    #[ORM\Column(length: 100)]
    private ?string $mailfou = null;

    #[ORM\Column(length: 20)]
    private ?string $telfou = null;



    #[ORM\OneToMany(mappedBy: 'fournisseur', targetEntity: Produit::class)]
    private Collection $Produit;

    public function __construct()
    {
        $this->Produit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomfou(): ?string
    {
        return $this->nomfou;
    }

    public function setNomfou(string $nomfou): self
    {
        $this->nomfou = $nomfou;

        return $this;
    }

    public function getAdrfou(): ?string
    {
        return $this->adrfou;
    }

    public function setAdrfou(string $adrfou): self
    {
        $this->adrfou = $adrfou;

        return $this;
    }

    public function getPostfou(): ?string
    {
        return $this->postfou;
    }

    public function setPostfou(string $postfou): self
    {
        $this->postfou = $postfou;

        return $this;
    }

    public function getVillefou(): ?string
    {
        return $this->villefou;
    }

    public function setVillefou(string $villefou): self
    {
        $this->villefou = $villefou;

        return $this;
    }

    public function getMailfou(): ?string
    {
        return $this->mailfou;
    }

    public function setMailfou(string $mailfou): self
    {
        $this->mailfou = $mailfou;

        return $this;
    }

    public function getTelfou(): ?string
    {
        return $this->telfou;
    }

    public function setTelfou(string $telfou): self
    {
        $this->telfou = $telfou;

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */


    /**
     * @return Collection<int, Produits>
     */


    public function removeProduit(Produit $produit): self
    {
        if ($this->Produit->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getFournisseur() === $this) {
                $produit->setFournisseur(null);
            }
        }

        return $this;
    }
}

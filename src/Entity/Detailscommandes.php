<?php

namespace App\Entity;

use App\Repository\DetailscommandesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailscommandesRepository::class)]
class Detailscommandes
{

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column]
    private ?int $prixachat = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Commande::class, inversedBy: 'commandeDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private $Commande;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: 'commandeDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private $Produit;


    public function __construct()
    {
        $this->factures = new ArrayCollection();
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

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

    public function getCommande(): ?Commande
    {
        return $this->Commande;
    }

    public function setCommande(?Commande $Commande): static
    {
        $this->Commande = $Commande;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->Produit;
    }

    public function setProduit(?Produit $Produit): static
    {
        $this->Produit = $Produit;

        return $this;
    }



  
}

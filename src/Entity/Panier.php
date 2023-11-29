<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $prix_unite = null;

    #[ORM\Column]
    private ?int $panier_quantite = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $reduction = null;

    

    #[ORM\ManyToOne(inversedBy: 'paniers')]
    private ?Produit $panier_prod = null;

    #[ORM\ManyToOne(inversedBy: 'paniers')]
    private ?Commande $panier_com = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixUnite(): ?string
    {
        return $this->prix_unite;
    }

    public function setPrixUnite(string $prix_unite): static
    {
        $this->prix_unite = $prix_unite;

        return $this;
    }

    public function getPanierQuantite(): ?int
    {
        return $this->panier_quantite;
    }

    public function setPanierQuantite(int $panier_quantite): static
    {
        $this->panier_quantite = $panier_quantite;

        return $this;
    }

    public function getReduction(): ?string
    {
        return $this->reduction;
    }

    public function setReduction(string $reduction): static
    {
        $this->reduction = $reduction;

        return $this;
    }

    
    public function getPanierProd(): ?Produit
    {
        return $this->panier_prod;
    }

    public function setPanierProd(?Produit $panier_prod): static
    {
        $this->panier_prod = $panier_prod;

        return $this;
    }

    public function getPanierCom(): ?Commande
    {
        return $this->panier_com;
    }

    public function setPanierCom(?Commande $panier_com): static
    {
        $this->panier_com = $panier_com;

        return $this;
    }
}

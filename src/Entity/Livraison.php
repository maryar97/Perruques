<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $livrdate = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $livraisondescp = null;

    #[ORM\Column]
    private ?int $idUsers = null;

    #[ORM\Column(length: 100)]
    private ?string $modelivraison = null;

    #[ORM\OneToMany(mappedBy: 'Commande', targetEntity: Commande::class)]
    private Collection $commandes;

    #[ORM\OneToMany(mappedBy: 'livraison', targetEntity: Commande::class)]
    private Collection $Commande;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->Commande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLivrdate(): ?\DateTimeInterface
    {
        return $this->livrdate;
    }

    public function setLivrdate(\DateTimeInterface $livrdate): self
    {
        $this->livrdate = $livrdate;

        return $this;
    }

    public function getLivraisondescp(): ?string
    {
        return $this->livraisondescp;
    }

    public function setLivraisondescp(string $livraisondescp): self
    {
        $this->livraisondescp = $livraisondescp;

        return $this;
    }

    public function getIdUsers(): ?int
    {
        return $this->idUsers;
    }

    public function setIdUsers(int $idUsers): self
    {
        $this->idUsers = $idUsers;

        return $this;
    }

    public function getModelivraison(): ?string
    {
        return $this->modelivraison;
    }

    public function setModelivraison(string $modelivraison): self
    {
        $this->modelivraison = $modelivraison;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }


    /**
     * @return Collection<int, Commande>
     */
    public function getCommande(): Collection
    {
        return $this->Commande;
    }
}

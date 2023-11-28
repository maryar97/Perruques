<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $cli_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $cli_prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $cli_email = null;

    #[ORM\Column(length: 255)]
    private ?string $cli_telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_livraison = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_facturation = null;

    #[ORM\Column]
    private ?int $id_commande = null;

    #[ORM\Column(length: 255)]
    private ?string $produit = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'Utilisateur')]
    private ?Users $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'com_id')]
    private ?Commande $Commande = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'com_detail')]
    private ?self $RecapDetails = null;

    #[ORM\OneToMany(mappedBy: 'RecapDetails', targetEntity: self::class)]
    private Collection $com_detail;

    public function __construct()
    {
        $this->com_detail = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCliNom(): ?string
    {
        return $this->cli_nom;
    }

    public function setCliNom(string $cli_nom): static
    {
        $this->cli_nom = $cli_nom;

        return $this;
    }

    public function getCliPrenom(): ?string
    {
        return $this->cli_prenom;
    }

    public function setCliPrenom(string $cli_prenom): static
    {
        $this->cli_prenom = $cli_prenom;

        return $this;
    }

    public function getCliEmail(): ?string
    {
        return $this->cli_email;
    }

    public function setCliEmail(string $cli_email): static
    {
        $this->cli_email = $cli_email;

        return $this;
    }

    public function getCliTelephone(): ?string
    {
        return $this->cli_telephone;
    }

    public function setCliTelephone(string $cli_telephone): static
    {
        $this->cli_telephone = $cli_telephone;

        return $this;
    }

    public function getAdresseLivraison(): ?string
    {
        return $this->adresse_livraison;
    }

    public function setAdresseLivraison(string $adresse_livraison): static
    {
        $this->adresse_livraison = $adresse_livraison;

        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->adresse_facturation;
    }

    public function setAdresseFacturation(string $adresse_facturation): static
    {
        $this->adresse_facturation = $adresse_facturation;

        return $this;
    }

    public function getIdCommande(): ?int
    {
        return $this->id_commande;
    }

    public function setIdCommande(int $id_commande): static
    {
        $this->id_commande = $id_commande;

        return $this;
    }

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(string $produit): static
    {
        $this->produit = $produit;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
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

    public function getUtilisateur(): ?Users
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Users $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

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

    public function getRecapDetails(): ?self
    {
        return $this->RecapDetails;
    }

    public function setRecapDetails(?self $RecapDetails): static
    {
        $this->RecapDetails = $RecapDetails;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getComDetail(): Collection
    {
        return $this->com_detail;
    }

    public function addComDetail(self $comDetail): static
    {
        if (!$this->com_detail->contains($comDetail)) {
            $this->com_detail->add($comDetail);
            $comDetail->setRecapDetails($this);
        }

        return $this;
    }

    public function removeComDetail(self $comDetail): static
    {
        if ($this->com_detail->removeElement($comDetail)) {
            // set the owning side to null (unless already changed)
            if ($comDetail->getRecapDetails() === $this) {
                $comDetail->setRecapDetails(null);
            }
        }

        return $this;
    }

   
}

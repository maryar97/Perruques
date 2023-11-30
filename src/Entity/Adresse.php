<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AdresseRepository;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'adresses')]
    #[ORM\JoinColumn]
    private ?Users $users = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_codepostal = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_ville = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_pays = null;

    #[ORM\OneToMany(mappedBy: 'com_adr_livr', targetEntity: Commande::class)]
    private Collection $commandes;

    #[ORM\Column(length: 255)]
    private ?string $adr_email = null;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }



    public function __toString(): string
    {
        return $this->titre . '[-br]' . 
            $this->adresse . '-' . 
            $this->adr_ville . '-' . 
            $this->adr_pays;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): static
    {
        $this->users = $users;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAdrPrenom(): ?string
    {
        return $this->adr_prenom;
    }

    public function setAdrPrenom(string $adr_prenom): static
    {
        $this->adr_prenom = $adr_prenom;

        return $this;
    }

    public function getAdrNom(): ?string
    {
        return $this->adr_nom;
    }

    public function setAdrNom(string $adr_nom): static
    {
        $this->adr_nom = $adr_nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getAdrCodepostal(): ?string
    {
        return $this->adr_codepostal;
    }

    public function setAdrCodepostal(string $adr_codepostal): static
    {
        $this->adr_codepostal = $adr_codepostal;

        return $this;
    }

    public function getAdrVille(): ?string
    {
        return $this->adr_ville;
    }

    public function setAdrVille(string $adr_ville): static
    {
        $this->adr_ville = $adr_ville;

        return $this;
    }

    public function getAdrTelephone(): ?string
    {
        return $this->adr_telephone;
    }

    public function setAdrTelephone(string $adr_telephone): static
    {
        $this->adr_telephone = $adr_telephone;

        return $this;
    }

    public function getAdrPays(): ?string
    {
        return $this->adr_pays;
    }

    public function setAdrPays(string $adr_pays): static
    {
        $this->adr_pays = $adr_pays;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setComAdrLivr($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getComAdrLivr() === $this) {
                $commande->setComAdrLivr(null);
            }
        }

        return $this;
    }

    public function getAdrEmail(): ?string
    {
        return $this->adr_email;
    }

    public function setAdrEmail(string $adr_email): static
    {
        $this->adr_email = $adr_email;

        return $this;
    }

    
    


}

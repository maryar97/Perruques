<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $datecom = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $totalcom = null;

    

    #[ORM\Column]
    private ?int $idpaiement = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $datepaiement = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descppaiement = null;

    #[ORM\Column(length: 100)]
    private ?string $modepaiement = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $facturedate = null;

    #[ORM\Column]
    private ?float $facturetotalttc = null;

    #[ORM\Column]
    private ?float $facturetotaltva = null;

    #[ORM\Column]
    private ?float $facturetotalht = null;


    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?Users $Users = null; 

    #[ORM\OneToMany(mappedBy: 'Commande', targetEntity: Detailscommandes::class, orphanRemoval: true)]
    private Collection $detailscommandes;


    #[ORM\Column(length: 255)]
    private ?string $adrlivraison = null;

    #[ORM\Column(length: 255)]
    private ?string $adrfact = null;


    public function __construct()
    {
        $this->detailscommandes = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        
        return $this->id;
    }

    public function getDatecom(): ?\DateTimeImmutable
    {
        return $this->datecom;
    }

    public function setDatecom(\DateTimeImmutable $datecom): self
    {
        $this->datecom = $datecom;

        return $this;
    }

    public function getTotalcom(): ?string
    {
        return $this->totalcom;
    }

    public function setTotalcom(string $totalcom): self
    {
        $this->totalcom = $totalcom;

        return $this;
    }

    

    public function getIdpaiement(): ?int
    {
        return $this->idpaiement;
    }

    public function setIdpaiement(int $idpaiement): self
    {
        $this->idpaiement = $idpaiement;

        return $this;
    }

    public function getDatepaiement(): ?\DateTimeImmutable
    {
        return $this->datepaiement;
    }

    public function setDatepaiement(\DateTimeImmutable $datepaiement): self
    {
        $this->datepaiement = $datepaiement;

        return $this;
    }

    public function getDescppaiement(): ?string
    {
        return $this->descppaiement;
    }

    public function setDescppaiement(string $descppaiement): self
    {
        $this->descppaiement = $descppaiement;

        return $this;
    }

    public function getModepaiement(): ?string
    {
        return $this->modepaiement;
    }

    public function setModepaiement(string $modepaiement): self
    {
        $this->modepaiement = $modepaiement;

        return $this;
    }


    public function getFacturedate(): ?\DateTimeImmutable
    {
        return $this->facturedate;
    }

    public function setFacturedate(\DateTimeImmutable $facturedate): self
    {
        $this->facturedate = $facturedate;

        return $this;
    }

    public function getFacturetotalttc(): ?float
    {
        return $this->facturetotalttc;
    }

    public function setFacturetotalttc(float $facturetotalttc): self
    {
        $this->facturetotalttc = $facturetotalttc;

        return $this;
    }

    public function getFacturetotaltva(): ?float
    {
        return $this->facturetotaltva;
    }

    public function setFacturetotaltva(float $facturetotaltva): self
    {
        $this->facturetotaltva = $facturetotaltva;

        return $this;
    }

    public function getFacturetotalht(): ?float
    {
        return $this->facturetotalht;
    }

    public function setFacturetotalht(float $facturetotalht): self
    {
        $this->facturetotalht = $facturetotalht;

        return $this;
    }


    public function getUsers(): ?Users
    {
        return $this->Users;
    }

    public function setUsers(?Users $Users): self
    {
        $this->Users = $Users;

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
            $detailscommande->setCommande($this);
        }

        return $this;
    }

    public function removeDetailscommande(Detailscommandes $detailscommande): static
    {
        if ($this->detailscommandes->removeElement($detailscommande)) {
            // set the owning side to null (unless already changed)
            if ($detailscommande->getCommande() === $this) {
                $detailscommande->setCommande(null);
            }
        }

        return $this;
    }

    

    public function getAdrlivraison(): ?string
    {
        return $this->adrlivraison;
    }

    public function setAdrlivraison(string $adrlivraison): static
    {
        $this->adrlivraison = $adrlivraison;

        return $this;
    }

    public function getAdrfact(): ?string
    {
        return $this->adrfact;
    }

    public function setAdrfact(string $adrfact): static
    {
        $this->adrfact = $adrfact;

        return $this;
    }
}

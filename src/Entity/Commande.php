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


    #[ORM\Column(length: 255)]
    private ?string $transporteurNom = null;

    #[ORM\Column]
    private ?float $transporteurPrix = null;

    #[ORM\Column(length: 255)]
    private ?string $livraison = null;

    #[ORM\Column]
    private ?bool $isPaid = null;

    #[ORM\Column(length: 255)]
    private ?string $methode = null;

    #[ORM\Column(length: 255)]
    private ?string $reference = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $stripeSessionId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $paypalCommandeId = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $CreateAt = null;

    #[ORM\OneToMany(mappedBy: 'Commande', targetEntity: RecapDetails::class)]
    private Collection $recapDetails;


    #[ORM\Column(length: 255)]
    private ?string $adr_fact = null;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $date_fact = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?Users $com_users = null;

    #[ORM\Column(nullable: true)]
    private ?int $com_fact_id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $facture_total_ttc = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $facture_total_ht = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $facture_tva = null;


    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?Adresse $com_adr_livr = null;

    #[ORM\OneToMany(mappedBy: 'panier_com', targetEntity: Panier::class)]
    private Collection $paniers;




    public function __construct()
    {
        $this->recapDetails = new ArrayCollection();
        $this->paniers = new ArrayCollection();
    }




    public function getId(): ?int
    {
        
        return $this->id;
    }
    



    public function getTransporteurNom(): ?string
    {
        return $this->transporteurNom;
    }

    public function setTransporteurNom(string $transporteurNom): static
    {
        $this->transporteurNom = $transporteurNom;

        return $this;
    }

    public function getTransporteurPrix(): ?float
    {
        return $this->transporteurPrix;
    }

    public function setTransporteurPrix(float $transporteurPrix): static
    {
        $this->transporteurPrix = $transporteurPrix;

        return $this;
    }

    public function getLivraison(): ?string
    {
        return $this->livraison;
    }

    public function setLivraison(string $livraison): static
    {
        $this->livraison = $livraison;

        return $this;
    }

    public function isIsPaid(): ?bool
    {
        return $this->isPaid;
    }

    public function setIsPaid(bool $isPaid): static
    {
        $this->isPaid = $isPaid;

        return $this;
    }

    public function getMethode(): ?string
    {
        return $this->methode;
    }

    public function setMethode(string $methode): static
    {
        $this->methode = $methode;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getStripeSessionId(): ?string
    {
        return $this->stripeSessionId;
    }

    public function setStripeSessionId(?string $stripeSessionId): static
    {
        $this->stripeSessionId = $stripeSessionId;

        return $this;
    }

    public function getPaypalCommandeId(): ?string
    {
        return $this->paypalCommandeId;
    }

    public function setPaypalCommandeId(?string $paypalCommandeId): static
    {
        $this->paypalCommandeId = $paypalCommandeId;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->CreateAt;
    }

    public function setCreateAt(\DateTimeImmutable $CreateAt): static
    {
        $this->CreateAt = $CreateAt;

        return $this;
    }

    /**
     * @return Collection<int, RecapDetails>
     */
    public function getRecapDetails(): Collection
    {
        return $this->recapDetails;
    }

    public function addRecapDetail(RecapDetails $recapDetail): static
    {
        if (!$this->recapDetails->contains($recapDetail)) {
            $this->recapDetails->add($recapDetail);
            $recapDetail->setCommande($this);
        }

        return $this;
    }

    public function removeRecapDetail(RecapDetails $recapDetail): static
    {
        if ($this->recapDetails->removeElement($recapDetail)) {
            // set the owning side to null (unless already changed)
            if ($recapDetail->getCommande() === $this) {
                $recapDetail->setCommande(null);
            }
        }

        return $this;
    }



    public function getAdrFact(): ?string
    {
        return $this->adr_fact;
    }

    public function setAdrFact(string $adr_fact): static
    {
        $this->adr_fact = $adr_fact;

        return $this;
    }

    public function getDateFact(): ?\DateTimeImmutable
    {
        return $this->date_fact;
    }

    public function setDateFact(\DateTimeImmutable $date_fact): static
    {
        $this->date_fact = $date_fact;

        return $this;
    }

    public function getComUsers(): ?Users
    {
        return $this->com_users;
    }

    public function setComUsers(?Users $com_users): static
    {
        $this->com_users = $com_users;

        return $this;
    }

    public function getComFactId(): ?int
    {
        return $this->com_fact_id;
    }

    public function setComFactId(int $com_fact_id): static
    {
        $this->com_fact_id = $com_fact_id;

        return $this;
    }

    public function getFactureTotalTtc(): ?string
    {
        return $this->facture_total_ttc;
    }

    public function setFactureTotalTtc(?string $facture_total_ttc): static
    {
        $this->facture_total_ttc = $facture_total_ttc;

        return $this;
    }

    public function getFactureTotalHt(): ?string
    {
        return $this->facture_total_ht;
    }

    public function setFactureTotalHt(?string $facture_total_ht): static
    {
        $this->facture_total_ht = $facture_total_ht;

        return $this;
    }

    public function getFactureTva(): ?string
    {
        return $this->facture_tva;
    }

    public function setFactureTva(?string $facture_tva): static
    {
        $this->facture_tva = $facture_tva;

        return $this;
    }


    public function getComAdrLivr(): ?Adresse
    {
        return $this->com_adr_livr;
    }

    public function setComAdrLivr(?Adresse $com_adr_livr): static
    {
        $this->com_adr_livr = $com_adr_livr;

        return $this;
    }

    /**
     * @return Collection<int, panier>
     */
    public function getPanier(): Collection
    {
        return $this->paniers;
    }

    public function addPanier(panier $panier): static
    {
        if (!$this->paniers->contains($panier)) {
            $this->paniers->add($panier);
            $panier->setPanierCom($this);
        }

        return $this;
    }

    public function removePanier(panier $panier): static
    {
        if ($this->paniers->removeElement($panier)) {
            // set the owning side to null (unless already changed)
            if ($panier->getPanierCom() === $this) {
                $panier->setPanierCom(null);
            }
        }

        return $this;
    }








}

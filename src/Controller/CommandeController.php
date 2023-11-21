<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Commande;
use App\Entity\Detailscommandes;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function index(SessionInterface $session, ProduitRepository $produitRepository, EntityManagerInterface $em): Response
    {
        $panier = $session->get("panier", []);
        $nbr=0;
        $pht=0;


        $commande = new Commande();
        $commande->setDateCom(new DateTimeImmutable());
        $commande->setUsers($this->getUser());
        $commande->setDatepaiement(new DateTimeImmutable());
        $commande->setDescppaiement('description du paiement ');
        $commande->setModepaiement('mode paiement');
        $commande->setfacturedate(new DateTimeImmutable());
        $commande->setAdrlivraison($this->getUser()->getAdresse());
        $commande->setAdrfact($this->getUser()->getAdresse());
        $commande->setIdpaiement(1);




        foreach ($panier as $id => $quantite) {
            $nbr = $nbr + 1 + $quantite;
           
            $detailscommandes = new Detailscommandes();
            $detailscommandes->setCommande($commande);
            $produit = $produitRepository->find($id);
            $detailscommandes->setPrixAchat($produit->getPrixachat());
            $pht = $pht + ($produit->getPrixachat()*$quantite);
            $pttc = $pht*1.2;
            $detailscommandes->setProduit($produit);
            $detailscommandes->setQuantite($quantite);
            $em->persist($detailscommandes);

        }
        $commande->setTotalcom($nbr);
        $commande->setFacturetotalttc($pttc);
       $commande->setFacturetotaltva(0.2);
       $commande->setFacturetotalht($pht);
        $em->persist($commande);

        $em->flush();


        return $this->redirectToRoute("profile_index");
    }
}
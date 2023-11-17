<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\DetailsCommandes;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

 

#[Route('/commande', name: 'app_commande_')]
class CommandeController extends AbstractController
{

    #[Route('/ajout', name: 'add')]
    public function add(SessionInterface $session, ProduitRepository $produitRepository, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $panier = $session->get('panier', []); 

        if($panier ===[]){
            $this->addFlash('message', 'Votre panier est vide');
            return $this->redirectToRoute('app_accueil');
        }

        // Le panier n'est pas vide, on crée la commande
        $commande = new Commande(); 

        // On remplit la commande 
        $commande->setUsers($this->getUser());
        $commande->setReference(uniqid()); 
        $commande->setTotalcom($this->getTotalcom()); 
        $commande->setDescpcom(Descpcom());
        $commande->setIdpaiement($this->uniqid()); 
        $commande->setDatepaiement($this->getDatepaiement()); 
        $commande->setDescppaiement($this->getDescppaiement()); 
        $commande->setModepaiement($this->getmodepaiement());  
        $commande->setIdfacture($this->uniqid());  
        $commande->setFacturedate($this->getFacturedate());  
        $commande->setFacturetotalttc($this->getFacturetotalttc()); 
        $commande->setFacturetotaltva($this->getFacturetotaltva()); 
        $commande->setFacturetotalht($this->getFacturetotalht());
        $commande->setLivraison($this->getLivraison());


        // On parcours le panier pour créer les détails de commande
        foreach($panier as $item => $quantite){
            $Detailscommandes = new DetailsCommandes(); 

            // On va chercher le poduit 

            $produit = $produitRepository->find($item); 
            
            $prixachat = $produit->getPrixAchat();

            // ON crée le détail de commande 

            $Detailscommandes->setProduit($produit);
            $Detailscommandes->setPrixAchat($prixachat);
            $Detailscommandes->setQuantite($quantite);

            $commande->addDetailCommandes($Detailscommandes);
        }

        // On persiste et on flush
        $em->persist($commande);
        $em->flush();

     
      return $this->render('commande/index.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    }
}

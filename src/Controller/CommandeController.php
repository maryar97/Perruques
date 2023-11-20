<?php

namespace App\Controller;

use App\Entite\Commande;
use App\Entite\DetailsCommandes;
use App\Repository\ProduitRepository;
use App\Controller\CommandeController;
use Doctrine\ORM\EntityManagerInterface;
use Semfone\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

 

#[Route('/commande', name: 'app_commande_')]

class CommandeController extends AbstractController
{     
    #[Route('/', name: 'index')]
    public function index(SessionInterface $session, ProduitRepository $produitsRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $panier = $session->get('panier', []); 

        if($panier ===[]){
            $this->addFlash('message', 'Votre panier est vide');
            return $this->redirectToRoute('app_accueil');
        }

        $form = $this->createForm(OrderType::class,data: null,options: [
            "user" => $this->getUser()
        ]);

        $userData=$this->getUser();

        // On initialise des variables
        $data = [];
        $Facturetotalttc= 0;
        $soustotal = 0;
        $fdp = 6;
        $Facturetotaltva = 0; 

        if ($this->isGranted('ROLE_ADMIN')) {

            $tva = 20; // TVA rate (20%)
        } elseif ($this->isGranted('ROLE_COMMERCIAL')) {
            
            $tva = 20; 
        
        } elseif ($this->isGranted('ROLE_COMMERCE')) {
            
            $tva = 0; 
        
        }
        
        elseif ($this->isGranted('ROLE_USER')) {
            
            $tva = 20; 
        
        } else  {
            
            $tva = 0;
        }

        foreach($panier as $id => $quantite){
            $produit = $produitRepository->find($id);
            

            $data[] = [
                'produit' => $produit,
                'quantite' => $quantite,
                
            ];
            //dd($data);
            $soustotal += $produit->getPrixAchat() * $quantite;
            
            }

            $Facturetotaltva += round($soustotal+($soustotal*$tva/100),2);



           

            if($Facturetotaltva>100) {
                $Facturetotalttc =$Facturetotaltva+0; 
            }
            else {
            $Facturetotalttc =$Facturetotaltva+$fdp ;
            
        }

        // return $this->render('commande/index.html.twig', compact('data', 'soustotal', 'total','userData', 'fdp','form'));
        return $this->render('commande/index.html.twig', [
            'form' => $form->createView(), 
            'data' => $data,
            'soustotal' => $soustotal,
            'Facturetotaltva' => $Facturetotaltva,
            'Facturetotalttc' => $Faturetotalttc,
            'userData' => $userData,
            'fdp' => $fdp,
            'tva'=> $tva,
            
        ]);
        

        }

    #[Route('/ajout', name: 'add', methods: ['GET', 'POST'])]

    public function add(SessionInterface $session, ProduitRepository $produitRepository, EntityManagerInterface $em, Request $request): Response
    {
       $this->deneAccessUnlessGranted('ROLE_USER');

       $panier=$session->get('panier', []);
       $data = [];
       $Facturetotalttc= 0;
       $soustotal = 0;
       $fdp = 6;
       $Facturetotaltva = 0;
      

        if ($this->isGranted('ROLE_ADMIN')) {

        $tva = 20; // TVA rate (20%)
        } elseif ($this->isGranted('ROLE_COMMERCIAL')) {
        
        $tva = 20; 

        } elseif ($this->isGranted('ROLE_COMMERCE')) {
        
        $tva = 0; 

        }

        elseif ($this->isGranted('ROLE_USER')) {
        
        $tva = 20; 

        } else  {
        
        $tva = 0;
        }

       foreach($panier as $id => $quantite){
           $produit = $produitRepository->find($id);
           

            $data[] = [
               'produit' => $produit,
               'quantite' => $quantite,
               
           ];
           //dd($data);
           $soustotal += $produit->getPrixAchat() * $quantite;
           
           }

           $Facturetotaltva +=round( $soustotal+($soustotal*$tva/100),2);



          

           if($Facturetotaltva>100) {
               $total =$Facturetotaltva+0; 
           }
           else {
           $total =$Facturetotaltva+$fdp ;
            
            }

            if($panier=== []){
                $this->addFlash('message', 'votre panier est vide');
            return  $this->redirectToRoute('app_accueil');
            }
            
            $form = $this->createForm(OrderType::class,data: null,options: [
                "user" => $this->getUser()
            ]);


            if ($form->isSubmitted() && $form->isValid()) {
                $Livraison = $form->get('livraison')->getData();
                $Facturetotalttc = $Facturetotalttc;
                $Descpcom = $form->get('description')->getData();
                $Idpaiement = $form->get('id paiement')->getData();
                $Datepaiement->set('date paiement');
                $Descppaiement = $form->get('description paiement')->getData();
                $Modepaiement->set('stripe');
                $Modepaiement = $commande->getModepaiement();
                $Idfacture->set('id facture')->getData();
                $Facturedate->set('date facture')->getData();
                //$fdp->set('livraison')->getData()->gePrix();
                

            // Le panier n'est pas vide, on crée la commande
            $commande = new Commande(); 

            // On remplit la commande 
            $commande->setUsers($this->getUser());
            $commande->setReference(uniqid()); 
            //$commande->setDatecom(new datetime());
            $commande->setDescpcom('description');
            // $commande->setIdpaiement('id paiement')
            // $commande->setDatepaiement('date paiement')
            // $commande->setDescppaiement('description paiement')
            $commande->setModepaiement('stripe');
            // $commande->setIdfacture('id facture')
            // $commande->setFacturedate('date');
            $commande->setLivraison(str_replace("[-br]", " ",$Livraison));

            // On parcours le panier pour créer les détails de commande
            foreach($panier as $item => $quantite){
            $Detailscommandes = new DetailsCommandes(); 

                // On va chercher le poduit 
                $produit = $produitRepositore->find($item); 
                $prixachat = $produit->getPrixAchat();

            // ON crée le détail de commande 
            // ON crée le détail de commande 

                // ON crée le détail de commande 

                $Detailscommandes->setProduit($produit);
                $Detailscommandes->setPrixAchat($prixachat);
                $Detailscommandes->setQuantite($quantite);

                $commande->addDetailCommandes($Detailscommandes);
            }

            // On persiste et on flush
            $em->persist($commande);
            $em->flush();
            $id= $commande->getId();

        
        return $this->render('commande/index.html.twig', [
                'controller_name' => 'CommandeController',
            ]);
        }

        $session->remove('panier');

        return $this->render('commande/recap.html.twig',compact('Facturetotalttc','fdp','soustotal','id','data','tva','Facturetotaltva'));


    }
}
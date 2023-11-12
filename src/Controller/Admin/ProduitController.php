<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use App\Form\ProduitsFormType;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/admin/produit', name: 'admin_produit_')]
class ProduitController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/produit/index.html.twig');
    }

    #[Route('/ajout', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
            $this->denyAccessUnlessGranted('ROLE_ADMIN');

            // On vrée un "nouveau produit" 
            $produit = new Produit(); 
   


        // On crée le formulaire
        $produitForm = $this->createForm(ProduitsFormType::class, $produit);

        // On traite la requete du formulaire 
        $produitForm->handleRequest($request);

        // On verifie si le formulaire est soumis ET valide 
       // if($produitFrom->isSubmitted() && $produitForm->isValid()){


        //}


        //return $this->render('admin/produit/add.html.twig', [ 
        //'produitForm' => $produitForm->createView()
        //]);
        // ceci est exatement pareil que le return qui suit;
  
        return $this->renderForm('admin/produit/add.html.twig', compact('produitForm')); 

    }


    #[Route('/edition/{id}', name: 'edit')]
    public function edit(ProduitRepository $produitRepository): Response
    {
        // on verifie si l'utilisation peut editer avec le voter 
        $this->denyAccessUnlessGranted('ROLE_ADMIN', $produitRepository);
        return $this->render('admin/produit/index.html.twig');
    }

    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(ProduitRepository $produitRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', $produitRepository);
        return $this->render('admin/produit/index.html.twig');
    }
}

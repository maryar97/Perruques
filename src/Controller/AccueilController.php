<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\ProduitRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index( CategorieRepository $categorieRepository , ProduitRepository $produitRepository): Response
    { 
                return $this->render('accueil/index.html.twig', [
            'categories'=>$categorieRepository->findAll(),
            
            
        ]);
    }

    #[Route('/souscategorie/{categorie}', name: 'app_souscategorie')]
    public function souscategorie(Categorie $categorie): Response
    { 
        //dd($categorie);
        return $this->render('accueil/souscategorie.html.twig', [
            'categorie'=>$categorie,
            
        ]);
    }


    
    

}
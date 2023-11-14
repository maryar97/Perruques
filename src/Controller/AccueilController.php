<?php

namespace App\Controller;

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

}
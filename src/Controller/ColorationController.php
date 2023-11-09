<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ColorationController extends AbstractController
{
    #[Route('/coloration', name: 'app_coloration')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produit=$produitRepository->findBy(['categorie'=>1]);

        return $this->render('coloration/index.html.twig', [
            'produits'=>$produit, 
        ]);
    }
}

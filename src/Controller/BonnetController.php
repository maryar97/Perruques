<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BonnetController extends AbstractController
{
    #[Route('/bonnet', name: 'app_bonnet')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produit=$produitRepository->findBy(['categorie'=>1]);
        return $this->render('bonnet/index.html.twig', [
            'produits'=>$produit, 
        ]);
    }
}

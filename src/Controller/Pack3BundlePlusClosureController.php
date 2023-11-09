<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Pack3BundlePlusClosureController extends AbstractController
{
    #[Route('/pack3/bundle/plus/closure', name: 'app_pack3_bundle_plus_closure')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produit=$produitRepository->findBy(['categorie'=>3]);

        return $this->render('pack3_bundle_plus_closure/index.html.twig', [
            'produits'=>$produit, 
        ]);
    }
}

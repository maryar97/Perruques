<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Pack3BundleController extends AbstractController
{
    #[Route('/pack3/bundle', name: 'app_pack3_bundle')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produit=$produitRepository->findBy(['categorie'=>3]);

        return $this->render('pack3_bundle/index.html.twig', [
            'produits'=>$produit, 
        ]);
    }
}

<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PerruquesFrangeController extends AbstractController
{
    #[Route('/perruques/frange', name: 'app_perruques_frange')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produit=$produitRepository->findBy(['categorie'=>2]);
        return $this->render('perruques_frange/index.html.twig', [
            'produits'=>$produit, 
            
        ]);
    }
}

<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Perruques360°Controller extends AbstractController
{
    #[Route('/perruques360/', name: 'app_perruques360_')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produit=$produitRepository->findBy(['categorie'=>2]);

        return $this->render('perruques360°/index.html.twig', [
            'produits'=>$produit, 
        ]);
    }
}

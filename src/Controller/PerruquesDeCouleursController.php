<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PerruquesDeCouleursController extends AbstractController
{
    #[Route('/perruques/de/couleurs', name: 'app_perruques_de_couleurs')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produit=$produitRepository->findBy(['categorie'=>2]);

        return $this->render('perruques_de_couleurs/index.html.twig', [
            'produits'=>$produit, 
        ]);
    }
}

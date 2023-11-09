<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PerruquesSansColleController extends AbstractController
{
    #[Route('/perruques/sans/colle', name: 'app_perruques_sans_colle')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produit=$produitRepository->findBy(['categorie'=>2]);

        return $this->render('perruques_sans_colle/index.html.twig', [
            'produits'=>$produit, 
        ]);
    }
}

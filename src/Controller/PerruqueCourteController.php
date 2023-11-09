<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PerruqueCourteController extends AbstractController
{
    #[Route('/perruque/courte', name: 'app_perruque_courte')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produit=$produitRepository->findBy(['categorie'=>2]);

        return $this->render('perruque_courte/index.html.twig', [
            'produits'=>$produit, 
        ]);
    }
}

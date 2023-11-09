<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarréPlongeantController extends AbstractController
{
    #[Route('/carr/plongeant', name: 'app_carr_plongeant')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produit=$produitRepository->findBy(['categorie'=>2]);

        return $this->render('carréplongeant/index.html.twig', [
            'produits'=>$produit, 
        ]);
    }
}

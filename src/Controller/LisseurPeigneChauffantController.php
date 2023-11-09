<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LisseurPeigneChauffantController extends AbstractController
{
    #[Route('/lisseur/peigne/chauffant', name: 'app_lisseur_peigne_chauffant')]
    public function index(ProduitRepository $produitRepository): Response
    {
        $produit=$produitRepository->findBy(['categorie'=>1]);

        return $this->render('lisseur_peigne_chauffant/index.html.twig', [
            'produits'=>$produit, 
        ]);
    }
}

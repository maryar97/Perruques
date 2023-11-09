<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/produits', name: 'produits_')]
class ProduitsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('produits/index.html.twig');
    }
    #[Route('/sousrubriqueart/{id}', name: 'details')]
    public function details(Produit $produit, $id): Response
    {
        return $this->render('produits/details.html.twig', compact('produit'));

    }
} 


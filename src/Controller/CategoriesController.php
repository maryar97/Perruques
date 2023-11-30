<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Repository\ProduitRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/categorie')]

class CategoriesController extends AbstractController

{
    #[Route('/{sousrubriqueart}/{id}', name: 'list')]
    public function list(Categorie $categorie, CategorieRepository $categorieRepository, ProduitRepository $produitRepository, Produit $produit, $id): Response
    {
        return $this->render('categories/list.html.twig', [
            'categories' => $categorieRepository->findAll($categorie->getId()),
            'categorie' => $categorie,
            'produits' => $produit,
            'produits' => $produitRepository->findBy(['categorie'=>$id]),

        ]);
    }

}



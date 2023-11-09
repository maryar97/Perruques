<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoriesController extends AbstractController
{
    #[Route('/sousrubriqueart/{id}', name: 'list')]
    public function list ( CategorieRepository $categorieRepository,ProduitRepository $produitRepository,$id): Response
    {
        $produit = $produitRepository->findBy(['categorie'=>$id]);
            $categorie=$categorieRepository->findOneBy(['id'=>$id]);
        return $this->render('categories/list.html.twig',[
            'produits'=>$produit, 
            'categorie'=>$categorie
        ]);
    }
}




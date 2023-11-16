<?php

namespace App\Controller\Admin;

use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/admin/categorie', name: 'admin_categorie_')]
class CategorieController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(CategorieRepository $categorieRepository): Response
    {

        return $this->render('admin/categorie/index.html.twig', [
            'categories' =>$categorieRepository->findAll(),
        ]);

    }
}


// #[Route('/produit/crud')]
// class ProduitCrudController extends AbstractController
// {
//     #[Route('/', name: 'app_produit_crud_index', methods: ['GET'])]
//     public function index(ProduitRepository $produitRepository): Response
//     {
//         return $this->render('produit_crud/index.html.twig', [
//             'produits' => $produitRepository->findAll(),
//         ]);
//     }
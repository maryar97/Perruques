<?php

namespace App\Controller\Admin;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/admin/produit', name: 'admin_produit_')]
class ProduitController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
{
    return $this->render('admin/produit/index.html.twig');
}

#[Route('/ajout', name: 'add')]
public function add(): Response
{
    $this->denyAccessUnlessGranted('ROLE_ADMIN');
    return $this->render('admin/produit/index.html.twig');
}


#[Route('/edition/{id}', name: 'edit')]
public function edit(ProduitRepository $produitRepository): Response
{
    // on verifie si l'utilisation peut editer avec le voter 
    $this->denyAccessUnlessGranted('ROLE_ADMIN', $produitRepository);
    return $this->render('admin/produit/index.html.twig');
}

#[Route('/suppression/{id}', name: 'delete')]
public function delete(ProduitRepository $produitRepository): Response
{
    $this->denyAccessUnlessGranted('ROLE_ADMIN', $produitRepository);
    return $this->render('admin/produit/index.html.twig');
}
}

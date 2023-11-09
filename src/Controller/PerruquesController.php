<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PerruquesController extends AbstractController
{
    #[Route('/perruques', name: 'app_perruques')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        $categorie=$categorieRepository->findBy(['id' => 2]);

        return $this->render('perruques/index.html.twig', [
            'categories'=>$categorie,
        ]);
    }
}

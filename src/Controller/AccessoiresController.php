<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccessoiresController extends AbstractController
{
    #[Route('/accessoires', name: 'app_accessoires')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        $categorie=$categorieRepository->findBy(['id' => 1]);

        return $this->render('accessoires/index.html.twig', [
            'categories'=>$categorie,
        ]);
    }
}

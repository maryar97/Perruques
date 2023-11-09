<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TissagesBrésilienController extends AbstractController
{
    #[Route('/tissages/br/silien', name: 'app_tissages_br_silien')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        $categorie=$categorieRepository->findBy(['id' => 3]);

        return $this->render('tissages_brésilien/index.html.twig', [
            'categories'=>$categorie,
        ]);
    }
}

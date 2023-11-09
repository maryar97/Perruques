<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SoinsCapillairesController extends AbstractController
{
    #[Route('/soins/capillaires', name: 'app_soins_capillaires')]
    public function index(): Response
    {
        return $this->render('soins_capillaires/index.html.twig', [
            'controller_name' => 'SoinsCapillairesController',
        ]);
    }
}

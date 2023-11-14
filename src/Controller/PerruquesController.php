<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PerruquesController extends AbstractController
{
    #[Route('/perruques', name: 'app_perruques')]
    public function index(): Response
    {
        return $this->render('perruques/index.html.twig', [
            'controller_name' => 'PerruquesController',
        ]);
    }
}

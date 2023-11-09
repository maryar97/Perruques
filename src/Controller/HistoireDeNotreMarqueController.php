<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoireDeNotreMarqueController extends AbstractController
{
    #[Route('/histoire/de/notre/marque', name: 'app_histoire_de_notre_marque')]
    public function index(): Response
    {
        return $this->render('histoire_de_notre_marque/index.html.twig', [
            'controller_name' => 'HistoireDeNotreMarqueController',
        ]);
    }
}

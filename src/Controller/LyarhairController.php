<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LyarhairController extends AbstractController
{
    #[Route('/lyarhair', name: 'app_lyarhair')]
    public function index(): Response
    {
        return $this->render('lyarhair/index.html.twig', [
            'controller_name' => 'LyarhairController',
        ]);
    }
}

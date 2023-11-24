<?php

namespace App\Controller;

use App\Form\OrderType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    #[Route('/order/create', name: 'order_index')]
    public function index(): Response
    {

        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }


        $form = $this->createForm(OrderType::class, data: null,options: [
            'user' => $this->getUser()
        ]);
        
        return $this->render('order/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

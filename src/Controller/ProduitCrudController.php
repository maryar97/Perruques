<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/produit/crud')]
class ProduitCrudController extends AbstractController
{
    #[Route('/', name: 'app_produit_crud_index', methods: ['GET'])]
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('produit_crud/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }

    #[Route('/nouveau', name: 'app_produit_crud_nouveau', methods: ['GET', 'POST'])]
    public function nouveau(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On récupère les images
            $produit = $form->getData();
            //dd($produit);

            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('app_produit_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produit_crud/nouveau.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

    #[Route('/afficher/{id}', name: 'app_produit_crud_afficher', methods: ['GET'])]
    public function afficher(Produit $produit): Response
    {
        return $this->render('produit_crud/afficher.html.twig', [
            'produit' => $produit,
        ]);
    }

    #[Route('/detail/{id}', name: 'app_produit_crud_detail', methods: ['GET'])]
    public function detail(Produit $produit, Categorie $categorie): Response
    {
        return $this->render('produit_crud/detail.html.twig', [ 
            'produit' => $produit,
            'categorie'=>$categorie,
            'produits' => $produit,


        ]);
    }

    #[Route('/modifier/{id}', name: 'app_produit_crud_modifier', methods: ['GET', 'POST'])]
    public function modifier(Request $request, Produit $produit, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_produit_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produit_crud/modifier.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

    #[Route('/supprimer/{id}', name: 'app_produit_crud_supprimer', methods: ['POST'])]
    public function supprimer(Request $request, Produit $produit, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if ($this->isCsrfTokenValid('supprimer'.$produit->getId(), $request->request->get('_token'))) {
            //dd($produit);
            $entityManager->remove($produit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_produit_crud_index', [], Response::HTTP_SEE_OTHER);
    }
    
}

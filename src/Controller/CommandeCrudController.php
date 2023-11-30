<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Form\Commande1Type;
use App\Service\CartService;
use App\Repository\AdresseRepository;
use App\Repository\CommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/commande/crud')]
class CommandeCrudController extends AbstractController
{
    #[Route('/', name: 'app_commande_crud_index', methods: ['GET'])]
    public function index(CommandeRepository $commandeRepository): Response
    {
        return $this->render('commande_crud/index.html.twig', [
            'commandes' => $commandeRepository->findAll(),
        ]);
    }

    #[Route('/mesCommandes', name: 'app_commande_mon_index', methods: ['GET'])]
    public function monIndex(CommandeRepository $commandeRepository,CartService $cartService): Response
    {
        
        return $this->render('commande_crud/mycommande.html.twig', [
            'commandes' => $commandeRepository->findBy(['com_users' => $this->getUser()]),
        
        ]);
    }

    
    #[Route('/facture/{id}', name: 'app_commande_facture', methods: ['GET'])]
    public function facture(CommandeRepository $commandeRepository, $id, AdresseRepository $adresseRepository): Response
    {
        $adrFactId = $commandeRepository->findOneBy(['com_fact_id' => $id])->getComFactId();
        $comId = $commandeRepository->findOneBy(['com_fact_id' => $id])->getId();
        $createAt = $commandeRepository->findOneBy(['com_fact_id' => $id])->getCreateAt();
        $dateFact = $commandeRepository->findOneBy(['com_fact_id' => $id])->getCreateAt();
        $adrLivrID = $commandeRepository->findOneBy(['com_fact_id' => $id])->getComAdrLivr()->getId();
        $adrLivr = $adresseRepository->findOneBy(['id' => $adrLivrID]);
        $adrFact = $adresseRepository->findOneBy(['id' => $adrFactId]);
        $usersId = $commandeRepository->findOneBy(['com_fact_id' => $id])->getComUsers()->getId();
        $factId = $commandeRepository->findOneBy(['com_fact_id' => $id])->getComFactId();

        
        return $this->render('commande_crud/facture.html.twig', [
            'adrFactId' => $adrFactId,
            'comId' => $comId,
            'createAt' => $createAt,
            'dateFact' => $dateFact,
            'adrLivr' => $adrLivr,
            'adrFact' => $adrFact,
            'usersId' => $usersId,
            'factId' => $factId,
            


            'commandes' => $commandeRepository->findBy(['com_users' => $this->getUser()]),

        ]);
    }



    #[Route('/new', name: 'app_commande_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commande = new Commande();
        $form = $this->createForm(Commande1Type::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commande);
            $entityManager->flush();

            return $this->redirectToRoute('app_commande_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('commande_crud/new.html.twig', [
            'commande' => $commande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commande_crud_show', methods: ['GET'])]
    public function show(Commande $commande): Response
    {
        return $this->render('commande_crud/show.html.twig', [
            'commande' => $commande,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_commande_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Commande $commande, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Commande2Type::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_commande_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('commande_crud/edit.html.twig', [
            'commande' => $commande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_commande_crud_delete', methods: ['POST'])]
    public function delete(Request $request, Commande $commande, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commande->getId(), $request->request->get('_token'))) {
            $entityManager->remove($commande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_commande_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
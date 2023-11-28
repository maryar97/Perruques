<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Form\Commande2Type;
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

    #[Route('/mesCommande', name: 'app_commande_mon_index', methods: ['GET'])]
    public function monIndex(CommandeRepository $commandeRepository,CartService $cartService): Response
    {
        
        return $this->render('commande_crud/my_commande.html.twig', [
            'commandes' => $commandeRepository->findBy(['com_users' => $this->getUser()]),
        
        ]);
    }

    #[Route('/mesCommande/{id}', name: 'app_my_commande_crud_show', methods: ['GET'])]
    public function showDetailCommande(Commande $commande, CommandeRepository $commandeRepository, AdresseRepository $adresseRepository, $id): Response
    {
        $livraisonId = $commandeRepository->findOneBy(['com_facture_id' => $id])->getLivraison();
        $adrFactId = $commandeRepository->findOneBy(['com_facture_id' => $id])->getAdrFact();
        $livraison = $adresseRepository->findOneBy(['id' => $livraisonId]);
        $adrFact = $adresseRepository->findOneBy(['id' => $adrFactId]);
        //dd($adrLiv);
        $comId = $commandeRepository->findOneBy(['com_facture_id' => $id])->getId();
        $usersId = $commandeRepository->findOneBy(['com_facture_id' => $id])->getComUsers()->getId();
        $facId = $commandeRepository->findOneBy(['com_facture_id' => $id])->getComFactId();
        $createAt = $commandeRepository->findOneBy(['com_facture_id' => $id])->getCreateAt();
        $dateFact = $commandeRepository->findOneBy(['com_facture_id' => $id])->getDateFact();
          // $y = $commandeRepository->myCommandeByCom($id);
        //    $y = $commandeRepository->totalPrixCom($id);
          // dd($commandeRepository->myCommandeByCom($id));
        // $t = $commandeRepository->myCommande();
        //$x = $adresseRepository->findBy(['adr_uti' => $utiId]);
        //dd($adresseRepository->findBy(['adr_uti' => $utiId]));
        // dd($commandeRepository->myCommandeByCom($id)[0]['c_adLiv']);
        return $this->render('commande_crud/facture.html.twig', [
            //'commande' => $commande,
            'comId' => $comId,
            'usersId' => $usersId,
            'livraison' => $livraison,
            'adrFact' => $adrFact,
        //    'nom' => $commandeRepository->myCommandeByCom($id)[0]['nom'],
        //     'prenom' => $commandeRepository->myCommandeByCom($id)[0]['prenom'],
            //  'adresse' => $commandeRepository->myCommandeByCom($id)[0]['c_adLiv'],
            //  'adresseFac' => $commandeRepository->myCommandeByCom($id)[0]['c_adFac'],
            //  'tel' => $commandeRepository->myCommandeByCom($id)[0]['user_tel'],
            'email' => $commandeRepository->myCommandeByCom($id)[0]['user_email'],
        //     'adresse' => $commandeRepository->myCommandeByCom($id)[0]['c_adLiv'],
            'facId' => $facId,
            'createAt' => $createAt,
            'dateFact' => $dateFact,
            'commandes' => $commandeRepository->myCommandeByCom($id),
        ]);
    }

    #[Route('/new', name: 'app_commande_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commande = new Commande();
        $form = $this->createForm(Commande2Type::class, $commande);
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

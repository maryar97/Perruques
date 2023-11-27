<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Service\CartService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    private RequestStack $requestStack; 


    #[Route('/mon-panier', name: 'cart_index')]
    public function index(CartService $cartService, RequestStack $requestStack): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $pht=0;
        $fdp=10;
        $pttc=0;
        $total=0;
        $Facturetotaltva=20;
        $total1=0;
    

        // dd($cartService->getTotal());

        return $this->render('Cart/index.html.twig', [
            'cart' =>$cartService->getTotal(),
            'total' => $total,
            'Facturetotaltva' => $Facturetotaltva,
            'pttc' => $pttc, 
            'fdp' => $fdp,
            'pht' => $pht,
            'total1'=> $total1

        ]);
    }





    #[Route('/mon-panier/add/{id}', name: 'cart_add')]
    public function addToRoute(CartService $cartService, int $id ): Response
    {

        $cartService->addToCart($id);
        return $this->redirectToRoute('cart_index');
    }



    #[Route('/mon-panier/remove/{id}', name: 'cart_remove')]
    public function removeToCart(CartService $cartService, int $id ): Response
    {
        $cartService->removeToCart($id);

        return $this->redirectToRoute('cart_index');
    }

    #[Route('/mon-panier/decrease/{id}', name: 'cart_decrease')]
    public function decrease(CartService $cartService, int $id ): RedirectResponse
    {
        $cartService->decrease($id);

        return $this->redirectToRoute('cart_index');
    }




    #[Route('/mon-panier/removeAll', name: 'cart_removeAll')]
    public function removeAll(CartService $cartService ): Response
    {
        $cartService->revoveCartAll();

        return $this->redirectToRoute('cart_index');
    } 
}










// #[Route('/mon-panier', name: 'cart_index')]
// class CartController extends AbstractController
// {

//     #[Route('/', name: 'index')]

//     public function index(SessionInterface $session, ProduitRepository $produitRepository)
//     {
//         $panier = $session->get('panier', []);

//         // On  initialise des variables
//         $data = []; 
//         $total = 0; 

//         foreach($panier as $id => $quantite){
//             $produit = $produitRepository->find($id);

//             $data[] = [
//                 'produit' => $produit, 
//                 'quantite' => $quantite
//             ];
//             $total += $produit->getPrixAchat() * $quantite; 
//         }
//         return $this->render('Cart/index.html.twig', compact('data', 'total'));

//     }


//     #[Route('/add/{id}', name: 'add')]
//     public function add(Produit $produit, SessionInterface $session)
//     {

//         // On récupère l'id du produit 
//         $id = $produit->getId(); 

//         // On récupère le panier existant
//         $panier = $session->get('panier', []); 
     
//         // ON ajoute le produit dans le panier s'il n'y est pas encore 
//         //Sinon on incrémente sa quantité
//         if(empty($panier[$id])){
//             $panier[$id] = 1;
//         }else{
//             $panier[$id]++;
//         }
        
        

//         $session->set('panier', $panier );

//         // On redirige vers la page du panier
//         return $this->redirectToRoute('cart_index');
//     }


//     #[Route('/remove/{id}', name: 'remove')]
//     public function remove(Produit $produit, SessionInterface $session)
//     {

//         // On récupère l'id du produit 
//         $id = $produit->getId(); 

//         // On récupère le panier existant
//         $panier = $session->get('panier', []); 
     
//         // ON retirer le produit du panier s'il n'y a qu'un exemplaire 
//         //Sinon on décrémente sa quantité
//         if(!empty($panier[$id])){
//             if($panier[$id] > 1){
//                 $panier[$id]--;
//             }else{
//                 unset($panier[$id]);
//             }
//         }
        
        

//         $session->set('panier', $panier );

//         // On redirige vers la page du panier
//         return $this->redirectToRoute('cart_index');
//     }



//     #[Route('/delete/{id}', name: 'delete')]
//     public function delete(Produit $produit, SessionInterface $session)
//     {

//         // On récupère l'id du produit 
//         $id = $produit->getId(); 

//         // On récupère le panier existant
//         $panier = $session->get('panier', []); 

//         if(!empty($panier[$id])){
            
//                 unset($panier[$id]);
//         }
        
        

//         $session->set('panier', $panier );

//         // On redirige vers la page du panier
//         return $this->redirectToRoute('cart_index');
//     }

//     #[Route('/empty', name: 'empty')]
//     public function empty(SessionInterface $session)
//     {
//         $session->remove('panier');

//         return $this->redirectToRoute('cart_index');

//     }
// }



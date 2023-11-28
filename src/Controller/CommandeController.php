<?php


namespace App\Controller;
use App\Entity\Commande;
use App\Form\CommandeType;
use App\Entity\RecapDetails;
use App\Service\CartService;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CommandeController extends AbstractController
{
    private EntityManagerInterface $em;
    
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em ;
    
    }
    #[Route('/order/create', name: 'order_create')]
    public function index(CartService $cartService): Response
    {

        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }
    


        $form = $this->createForm(CommandeType::class, data: null,options: [
            'user' => $this->getUser()
        ]);
        
        return $this->render('commande/index.html.twig', [
            'form' => $form->createView(),
            'recapCart' => $cartService->getTotal()
        ]);
    }
    #[Route('/order/verify', name: 'order_prepare', methods: ['POST'])]
    public function prepareOrder(SessionInterface $session, CartService $cartService, Request $request): Response
    {
        if(!$this->getUser()){

            return $this->redirectToRoute('app_login');
                    }

        $form = $this->createForm(CommandeType::class, data: null,options: [
            'user' =>$this->getUser()
        ]);
        $total=0;
        $fdp=10;
        $pttc=0;
        $total1=0; 
        $Facturetotaltva = 20; 

        $form->handleRequest($request);

        IF($form->isSubmitted() && $form->isValid()){
            $datetimeimmutable = new \DateTimeImmutable( 'now');
            $transporteur = $form->get('transporteur')->getData();
            $livraison = $form->get('adresse')->getData();
            $livraisonForCommande = $livraison->getPrenom().' '.$livraison->getNom();
            $livraisonForCommande .= '</br>' . $livraison->getTelephone();
            $livraisonForCommande .= '</br>' . $livraison->getAdresse();
            $livraisonForCommande .= '</br>' . $livraison->getCodepostal() . '-' . $livraison->getVille();
            $livraisonForCommande .= '</br>' . $livraison->getPays();
            $total1 = $pttc + $fdp; 
            $pttc = $total1 * 1.2 ;
            // dd($livraisonForCommande);
            $commande = new Commande();
            $reference = $datetimeimmutable->format('dmy').'-'.uniqid(); 
            $commande->setComUsers($this->getUser());
            $commande->setReference($reference);
            $commande->setCreateAt($datetimeimmutable);
            $commande->setLivraison($livraisonForCommande);
            $commande->setTransporteurNom($transporteur->getNom());
            $commande->setTransporteurPrix($transporteur->getPrix());
            $commande->setIsPaid('bool');
            $commande->setMethode('stripe'); 
            $commande->setAdrFact($livraisonForCommande); 
            $commande->setDateFact($datetimeimmutable);
            $this->em->persist($commande);
                        // dd($commande); 


            foreach($cartService->getTotal() as $produit)
            {
                // dd($produit);
                $recapDetails = new RecapDetails();
                $recapDetails->setCommande($commande);  
                $recapDetails->setQuantite($produit['quantite']); 
                $recapDetails->setPrixAchat($produit['produit']->getPrixachat()); 
                $recapDetails->setProduit($produit['produit']->getSousrubriqueart());
                $recapDetails->setTotalRecap($produit['produit']->getPrixAchat() * $produit['quantite']
            );
                $this->em->persist($recapDetails);
            }

            $this->em->flush();

            // dd($form->getData()); 
            return $this->render('commande/recap.html.twig', [
                'Facturetotaltva' => $Facturetotaltva,
                'total1' => $total1,
                'fdp' => $fdp, 
                'pttc' => $pttc,
                'total' => $total,
                'methode' => $commande->getMethode(),
                'recapCart' => $cartService->getTotal(),
                'transporteur' => $transporteur,
                'livraison' => $livraisonForCommande, 
                'reference' => $commande->getReference()
        ]);

        }

        return $this->redirectToRoute('cart_index');

    }
}

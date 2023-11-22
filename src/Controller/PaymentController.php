<?php

namespace App\Controller;

use Stripe\Stripe;
use App\Entity\Produit;
use App\Entity\Commande;
use App\Entity\Detailscommandes;
use App\Entity\Facture;
use Doctrine\ORM\EntityManagerInterface;
use Proxies\__CG__\App\Entity\Produit as EntityProduit;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PaymentController extends AbstractController
{
    private EntityManagerInterface $em;
    private UrlGeneratorInterface $generator;

    public function __construct(EntityManagerInterface $em, UrlGeneratorInterface $generator)
    {
        $this->em = $em;
        $this->generator = $generator;
    }

    #[Route('/order/create-session-stripe/{id}', name: 'payment_stripe',methods: ['POST'])]
    //il s'agit ici de l'id de la commande en cours qui nous sert aussi de référence
    public function stripeCheckout($id): RedirectResponse
    {
        $produitStripe = [];
        //recupére la commande en cours
      $order = $this->em->getRepository(Commande::class)->findOneBy(['id' => $id]);
     //si commande est introuvable ou n'existe pas
     if(!$order){
        return $this->redirectToRoute('cart_index');
     }
     $pttc= 0;
        $total = 0;
        $fdp = 10;
        $Facturetotaltva = 0;


     foreach ($order->getDetailscommandes()->getValues() as $produit) {
        //pour recup le nom du produit
        $produitData = $this->em->getRepository(Produit::class)->findOneBy(['id' => $produit->getProduit()]);
        //les information demandée par stripe
        $produitStripe[] = [
            'price_data' => [
                'currency' => 'eur',
                'unit_amount' => $produit->getPrixachat() * 100,
                'produit_data' => [
                    'name' => $produitData->getSousrubriqueart()
                ]
                ],
                'quantite' => $produit->getQuantite()
            ];

        
        $pttc += $pttc+ $produit->getPrixachat() * $produit->getQuantite();

     }

     // Calculate TVA based on user's role
 if ($this->isGranted('ROLE_USER')) {
    $tva =20 ;
} else {
    $tva = 20;
}

// Calculate total including TVA
$Facturetotaltva +=round( $pttc+($pttc*$Facturetotaltva/100),2);
// Add TVA as a separate line item in the stripe checkout
$produitStripe[] = [
    'price_data' => [
        'currency' => 'eur',
        'unit_amount' => round(($pttc*$Facturetotaltva/100),2) * 100,
        'produit_data' => [
            'name' => 'Facturetotaltva'
        ]
    ],
    'quantite' => 1,
];
  // dd($totaltva);
     if($Facturetotaltva>100) {
        //$total =$totaltva+0; 
        $produitStripe[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => 0,
                    'produit_data' => [
                        'name' => 'fdp'
                    ]
                    ],
                    'quantite' => 1,
                ];
    }
    else {
        $produitStripe[] = [
            'price_data' => [
                'currency' => 'eur',
                'unit_amount' => 10*100,
                'produit_data' => [
                    'name' => 'fdp'
                ]
                ],
                'quantite' => 1,
            ];
    
}
 

    Stripe::setApiKey('sk_test_51O9QyeJcB7aIs6zZrucNH3s5gBlnUgquUXkR0KmrRdBGd3lVjWdp2jRc1OzsLGoj5LA5y1DISPIdT8pADgrT0DKX00qdskr1kk');


$checkout_session = \Stripe\Checkout\Session::create([
    'customer_email' => $this->getUser()->getEmail(),
    'payment_method_types' => ['card'],
    'line_items' => [[
        $produitStripe
    ]],
    'mode' => 'payment',
    'success_url' => $this->generator->generate('payment_success', [
      'id' => $order->getId()
    ],UrlGeneratorInterface::ABSOLUTE_URL),
    'cancel_url' => $this->generator->generate('payment_error', [
      'id' => $order->getId()
    ],UrlGeneratorInterface::ABSOLUTE_URL),
    
  ]);
  
      // $order->setComStripeSessionId($checkout_session->id);
      // $this->em->flush();
      return new RedirectResponse($checkout_session->url);
  
  
      }

    #[Route('/order/success/{id}', name: 'payment_success')]
    public function StripeSuccess(EntityManagerInterface $em,$id): Response{
        // $order = $this->em->getRepository(Commande::class)->findOneBy(['id' => $id]);
        // $order2 = $this->em->getRepository(CommandeDetail::class)->findOneBy(['id' => $id]);
        // $order3 = $this->em->getRepository(EntityProduit::class)->findOneBy(['id' => $id]);
        // //$order->setComIsPaid(true);
        // $facture=new Facture();
        // $facture->setCliNom($this->getUser()->getNom());
        // $facture->setCliPrenom($this->getUser()->getPrenom());
        // $facture->setCliEmail($this->getUser()->getEmail());
        // $facture->setCliTelephone($this->getUser()->getTelephone());
        // $facture->setAdresseLivraison($order->getAdresse());
        // $facture->setAdresseFacturation($order->getAdresseFact());
        // $facture->setProduit($order3->getNom());
        // $facture->setPrix($order3->getPrix());
        // $facture->setQuantite($order2->getQuantite());
        // // $facture->setComId($order->getId());
        
        // // $facture->setComDetail($order2->getId());

        // $facture->setIdCommande($order->getId());
       
        //  $em->persist($order2);
        //  $em->persist($order3);
        // $em->persist($facture);
        // $em->flush();
        //return $this->render('order/succes.html.twig');
        return $this->render('commande/success.html.twig');
    }

    #[Route('/order/error/{id}', name: 'payment_error')]
    public function StripeError($id): Response{
        //return $this->render('order/error.html.twig');
        return $this->render('commande/error.html.twig');
    }


}
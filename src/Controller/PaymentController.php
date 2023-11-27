<?php

namespace App\Controller;

use Stripe\Stripe;
use App\Entity\Produit;
use App\Entity\Commande;
use App\Service\CartService;
use Stripe\Checkout\Session;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PaymentController extends AbstractController
{
    private EntityManagerInterface $em;
    private UrlGeneratorInterface $generator;


    public function __construct(EntityManagerInterface $em, UrlGeneratorInterface $generator)
    {
        $this->em = $em;
        $this->generator = $generator;


    }

    #[Route('/order/create-session-stripe/{reference}', name: 'payment_stripe')]
    public function stripeCheckout($reference): RedirectResponse
    {

        $produitStripe = []; 
        $total=0;

        $commande = $this->em->getRepository(Commande::class)->findOneBy(['reference' => $reference]);

        if(!$commande){
            return $this->redirectToRoute('cart_index');
        }
        

        foreach($commande->getRecapDetails()->getValues() as $produit){
            
            $pttc=0;
            $total1=0; 
            $Facturetotaltva = 20;  

            $produitData = $this->em->getRepository(Produit::class)->findOneBy(['sousrubriqueart' => $produit->getProduit()]);
            $produitStripe[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $produitData->getPrixachat() * 100,
                    'product_data' => [
                        'name' => $produit->getProduit()
                    ]
                ], 
                'quantity' => $produit->getQuantite()
            ];
        
            $total1 += $produit->getPrixachat() *  $produit->getQuantite();
        }

        $produitStripe[] = [
            'price_data' => [
                'currency' => 'eur',
                'unit_amount' => (round(($total1 * 0.2),2)) * 100,
                'product_data' => [
                    'name' => "TVA"
                ]
                ],
                'quantity' => 1,
            ];



            
         // dd($produitStripe);

        $produitStripe[] = [
            'price_data' => [
                'currency' => 'eur',
                'unit_amount' => $commande->getTransporteurPrix() * 100,
                'product_data' => [
                    'name' => $commande->getTransporteurNom()
                ]
            ], 
            'quantity' => 1,
        ];

    //     if($pttc > 200) {
    //         //$total =$totaltva+0; 
    //         $produitStripe[] = [
    //                 'price_data' => [
    //                     'currency' => 'eur',
    //                     'unit_amount' => 0,
    //                     'product_data' => [
    //                         'name' => 'fdp'
    //                     ]
    //                     ],
    //                     'quantity' => 1,
    //                 ];
    //     }
    //     else {
    //         $produitStripe[] = [
    //             'price_data' => [
    //                 'currency' => 'eur',
    //                 'unit_amount' => $fdp * 100,
    //                 'product_data' => [
    //                     'name' => 'fdp'
    //                 ]
    //                 ],
    //                 'quantity' => 1,
    //             ];
        
    // }

        Stripe::setApiKey('sk_test_51O9QyeJcB7aIs6zZrucNH3s5gBlnUgquUXkR0KmrRdBGd3lVjWdp2jRc1OzsLGoj5LA5y1DISPIdT8pADgrT0DKX00qdskr1kk');


        $checkout_session = Session::create([
            'customer_email' => $this->getUser()->getEmail(),
            'payment_method_types' => ['card'],
            'line_items' => [
                $produitStripe
            ],
            'mode' => 'payment',
            'success_url' => $this->generator->generate('payment_success', [
                'reference' => $commande->getReference()],
                UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url' => $this->generator->generate('payment_error',
            ['reference' => $commande->getReference()],
            UrlGeneratorInterface::ABSOLUTE_URL
            )
            
        ]);
        $commande->setStripeSessionId($checkout_session->id);
        $this->em->flush();

        return new RedirectResponse($checkout_session->url);
    }

    #[Route('/order/success/{reference}', name: 'payment_success')]
    public function StripeSuccess($reference, CartService $service): Response
    {
        return $this->render('commande.success.html.twig');
    }


    #[Route('/order/error/{reference}', name: 'payment_error')]
    public function StripeError($reference, CartService $service): Response
    {
        return $this->render('commande.error.html.twig');
    }
}
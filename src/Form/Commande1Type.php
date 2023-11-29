<?php

namespace App\Form;

use App\Entity\Users;
use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Commande1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('transporteurNom', options:[
                'label' => 'Nom du transporteur'
            ])
            ->add('transporteurPrix', options:[
                'label' => 'Prix du transport'
            ])
            ->add('livraison', options:[
                'label' => 'Adresse de livraison'
            ])
            ->add('isPaid', options:[
                'label' => 'Payé'
            ])
            ->add('methode', options:[
                'label' => 'Mode de paiement'
            ])
            ->add('reference', options:[
                'label' => 'Référence'
            ])
            ->add('stripeSessionId', options:[
                'label' => 'Identifiant de session'
            ])
            ->add('paypalCommandeId', options:[
                'label' => 'Identifiant de commande paypal'
            ])
            ->add('CreateAt', options:[
                'label' => 'Date de commande'
            ])
            ->add('adr_fact', options:[
                'label' => 'Adresse de facturation'
            ])
            ->add('date_fact', options:[
                'label' => 'Date de facturation'
            ])
        
            ->add('com_users', EntityType::class, [
                'class' => Users::class,
                'choice_label' =>'Nom',
                'label' => 'Nom'
            ]);
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
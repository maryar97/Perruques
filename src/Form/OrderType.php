<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
        ->add('adrlivraison', options:[
            'label' => 'Adresse de Livraison',
        
        ])
        ->add('adrfact',  options:[
            'label' => 'Adresse de facturation'
        ]);
        
        // ->add('commentaire', null, [
        // 'label' => 'Commentaire',
        // 'required' => false,
        // ]);
}
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

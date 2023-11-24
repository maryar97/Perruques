<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Commande1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datecom')
            ->add('totalcom')
            ->add('idpaiement')
            ->add('datepaiement')
            ->add('descppaiement')
            ->add('modepaiement')
            ->add('facturedate')
            ->add('facturetotalttc')
            ->add('facturetotaltva')
            ->add('facturetotalht')
            ->add('adrlivraison')
            ->add('adrfact')
            ->add('Users')
            ->add('transporteur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Users;
use App\Entity\Adresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
        
        
            ->add('titre', options:[
                'label' => 'Titre'
            ])
            ->add('nom', options:[
                'label' => 'Nom'
            ])
            ->add('prenom', options:[
                'label' => 'Prénom'
            ])
            ->add('adresse', options:[
                'label' => 'Adresse'
            ])
            ->add('codepostal', options:[
                'label' => 'Code postal'
            ])
            ->add('ville', options:[
                'label' => 'Ville'
            ])
            ->add('telephone', options:[
                'label' => 'Téléphone'
            ])
            ->add('pays', options:[
                'label' => 'Pays'
            ])
            ->add('users', EntityType::class, [
                'class' => Users::class,
                'choice_label' =>'Nom'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
        ]);
    }
}

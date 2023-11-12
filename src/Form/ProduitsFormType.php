<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('sousrubriqueart', options:[
            'label' => 'Nom'
        ])
        ->add('liblong', options:[
            'label' => 'Description'
        ])
        ->add('prix', options:[
            'label' => 'Prix'
        ])
        ->add('stock', options:[
            'label' => 'Unités en stock'
        ])
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' =>'nomcat',
                'group_by' => 'parent.nomcat',
                'query_builder' => function(CategorieRepository $cr)
                {
                    return $cr->createQueryBuilder('c')
                        ->where('c.parent IS NOT NULL')
                        ->orderBy('c.nomcat', 'ASC');
                }
            ])
                         

           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}

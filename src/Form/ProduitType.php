<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rubriqueart', options:[ 
                'label' => 'Rubrique article'
            ])
            ->add('sousrubriqueart', options:[
                'label' => 'Nom'
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
            ->add('libcourt', options:[
                'label' => 'Courte description'
            ])
            ->add('liblong', options:[
                'label' => 'Description'
            ])
            ->add('photo', options:[
                'label' => 'Photo'
            ])
            ->add('prixachat', options:[
                'label' => 'Prix'
            ])
            ->add('stock', options:[
                'label' => 'Unités en stock'
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

<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' =>'nomcat',
                'group_by' => 'parent.nomcat',
                'query_builder' => function(CategorieRepository $cr)
                {
                    return $cr->createQueryBuilder('c')
                        ->where('c.parent IS NULL')
                        ->orderBy('c.nomcat', 'ASC');
                    
                }

            ])
            

            ->add('sousrubriqueart', options:[
                'label' => 'Sous-catégorie'

            ])

            
            ->add('libcourt', options:[
                'label' => 'Nom du produit'
            ])
            ->add('liblong', options:[
                'label' => 'Description'
            ])
            
            ->add('prixachat', options:[
                'label' => 'Prix'
            ])
            ->add('stock', options:[
                'label' => 'Unités en stock'
            ])
    
           ->add('photoFile', VichImageType::class,[
            'label' => 'Photo',
            'attr' => ["required" => false]
           ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}

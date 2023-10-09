<?php

namespace App\Form;

use App\Entity\Terrain;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ChercherTerrainType extends AbstractType
{
    // Méthode buildForm() pour définir les champs du formulaire
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Ville', TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => 'Ville',
                ],
            ])
        ;
    }

    //Méthode configureOptions() pour définir les options du formulaire
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Terrain::class,
        ]);
    }
}

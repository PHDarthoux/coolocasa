<?php

declare(strict_types=1);

namespace App\Form;

use App\DTO\SearchDTO;
use App\Entity\LodgingType;
use App\Entity\RentalSearch;
use App\Entity\RoommateOffer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchDTOType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('wish', ChoiceType::class, [
                'label' => false,
                'choices' => [
                    'Je cherche un logement' => RoommateOffer::class,
                    'Je propose un logement' => RentalSearch::class,
                ],
            ])
            ->add('city', TextType::class, [
                'attr' => [
                    'placeholder' => 'à : Ville',
                ],
            ])
            ->add('lodgingTypes', EntityType::class, [
                'class' => LodgingType::class,
                'multiple' => true,
                'expanded' => true,
                'required' => false,
            ])
            ->add('find', SubmitType::class, [
                'label' => 'Trouver',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data-class' => SearchDTO::class,
        ]);
    }
}

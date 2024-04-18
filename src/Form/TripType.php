<?php

namespace App\Form;

use App\Entity\Drivers;
use App\Entity\Trip;
use App\Entity\Vehicles;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TripType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('vehicle', EntityType::class, [
                'class' => Vehicles::class,
                'choice_label' => 'brand',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('driver', EntityType::class, [
                'class' => Drivers::class,
                'choice_label' => 'name',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trip::class,
        ]);
    }
}

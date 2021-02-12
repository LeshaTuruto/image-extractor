<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\ExtractedImageCharacteristic;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageCharacteristicFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'attr' => [
                    'placeholder' => 'name',
                    'class' => 'form-control',
                ],
                'label' => false,
            ])
            ->add('value', null, [
                'attr' => [
                    'placeholder' => 'value',
                    'class' => 'form-control',
                ],
                'label' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ExtractedImageCharacteristic::class,
        ]);
    }
}

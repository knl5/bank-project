<?php

namespace App\Form;

use App\Entity\Transfer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('amount', NumberType::class, [
                'required'   => true,
            ])
            ->add('transmitter', NumberType::class, [
                'label' => 'Débiteur'
            ])
            ->add('receiver', NumberType::class, [
                'label' => 'receveur'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Transfer::class,
        ]);
    }
}

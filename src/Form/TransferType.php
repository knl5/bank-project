<?php

namespace App\Form;

use App\Entity\Account;
use App\Entity\Transfer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('receiver', TextType::class, [
                'label' => 'Débiteur'
            ])
            ->add('transmitter', EntityType::class, [
                'choices' => $options['accounts'],
                'class' => Account::class
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Transfer::class,
            'accounts' => []
        ]);
    }
}

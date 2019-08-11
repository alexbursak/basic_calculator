<?php

namespace App\Form;

use App\Calculator\CalculatorConst;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalculatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'value1',
                TextType::class,
                ['attr' => ['maxlength' => CalculatorConst::FIELD_INPUT_MAXLENGTH]]
            )
            ->add(
                'operand',
                ChoiceType::class,
                ['choices'  => array_combine(CalculatorConst::OPERANDS, CalculatorConst::OPERANDS
                )
            ])
            ->add(
                'value2',
                TextType::class,
                ['attr' => ['maxlength' => CalculatorConst::FIELD_INPUT_MAXLENGTH]]
            )
            ->add('Calculate', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}

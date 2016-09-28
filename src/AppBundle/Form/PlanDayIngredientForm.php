<?php

namespace AppBundle\Form;

use AppBundle\Entity\Ingredient;
use AppBundle\Entity\IngredientAmount;
use AppBundle\Entity\PlanDayIngredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tetranz\Select2EntityBundle\Form\Type\Select2EntityType;

class PlanDayIngredientForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ingredient', Select2EntityType::class, [
                'remote_route' => 'ingredient_search',
                'class' => Ingredient::class,
                'allow_clear' => true
            ])
            ->add('amount');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PlanDayIngredient::class,
        ]);
    }
}

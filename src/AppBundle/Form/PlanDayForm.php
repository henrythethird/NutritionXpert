<?php

namespace AppBundle\Form;

use AppBundle\Entity\PlanDay;
use Proxies\__CG__\AppBundle\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tetranz\Select2EntityBundle\Form\Type\Select2EntityType;

class PlanDayForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ingredient', Select2EntityType::class, [
                'remote_route' => 'ingredient_search',
                'class' => Ingredient::class,
                'allow_clear' => true,
            ])
            ->add('date', DateType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PlanDay::class,
        ]);
    }
}

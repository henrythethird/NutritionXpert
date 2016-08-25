<?php

namespace Test\AppBundle\Form;

use AppBundle\Form\IngredientForm;
use Symfony\Component\Form\Tests\Extension\Validator\Type\TypeTestCase;

class IngredientFormTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = [
            'name' => 'test',
            'calories' => 0,
            'fat' => 0,
            'carbs' => 0,
            'protein' => 0,
            'alcohol' => 0
        ];

        // Make sure it compiles
        $form = $this->factory->create(IngredientForm::class);

        $form->submit($formData);
        // Synchronized -> false if the data transformer throws
        $this->assertTrue($form->isSynchronized());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }

    }
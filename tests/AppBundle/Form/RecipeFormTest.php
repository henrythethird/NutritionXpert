<?php

namespace Test\AppBundle\Form;

use AppBundle\Form\RecipeForm;
use Symfony\Component\Form\Tests\Extension\Validator\Type\TypeTestCase;

class RecipeFormTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        return;
        $formData = [
            'name' => 'test',
            'rating' => 0,
        ];

        // Make sure it compiles
        $form = $this->factory->create(RecipeForm::class);

        //$form->submit($formData);
        // Synchronized -> false if the data transformer throws
        //$this->assertTrue($form->isSynchronized());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
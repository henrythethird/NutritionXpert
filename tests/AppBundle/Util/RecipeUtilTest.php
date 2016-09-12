<?php

namespace Tests\AppBundle\Util;

use AppBundle\Entity\Ingredient;
use AppBundle\Entity\Recipe;
use AppBundle\Entity\RecipeIngredient;
use AppBundle\Util\RecipeUtil;

class RecipeUtilTest extends \PHPUnit_Framework_TestCase
{
    public function testSummarizesRecipeIngredientsCorrectly()
    {
        $ingredient = $this->getMock(Ingredient::class, [
            "getCalories",
            "getCarbs",
            "getFat",
            "getProtein"
        ]);
        $ingredient
            ->method("getCalories")
            ->willReturn(100);
        $ingredient
            ->method("getCarbs")
            ->willReturn(1);
        $ingredient
            ->method("getFat")
            ->willReturn(2);
        $ingredient
            ->method("getProtein")
            ->willReturn(3);

        $recipeIngredient = $this->getMock(RecipeIngredient::class);
        $recipeIngredient->expects($this->once())
            ->method("getAmount")
            ->willReturn(2);

        $recipeIngredient->expects($this->once())
            ->method("getIngredient")
            ->willReturn($ingredient);

        $recipeUtil = new RecipeUtil();
        $result = $recipeUtil->summarizeRecipeIngredients([$recipeIngredient]);

        $this->assertEquals(200, $result['calories']);
        $this->assertEquals(2, $result['carbs']);
        $this->assertEquals(4, $result['fat']);
        $this->assertEquals(6, $result['protein']);

        $this->assertEquals($result, $recipeUtil->summarizeIngredients([$ingredient, $ingredient]));
    }
}

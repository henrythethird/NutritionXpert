<?php

namespace Tests\AppBundle\Util;

use AppBundle\Entity\Recipe;
use AppBundle\Entity\RecipeIngredient;
use AppBundle\Util\RecipeUtil;
use Proxies\__CG__\AppBundle\Entity\Ingredient;

class RecipeUtilTest extends \PHPUnit_Framework_TestCase
{
    public function testSummarizesCorrectly()
    {
        $ingredient = $this->getMock(Ingredient::class, [
            "getCalories",
            "getCarbs",
            "getFat",
            "getProtein"
        ]);
        $ingredient->expects($this->once())
            ->method("getCalories")
            ->willReturn(100)
        ;
        $ingredient->expects($this->once())
            ->method("getCarbs")
            ->willReturn(1)
        ;
        $ingredient->expects($this->once())
            ->method("getFat")
            ->willReturn(2)
        ;
        $ingredient->expects($this->once())
            ->method("getProtein")
            ->willReturn(3)
        ;

        $recipeIngredient = $this->getMock(RecipeIngredient::class);
        $recipeIngredient->expects($this->once())
            ->method("getAmount")
            ->willReturn(2)
        ;

        $recipeIngredient->expects($this->once())
            ->method("getIngredient")
            ->willReturn($ingredient)
        ;

        $recipe = $this->getMock(Recipe::class);
        $recipe->expects($this->once())
            ->method("getRecipeIngredients")
            ->willReturn([
                $recipeIngredient,
            ])
        ;

        $recipeUtil = new RecipeUtil($recipe);
        $result = $recipeUtil->summarizeIngredients();

        $this->assertEquals(200, $result['calories']);
        $this->assertEquals(2, $result['carbs']);
        $this->assertEquals(4, $result['fat']);
        $this->assertEquals(6, $result['protein']);
    }
}

<?php

namespace AppBundle\Util;

use AppBundle\Entity\Recipe;
use AppBundle\Entity\RecipeIngredient;

class RecipeUtil
{
    private $recipe;

    public function __construct(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    /**
     * @return array
     */
    public function summarizeIngredients()
    {
        $summarizer = [
            'calories' => 0,
            'carbs' => 0,
            'fat' => 0,
            'protein' => 0,
        ];
        foreach ($this->recipe->getRecipeIngredients() as $recipeIngredient) {
            /** @var RecipeIngredient $recipeIngredient */
            $amount = $recipeIngredient->getAmount();
            $ingredient = $recipeIngredient->getIngredient();

            $summarizer['calories'] += $amount * $ingredient->getCalories();
            $summarizer['carbs'] += $amount * $ingredient->getCarbs();
            $summarizer['fat'] += $amount * $ingredient->getFat();
            $summarizer['protein'] += $amount * $ingredient->getProtein();
        }
        return $summarizer;
    }
}
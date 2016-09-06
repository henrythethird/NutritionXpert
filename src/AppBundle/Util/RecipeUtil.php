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
            'alcohol' => 0,
            'betaCarotene' => 0,
            'betaCaroteneActivity' => 0,
            'calories' => 0,
            'carbs' => 0,
            'calcium' => 0,
            'chloride' => 0,
            'cholesterol' => 0,
            'dietaryFibres' => 0,
            'fattyAcidsMono' => 0,
            'fattyAcidsPoly' => 0,
            'fattyAcidsSaturated' => 0,
            'fat' => 0,
            'folate' => 0,
            'iodine' => 0,
            'iron' => 0,
            'magnesium' => 0,
            'niacin' => 0,
            'pantothenicAcid' => 0,
            'phosphorous' => 0,
            'potassium' => 0,
            'protein' => 0,
            'retinolEquiv' => 0,
            'sodium' => 0,
            'starch' => 0,
            'sugars' => 0,
            'vitaminA' => 0,
            'vitaminB1' => 0,
            'vitaminB2' => 0,
            'vitaminB6' => 0,
            'vitaminB12' => 0,
            'vitaminC' => 0,
            'vitaminD' => 0,
            'vitaminE' => 0,
            'water' => 0,
            'zinc' => 0,
        ];
        foreach ($this->recipe->getRecipeIngredients() as $recipeIngredient) {
            /** @var RecipeIngredient $recipeIngredient */
            $amount = $recipeIngredient->getAmount();
            $ingredient = $recipeIngredient->getIngredient();

            $summarizer['alcohol'] += $amount * $ingredient->getAlcohol();
            $summarizer['betaCarotene'] += $amount * $ingredient->getBetaCarotene();
            $summarizer['betaCaroteneActivity'] += $amount * $ingredient->getBetaCaroteneActivity();
            $summarizer['calories'] += $amount * $ingredient->getCalories();
            $summarizer['carbs'] += $amount * $ingredient->getCarbs();
            $summarizer['fat'] += $amount * $ingredient->getFat();
            $summarizer['calcium'] += $amount * $ingredient->getCalcium();
            $summarizer['chloride'] += $amount * $ingredient->getChloride();
            $summarizer['cholesterol'] += $amount * $ingredient->getCholesterol();
            $summarizer['dietaryFibres'] += $amount * $ingredient->getDietaryFibres();
            $summarizer['fattyAcidsMono'] += $amount * $ingredient->getFattyAcidsMono();
            $summarizer['fattyAcidsPoly'] += $amount * $ingredient->getFattyAcidsPoly();
            $summarizer['fattyAcidsSaturated'] += $amount * $ingredient->getFattyAcidsSaturated();
            $summarizer['folate'] += $amount * $ingredient->getFolate();
            $summarizer['iodine'] += $amount * $ingredient->getIodine();
            $summarizer['iron'] += $amount * $ingredient->getIron();
            $summarizer['magnesium'] += $amount * $ingredient->getMagnesium();
            $summarizer['niacin'] += $amount * $ingredient->getNiacin();
            $summarizer['pantothenicAcid'] += $amount * $ingredient->getPantothenicAcid();
            $summarizer['phosphorous'] += $amount * $ingredient->getPhosphorous();
            $summarizer['potassium'] += $amount * $ingredient->getPotassium();
            $summarizer['protein'] += $amount * $ingredient->getProtein();
            $summarizer['retinolEquiv'] += $amount * $ingredient->getRetinolEquiv();
            $summarizer['sodium'] += $amount * $ingredient->getSodium();
            $summarizer['starch'] += $amount * $ingredient->getStarch();
            $summarizer['sugars'] += $amount * $ingredient->getSugars();
            $summarizer['vitaminA'] += $amount * $ingredient->getVitaminA();
            $summarizer['vitaminB1'] += $amount * $ingredient->getVitaminB1();
            $summarizer['vitaminB2'] += $amount * $ingredient->getVitaminB2();
            $summarizer['vitaminB6'] += $amount * $ingredient->getVitaminB6();
            $summarizer['vitaminB12'] += $amount * $ingredient->getVitaminB12();
            $summarizer['vitaminC'] += $amount * $ingredient->getVitaminC();
            $summarizer['vitaminD'] += $amount * $ingredient->getVitaminD();
            $summarizer['vitaminE'] += $amount * $ingredient->getVitaminE();
            $summarizer['water'] += $amount * $ingredient->getWater();
            $summarizer['zinc'] += $amount * $ingredient->getZinc();
        }
        return $summarizer;
    }
}
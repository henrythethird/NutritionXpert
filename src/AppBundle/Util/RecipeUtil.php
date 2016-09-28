<?php

namespace AppBundle\Util;

use AppBundle\Entity\Ingredient;
use AppBundle\Entity\PlanDay;
use AppBundle\Entity\PlanDayIngredient;
use AppBundle\Entity\Recipe;
use AppBundle\Entity\RecipeIngredient;

class RecipeUtil
{
    const DAV = [
        'calories' => 2000,
        'fat' => 65,
        'fattyAcidsSaturated' => 20,
        'cholesterol' => 300,
        'sodium' => 2400,
        'potassium' => 3500,
        'carbs' => 300,
        'dietaryFibres' => 25,
        'protein' => 50,
        'vitaminA' => 5000,
        'vitaminC' => 60,
        'calcium' => 1000,
        'iron' => 18,
        'vitaminD' => 400,
        'vitaminE' => 30,
        'niacin' => 20,
        'vitaminB6' => 2,
        'folate' => 400,
        'vitaminB12' => 6,
        'pantothenicAcid' => 10,
        'phosphorus' => 1000,
        'iodine' => 150,
        'magnesium' => 400,
        'zinc' => 15,
        'chloride' => 3400,
    ];
    const BASE = [
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

    public function summarizePlanDays(PlanDay $planDay)
    {
        $summarizer = self::BASE;
        foreach ($planDay->getPlanDayIngredients() as $planDayIngredient) {
            /** @var PlanDayIngredient $planDayIngredient */
            $this->summarizeIngredientHelper(
                $planDayIngredient->getAmount(),
                $planDayIngredient->getIngredient(),
                $summarizer
            );
        }
        return $summarizer;
    }

    public function summarizeIngredients($ingredients)
    {
        $summarizer = self::BASE;
        foreach ($ingredients as $ingredient) {
            $this->summarizeIngredientHelper(
                100,
                $ingredient,
                $summarizer
            );
        }
        return $summarizer;
    }

    /**
     * @param array $ingredients
     * @return array
     */
    public function summarizeRecipeIngredients($recipeIngredients)
    {
        $summarizer = self::BASE;
        foreach ($recipeIngredients as $recipeIngredient) {
            $this->summarizeIngredientHelper(
                $recipeIngredient->getAmount(),
                $recipeIngredient->getIngredient(),
                $summarizer
            );
        }
        return $summarizer;
    }

    /**
     * @param $amount
     * @param Ingredient $ingredient
     * @param array $summarizer
     */
    public function summarizeIngredientHelper($amount, Ingredient $ingredient, &$summarizer)
    {
        $amount = $amount / 100.0;

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

    /**
     * @param Recipe $recipe
     */
    public function updateRecipe(Recipe $recipe, array $summarizer)
    {
        $recipe->setAlcohol($summarizer['alcohol']);
        $recipe->setBetaCarotene($summarizer['betaCarotene']);
        $recipe->setBetaCaroteneActivity($summarizer['betaCaroteneActivity']);
        $recipe->setCalories($summarizer['calories']);
        $recipe->setCarbs($summarizer['carbs']);
        $recipe->setFat($summarizer['fat']);
        $recipe->setCalcium($summarizer['calcium']);
        $recipe->setChloride($summarizer['chloride']);
        $recipe->setCholesterol($summarizer['cholesterol']);
        $recipe->setDietaryFibres($summarizer['dietaryFibres']);
        $recipe->setFattyAcidsMono($summarizer['fattyAcidsMono']);
        $recipe->setFattyAcidsPoly($summarizer['fattyAcidsPoly']);
        $recipe->setFattyAcidsSaturated($summarizer['fattyAcidsSaturated']);
        $recipe->setFolate($summarizer['folate']);
        $recipe->setIodine($summarizer['iodine']);
        $recipe->setIron($summarizer['iron']);
        $recipe->setMagnesium($summarizer['magnesium']);
        $recipe->setNiacin($summarizer['niacin']);
        $recipe->setPantothenicAcid($summarizer['pantothenicAcid']);
        $recipe->setPhosphorous($summarizer['phosphorous']);
        $recipe->setPotassium($summarizer['potassium']);
        $recipe->setProtein($summarizer['protein']);
        $recipe->setRetinolEquiv($summarizer['retinolEquiv']);
        $recipe->setSodium($summarizer['sodium']);
        $recipe->setStarch($summarizer['starch']);
        $recipe->setSugars($summarizer['sugars']);
        $recipe->setVitaminA($summarizer['vitaminA']);
        $recipe->setVitaminB1($summarizer['vitaminB1']);
        $recipe->setVitaminB2($summarizer['vitaminB2']);
        $recipe->setVitaminB6($summarizer['vitaminB6']);
        $recipe->setVitaminB12($summarizer['vitaminB12']);
        $recipe->setVitaminC($summarizer['vitaminC']);
        $recipe->setVitaminD($summarizer['vitaminD']);
        $recipe->setVitaminE($summarizer['vitaminE']);
        $recipe->setWater($summarizer['water']);
        $recipe->setZinc($summarizer['zinc']);
    }
}
<?php

namespace AppBundle\Util;

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

    /**
     * @var Recipe
     */
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
        $this->recipe->setAlcohol($summarizer['alcohol']);
        $this->recipe->setBetaCarotene($summarizer['betaCarotene']);
        $this->recipe->setBetaCaroteneActivity($summarizer['betaCaroteneActivity']);
        $this->recipe->setCalories($summarizer['calories']);
        $this->recipe->setCarbs($summarizer['carbs']);
        $this->recipe->setFat($summarizer['fat']);
        $this->recipe->setCalcium($summarizer['calcium']);
        $this->recipe->setChloride($summarizer['chloride']);
        $this->recipe->setCholesterol($summarizer['cholesterol']);
        $this->recipe->setDietaryFibres($summarizer['dietaryFibres']);
        $this->recipe->setFattyAcidsMono($summarizer['fattyAcidsMono']);
        $this->recipe->setFattyAcidsPoly($summarizer['fattyAcidsPoly']);
        $this->recipe->setFattyAcidsSaturated($summarizer['fattyAcidsSaturated']);
        $this->recipe->setFolate($summarizer['folate']);
        $this->recipe->setIodine($summarizer['iodine']);
        $this->recipe->setIron($summarizer['iron']);
        $this->recipe->setMagnesium($summarizer['magnesium']);
        $this->recipe->setNiacin($summarizer['niacin']);
        $this->recipe->setPantothenicAcid($summarizer['pantothenicAcid']);
        $this->recipe->setPhosphorous($summarizer['phosphorous']);
        $this->recipe->setPotassium($summarizer['potassium']);
        $this->recipe->setProtein($summarizer['protein']);
        $this->recipe->setRetinolEquiv($summarizer['retinolEquiv']);
        $this->recipe->setSodium($summarizer['sodium']);
        $this->recipe->setStarch($summarizer['starch']);
        $this->recipe->setSugars($summarizer['sugars']);
        $this->recipe->setVitaminA($summarizer['vitaminA']);
        $this->recipe->setVitaminB1($summarizer['vitaminB1']);
        $this->recipe->setVitaminB2($summarizer['vitaminB2']);
        $this->recipe->setVitaminB6($summarizer['vitaminB6']);
        $this->recipe->setVitaminB12($summarizer['vitaminB12']);
        $this->recipe->setVitaminC($summarizer['vitaminC']);
        $this->recipe->setVitaminD($summarizer['vitaminD']);
        $this->recipe->setVitaminE($summarizer['vitaminE']);
        $this->recipe->setWater($summarizer['water']);
        $this->recipe->setZinc($summarizer['zinc']);
    }
}
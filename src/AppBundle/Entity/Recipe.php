<?php

namespace AppBundle\Entity;

use AppBundle\Util\RecipeUtil;
use Doctrine\ORM\Mapping;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;

/**
 * @Doctrine\ORM\Mapping\Entity
 * @Mapping\HasLifecycleCallbacks()
 * @Mapping\Table()
 */
class Recipe extends Ingredient
{
    /**
     * @Mapping\Column(type="smallint")
     */
    private $rating = 0;

    /**
     * @Mapping\OneToMany(targetEntity="RecipeIngredient", mappedBy="recipe", cascade={"persist"})
     * @JoinColumn(onDelete="CASCADE")
     */
    private $recipeIngredients;

    /**
     * @Mapping\Column(type="integer")
     * @GreaterThanOrEqual(0)
     * @var int
     */
    private $servings = 0;

    public function __construct()
    {
        $this->recipeIngredients = new ArrayCollection();

    }

    /**
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return ArrayCollection RecipeIngredient
     */
    public function getRecipeIngredients()
    {
        return $this->recipeIngredients;
    }

    /**
     * @param RecipeIngredient $recipeIngredient
     */
    public function addRecipeIngredient(RecipeIngredient $recipeIngredient)
    {
        $recipeIngredient->setRecipe($this);

        $this->recipeIngredients->add($recipeIngredient);
    }

    public function removeRecipeIngredient(RecipeIngredient $recipeIngredient)
    {
        $this->recipeIngredients->removeElement($recipeIngredient);
    }

    /**
     * @Mapping\PreFlush()
     */
    public function preFlush()
    {
        $util = new RecipeUtil($this);
        $sum = $util->summarizeIngredients();

        $this->setAlcohol($sum['alcohol']);
        $this->setBetaCarotene($sum['betaCarotene']);
        $this->setBetaCaroteneActivity($sum['betaCaroteneActivity']);
        $this->setCalories($sum['calories']);
        $this->setCarbs($sum['carbs']);
        $this->setFat($sum['fat']);
        $this->setCalcium($sum['calcium']);
        $this->setChloride($sum['chloride']);
        $this->setCholesterol($sum['cholesterol']);
        $this->setDietaryFibres($sum['dietaryFibres']);
        $this->setFattyAcidsMono($sum['fattyAcidsMono']);
        $this->setFattyAcidsPoly($sum['fattyAcidsPoly']);
        $this->setFattyAcidsSaturated($sum['fattyAcidsSaturated']);
        $this->setFolate($sum['folate']);
        $this->setIodine($sum['iodine']);
        $this->setIron($sum['iron']);
        $this->setMagnesium($sum['magnesium']);
        $this->setNiacin($sum['niacin']);
        $this->setPantothenicAcid($sum['pantothenicAcid']);
        $this->setPhosphorous($sum['phosphorous']);
        $this->setPotassium($sum['potassium']);
        $this->setProtein($sum['protein']);
        $this->setRetinolEquiv($sum['retinolEquiv']);
        $this->setSodium($sum['sodium']);
        $this->setStarch($sum['starch']);
        $this->setSugars($sum['sugars']);
        $this->setVitaminA($sum['vitaminA']);
        $this->setVitaminB1($sum['vitaminB1']);
        $this->setVitaminB2($sum['vitaminB2']);
        $this->setVitaminB6($sum['vitaminB6']);
        $this->setVitaminB12($sum['vitaminB12']);
        $this->setVitaminC($sum['vitaminC']);
        $this->setVitaminD($sum['vitaminD']);
        $this->setVitaminE($sum['vitaminE']);
        $this->setWater($sum['water']);
        $this->setZinc($sum['zinc']);
    }

    /**
     * @return int
     */
    public function getServings()
    {
        return $this->servings;
    }

    /**
     * @param int $servings
     */
    public function setServings($servings)
    {
        $this->servings = $servings;
    }
}
<?php

namespace AppBundle\Entity;

use AppBundle\Util\RecipeUtil;
use Doctrine\ORM\Mapping;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

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
    }
}
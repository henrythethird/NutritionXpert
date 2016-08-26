<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table()
 * @UniqueEntity("name")
 */
class Recipe
{
    /**
     * @Mapping\Id
     * @Mapping\GeneratedValue(strategy="AUTO")
     * @Mapping\Column(type="integer")
     */
    private $id;
    /**
     * @Mapping\Column(type="string", unique=true)
     */
    private $name;
    /**
     * @Mapping\Column(type="smallint")
     */
    private $rating;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return array RecipeIngredient
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
}
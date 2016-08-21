<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table(name="recipe")
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
     * @Mapping\Column(type="string")
     */
    private $name;
    /**
     * @Mapping\Column(type="smallint", unique=true)
     */
    private $rating;

    /**
     * @Mapping\OneToMany(targetEntity="RecipeIngredient", mappedBy="recipe")
     */
    private $recipeIngredients;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
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
     * @param mixed $ingredients
     */
    public function setRecipeIngredients($ingredients)
    {
        $this->recipeIngredients = $ingredients;
    }
}
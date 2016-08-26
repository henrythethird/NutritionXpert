<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Mapping\Entity(repositoryClass="AppBundle\Repository\IngredientRepository")
 * @Mapping\Table()
 * @UniqueEntity("name")
 */
class Ingredient {
	/**
	 * @Mapping\Id
	 * @Mapping\GeneratedValue(strategy="AUTO")
	 * @Mapping\Column(type="integer")
	 */
	private $id;

	/**
	 * @Mapping\Column(type="string", unique=true)
	 * @Assert\NotBlank()
	 */
	private $name;
	/**
	 * @Mapping\Column(type="decimal", precision=10, scale=2)
	 * @Assert\GreaterThanOrEqual(0)
     */
    private $calories = 0;
	/**
	 * @Mapping\Column(type="decimal", precision=5, scale=2)
	 * @Assert\GreaterThanOrEqual(0)
     */
    private $fat = 0;
	/**
	 * @Mapping\Column(type="decimal", precision=5, scale=2)
	 * @Assert\GreaterThanOrEqual(0)
     */
    private $carbs = 0;

	/**
	 * @Mapping\Column(type="decimal", precision=5, scale=2)
	 * @Assert\GreaterThanOrEqual(0)
     */
    private $protein = 0;
	/**
	 * @Mapping\Column(type="decimal", precision=5, scale=2)
	 * @Assert\GreaterThanOrEqual(0)
     */
    private $alcohol = 0;

	/**
	 * @Mapping\OneToMany(targetEntity="RecipeIngredient", mappedBy="ingredient", cascade={"persist"})
	 * @Mapping\JoinColumn(onDelete="CASCADE")
	 */
	private $recipeIngredients;

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
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getFat()
	{
		return $this->fat;
	}

	/**
	 * @param mixed $fat
	 */
	public function setFat($fat)
	{
		$this->fat = $fat;
	}

	/**
	 * @return mixed
	 */
	public function getCarbs()
	{
		return $this->carbs;
	}

	/**
	 * @param mixed $carbs
	 */
	public function setCarbs($carbs)
	{
		$this->carbs = $carbs;
	}

	/**
	 * @return mixed
	 */
	public function getProtein()
	{
		return $this->protein;
	}

	/**
	 * @param mixed $protein
	 */
	public function setProtein($protein)
	{
		$this->protein = $protein;
	}

	/**
	 * @return mixed
	 */
	public function getAlcohol()
	{
		return $this->alcohol;
	}

	/**
	 * @param mixed $alcohol
	 */
	public function setAlcohol($alcohol = 0)
	{
		$this->alcohol = $alcohol;
	}

	/**
	 * @return mixed
	 */
	public function getCalories()
	{
		return $this->calories;
	}

	/**
	 * @param mixed $calories
	 */
	public function setCalories($calories)
	{
		$this->calories = $calories;
	}


	public function __toString()
	{
		return $this->getName();
	}
}
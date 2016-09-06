<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Mapping\Entity(repositoryClass="AppBundle\Repository\IngredientRepository")
 * @Mapping\Table()
 * @UniqueEntity("name")
 * @Mapping\InheritanceType("SINGLE_TABLE")
 * @Mapping\DiscriminatorColumn(name="type", type="string")
 * @Mapping\DiscriminatorMap({"ingredient" = "Ingredient", "recipe" = "Recipe"})
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
    protected $calories = 0;
	/**
	 * @Mapping\Column(type="decimal", precision=10, scale=2)
	 * @Assert\GreaterThanOrEqual(0)
	 * @var float
     */
	protected $fat = 0;
	/**
	 * @Mapping\Column(type="decimal", precision=10, scale=2)
	 * @Assert\GreaterThanOrEqual(0)
	 * @var float
     */
	protected $carbs = 0;

	/**
	 * @Mapping\Column(type="decimal", precision=10, scale=2)
	 * @Assert\GreaterThanOrEqual(0)
	 * @var float
     */
	protected $protein = 0;
	/**
	 * @Mapping\Column(type="decimal", precision=10, scale=2)
	 * @Assert\GreaterThanOrEqual(0)
	 * @var float
     */
	protected $alcohol = 0;

	/**
	 * @Mapping\OneToMany(targetEntity="RecipeIngredient", mappedBy="ingredient", cascade={"persist"})
	 * @Mapping\JoinColumn(onDelete="CASCADE")
	 */
	private $ingredientRecipes;

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
	 * @return float
	 */
	public function getFat()
	{
		return $this->fat;
	}

	/**
	 * @param float $fat
	 */
	public function setFat($fat)
	{
		$this->fat = $fat;
	}

	/**
	 * @return float
	 */
	public function getCarbs()
	{
		return $this->carbs;
	}

	/**
	 * @param float $carbs
	 */
	public function setCarbs($carbs)
	{
		$this->carbs = $carbs;
	}

	/**
	 * @return float
	 */
	public function getProtein()
	{
		return $this->protein;
	}

	/**
	 * @param float $protein
	 */
	public function setProtein($protein)
	{
		$this->protein = $protein;
	}

	/**
	 * @return float
	 */
	public function getAlcohol()
	{
		return $this->alcohol;
	}

	/**
	 * @param float $alcohol
	 */
	public function setAlcohol($alcohol = 0)
	{
		$this->alcohol = $alcohol;
	}

	/**
	 * @return float
	 */
	public function getCalories()
	{
		return $this->calories;
	}

	/**
	 * @param float $calories
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
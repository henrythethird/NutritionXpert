<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping;

/**
 * @Mapping\Entity(repositoryClass="AppBundle\Repository\IngredientRepository")
 * @Mapping\Table(name="ingredient")
 */
class Ingredient {
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
	 * @Mapping\Column(type="decimal", precision=10, scale=2)
     */
    private $calories;
	/**
	 * @Mapping\Column(type="decimal", precision=5, scale=2)
     */
    private $fat;
	/**
	 * @Mapping\Column(type="decimal", precision=5, scale=2)
     */
    private $carbs;
	/**
	 * @Mapping\Column(type="decimal", precision=5, scale=2)
     */
    private $protein;
	/**
	 * @Mapping\Column(type="decimal", precision=5, scale=2)
     */
    private $alcohol;

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
	public function setAlcohol($alcohol)
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
}
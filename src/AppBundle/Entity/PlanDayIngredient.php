<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class PlanDayIngredient implements IngredientAmount
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=4)
     * @var float
     */
    private $amount = 1;

    /**
     * @ORM\ManyToOne(targetEntity="PlanDay", inversedBy="planDayIngredients")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * @var PlanDay
     */
    private $planDay;

    /**
     * @ORM\ManyToOne(targetEntity="Ingredient")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=false, onDelete="CASCADE")
     * @var Ingredient
     */
    private $ingredient;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return PlanDay
     */
    public function getPlanDay()
    {
        return $this->planDay;
    }

    /**
     * @param PlanDay $planDay
     */
    public function setPlanDay($planDay)
    {
        $this->planDay = $planDay;
    }

    /**
     * @return Ingredient
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }

    /**
     * @param Ingredient $recipe
     */
    public function setIngredient(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
}
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;

/**
 * @Mapping\Entity(repositoryClass="AppBundle\Repository\IngredientRepository")
 * @Mapping\Table()
 * @UniqueEntity("name")
 * @Mapping\InheritanceType("SINGLE_TABLE")
 * @Mapping\DiscriminatorColumn(name="type", type="string")
 * @Mapping\DiscriminatorMap({"ingredient" = "Ingredient", "recipe" = "Recipe"})
 */
class Ingredient
{
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
     * @GreaterThanOrEqual(0)
     */
    protected $calories = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $fat = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $carbs = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $protein = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $alcohol = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $water = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $starch = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $sugars = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $dietaryFibres = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $cholesterol = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $fattyAcidsMono = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $fattyAcidsSaturated = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $fattyAcidsPoly = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $vitaminA = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $retinolEquiv = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $betaCarotene = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $betaCaroteneActivity = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $vitaminB1 = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $vitaminB2 = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $vitaminB6 = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $vitaminB12 = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $niacin = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $folate = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $pantothenicAcid = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $vitaminC = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $vitaminD = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $vitaminE = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $sodium = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $potassium = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $chloride = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $calcium = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $magnesium = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $phosphorous = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $iron = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $iodine = 0;

    /**
     * @Mapping\Column(type="decimal", precision=10, scale=2)
     * @GreaterThanOrEqual(0)
     * @var float
     */
    protected $zinc = 0;

    /**
     * @Mapping\Column(type="integer")
     * @GreaterThanOrEqual(1)
     * @var int
     */
    private $servings = 1;

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
     * @return float
     */
    public function getWeight()
    {
        return $this->fat
            + $this->carbs
            + $this->alcohol
            + $this->dietaryFibres
            + $this->protein
            + $this->water;
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

    /**
     * @return float
     */
    public function getWater()
    {
        return $this->water;
    }

    /**
     * @param float $water
     */
    public function setWater($water)
    {
        $this->water = $water;
    }

    /**
     * @return float
     */
    public function getStarch()
    {
        return $this->starch;
    }

    /**
     * @param float $starch
     */
    public function setStarch($starch)
    {
        $this->starch = $starch;
    }

    /**
     * @return float
     */
    public function getSugars()
    {
        return $this->sugars;
    }

    /**
     * @param float $sugars
     */
    public function setSugars($sugars)
    {
        $this->sugars = $sugars;
    }

    /**
     * @return float
     */
    public function getDietaryFibres()
    {
        return $this->dietaryFibres;
    }

    /**
     * @param float $dietaryFibres
     */
    public function setDietaryFibres($dietaryFibres)
    {
        $this->dietaryFibres = $dietaryFibres;
    }

    /**
     * @return float
     */
    public function getCholesterol()
    {
        return $this->cholesterol;
    }

    /**
     * @param float $cholesterol
     */
    public function setCholesterol($cholesterol)
    {
        $this->cholesterol = $cholesterol;
    }

    /**
     * @return float
     */
    public function getFattyAcidsMono()
    {
        return $this->fattyAcidsMono;
    }

    /**
     * @param float $fattyAcidsMono
     */
    public function setFattyAcidsMono($fattyAcidsMono)
    {
        $this->fattyAcidsMono = $fattyAcidsMono;
    }

    /**
     * @return float
     */
    public function getFattyAcidsSaturated()
    {
        return $this->fattyAcidsSaturated;
    }

    /**
     * @param float $fattyAcidsSaturated
     */
    public function setFattyAcidsSaturated($fattyAcidsSaturated)
    {
        $this->fattyAcidsSaturated = $fattyAcidsSaturated;
    }

    /**
     * @return float
     */
    public function getFattyAcidsPoly()
    {
        return $this->fattyAcidsPoly;
    }

    /**
     * @param float $fattyAcidsPoly
     */
    public function setFattyAcidsPoly($fattyAcidsPoly)
    {
        $this->fattyAcidsPoly = $fattyAcidsPoly;
    }

    /**
     * @return float
     */
    public function getVitaminA()
    {
        return $this->vitaminA;
    }

    /**
     * @param float $vitaminA
     */
    public function setVitaminA($vitaminA)
    {
        $this->vitaminA = $vitaminA;
    }

    /**
     * @return float
     */
    public function getRetinolEquiv()
    {
        return $this->retinolEquiv;
    }

    /**
     * @param float $retinolEquiv
     */
    public function setRetinolEquiv($retinolEquiv)
    {
        $this->retinolEquiv = $retinolEquiv;
    }

    /**
     * @return float
     */
    public function getBetaCarotene()
    {
        return $this->betaCarotene;
    }

    /**
     * @param float $betaCarotene
     */
    public function setBetaCarotene($betaCarotene)
    {
        $this->betaCarotene = $betaCarotene;
    }

    /**
     * @return float
     */
    public function getVitaminB1()
    {
        return $this->vitaminB1;
    }

    /**
     * @param float $vitaminB1
     */
    public function setVitaminB1($vitaminB1)
    {
        $this->vitaminB1 = $vitaminB1;
    }

    /**
     * @return float
     */
    public function getVitaminB2()
    {
        return $this->vitaminB2;
    }

    /**
     * @param float $vitaminB2
     */
    public function setVitaminB2($vitaminB2)
    {
        $this->vitaminB2 = $vitaminB2;
    }

    /**
     * @return float
     */
    public function getVitaminB6()
    {
        return $this->vitaminB6;
    }

    /**
     * @param float $vitaminB6
     */
    public function setVitaminB6($vitaminB6)
    {
        $this->vitaminB6 = $vitaminB6;
    }

    /**
     * @return float
     */
    public function getVitaminB12()
    {
        return $this->vitaminB12;
    }

    /**
     * @param float $vitaminB12
     */
    public function setVitaminB12($vitaminB12)
    {
        $this->vitaminB12 = $vitaminB12;
    }

    /**
     * @return float
     */
    public function getNiacin()
    {
        return $this->niacin;
    }

    /**
     * @param float $niacin
     */
    public function setNiacin($niacin)
    {
        $this->niacin = $niacin;
    }

    /**
     * @return float
     */
    public function getFolate()
    {
        return $this->folate;
    }

    /**
     * @param float $folate
     */
    public function setFolate($folate)
    {
        $this->folate = $folate;
    }

    /**
     * @return float
     */
    public function getPantothenicAcid()
    {
        return $this->pantothenicAcid;
    }

    /**
     * @param float $pantothenicAcid
     */
    public function setPantothenicAcid($pantothenicAcid)
    {
        $this->pantothenicAcid = $pantothenicAcid;
    }

    /**
     * @return float
     */
    public function getVitaminC()
    {
        return $this->vitaminC;
    }

    /**
     * @param float $vitaminC
     */
    public function setVitaminC($vitaminC)
    {
        $this->vitaminC = $vitaminC;
    }

    /**
     * @return float
     */
    public function getVitaminD()
    {
        return $this->vitaminD;
    }

    /**
     * @param float $vitaminD
     */
    public function setVitaminD($vitaminD)
    {
        $this->vitaminD = $vitaminD;
    }

    /**
     * @return float
     */
    public function getVitaminE()
    {
        return $this->vitaminE;
    }

    /**
     * @param float $vitaminE
     */
    public function setVitaminE($vitaminE)
    {
        $this->vitaminE = $vitaminE;
    }

    /**
     * @return float
     */
    public function getSodium()
    {
        return $this->sodium;
    }

    /**
     * @param float $sodium
     */
    public function setSodium($sodium)
    {
        $this->sodium = $sodium;
    }

    /**
     * @return float
     */
    public function getPotassium()
    {
        return $this->potassium;
    }

    /**
     * @param float $potassium
     */
    public function setPotassium($potassium)
    {
        $this->potassium = $potassium;
    }

    /**
     * @return float
     */
    public function getChloride()
    {
        return $this->chloride;
    }

    /**
     * @param float $chloride
     */
    public function setChloride($chloride)
    {
        $this->chloride = $chloride;
    }

    /**
     * @return float
     */
    public function getCalcium()
    {
        return $this->calcium;
    }

    /**
     * @param float $calcium
     */
    public function setCalcium($calcium)
    {
        $this->calcium = $calcium;
    }

    /**
     * @return float
     */
    public function getMagnesium()
    {
        return $this->magnesium;
    }

    /**
     * @param float $magnesium
     */
    public function setMagnesium($magnesium)
    {
        $this->magnesium = $magnesium;
    }

    /**
     * @return float
     */
    public function getPhosphorous()
    {
        return $this->phosphorous;
    }

    /**
     * @param float $phosphorous
     */
    public function setPhosphorous($phosphorous)
    {
        $this->phosphorous = $phosphorous;
    }

    /**
     * @return float
     */
    public function getIron()
    {
        return $this->iron;
    }

    /**
     * @param float $iron
     */
    public function setIron($iron)
    {
        $this->iron = $iron;
    }

    /**
     * @return float
     */
    public function getIodine()
    {
        return $this->iodine;
    }

    /**
     * @param float $iodine
     */
    public function setIodine($iodine)
    {
        $this->iodine = $iodine;
    }

    /**
     * @return float
     */
    public function getZinc()
    {
        return $this->zinc;
    }

    /**
     * @param float $zinc
     */
    public function setZinc($zinc)
    {
        $this->zinc = $zinc;
    }

    /**
     * @return float
     */
    public function getBetaCaroteneActivity()
    {
        return $this->betaCaroteneActivity;
    }

    /**
     * @param float $betaCaroteneActivity
     */
    public function setBetaCaroteneActivity($betaCaroteneActivity)
    {
        $this->betaCaroteneActivity = $betaCaroteneActivity;
    }

    /**
     * @return int
     */
    public function getServings()
    {
        return $this->servings;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
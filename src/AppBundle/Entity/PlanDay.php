<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Doctrine\ORM\Mapping\Entity(repositoryClass="AppBundle\Repository\PlanDayRepository")
 * @Doctrine\ORM\Mapping\Table
 * @UniqueEntity("date")
 */
class PlanDay
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="date", unique=true)
     * @Assert\Date()
     * @var \DateTime
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="PlanDayIngredient", mappedBy="planDay", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @var ArrayCollection
     */
    private $planDayIngredients;

    public function __construct()
    {
        $this->date = new \DateTime();
        $this->planDayIngredients = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getPlanDayIngredients()
    {
        return $this->planDayIngredients;
    }

    /**
     * @param mixed $planDayIngredients
     */
    public function setPlanDayIngredients($planDayIngredients)
    {
        $this->planDayIngredients = $planDayIngredients;
    }
}
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

interface IngredientAmount
{
    public function getAmount();
    public function getIngredient();
}
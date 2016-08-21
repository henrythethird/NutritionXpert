<?php

namespace AppBundle\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class IngredientRepository extends EntityRepository
{
    /**
     * @param $term String
     * @return ArrayCollection
     */
    public function byNameContains($term) {
        return $this->createQueryBuilder("ingredient")
            ->andWhere("ingredient.name LIKE :searchTerm")
            ->setParameter("searchTerm", "%$term%")
            ->orderBy("ingredient.name")
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }
}
<?php

namespace AppBundle\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class IngredientRepository extends EntityRepository
{
    const CONTAINS_LIMIT = 20;
    /**
     * @param $searchTerm String
     * @return ArrayCollection
     */
    public function byNameContains($searchTerm)
    {
        $termExplode = explode(" ", $searchTerm);
        $termExplode = array_filter($termExplode, function ($val) {
            return !empty($val);
        });

        $query = $this->createQueryBuilder("ingredient");

        foreach ($termExplode as $id => $term) {
            $query
                ->andWhere("ingredient.name LIKE :searchTerm$id")
                ->setParameter("searchTerm$id", "%$term%");
        }

        return $query
            ->orderBy("ingredient.name")
            ->setMaxResults(self::CONTAINS_LIMIT)
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }
}
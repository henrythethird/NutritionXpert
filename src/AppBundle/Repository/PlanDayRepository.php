<?php

namespace AppBundle\Repository;

use AppBundle\Entity\PlanDay;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class PlanDayRepository extends EntityRepository
{
    public function findAllOrderByDate()
    {
        return $this->createQueryBuilder("planDay")
            ->orderBy("planDay.date")
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }

}
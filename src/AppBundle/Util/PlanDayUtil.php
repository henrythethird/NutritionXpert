<?php

namespace AppBundle\Util;

use AppBundle\Entity\PlanDay;
use Doctrine\Common\Collections\ArrayCollection;

class PlanDayUtil
{
    /**
     * @var array
     */
    private $planDays;

    public function __construct(array $planDays)
    {
        $this->planDays = $planDays;
    }

    /**
     * @param array $array
     * @return bool
     */
    public function krsortRecursive(&$array)
    {
        if (!is_array($array)) return false;
        krsort($array);
        foreach ($array as &$arr) {
            $this->krsortRecursive($arr);
        }
        return true;
    }

    /**
     * @return []
     */
    public function separateByTimeline()
    {
        $concat = [];
        foreach ($this->planDays as $planDay) {
            /**
             * @var PlanDay $planDay
             */
            $year = $planDay->getDate()->format('Y');
            $month = $planDay->getDate()->format('m');
            $day = $planDay->getDate()->format('d');

            $concat[$year][$month][$day] = $planDay;
        }

        $this->krsortRecursive($concat);

        return $concat;
    }
}
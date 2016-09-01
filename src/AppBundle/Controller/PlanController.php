<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PlanDay;
use AppBundle\Util\PlanDayUtil;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlanController extends Controller
{
    /**
     * @Route(path="/", name="plan_list")
     * @Template("plan/index.html.twig"))
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $planDays = $em->getRepository(PlanDay::class)
            ->findAll();

        $planDayUtil = new PlanDayUtil($planDays);

        return [
            'planDays' => $planDayUtil->separateByTimeline()
        ];
    }
}

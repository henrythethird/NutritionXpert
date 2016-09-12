<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PlanDay;
use AppBundle\Form\PlanDayForm;
use AppBundle\Util\PlanDayUtil;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @Route(path="/plan/day/{date}", name="plan_day")
     * @Template("plan/day.html.twig")
     */
    public function dayAction($date)
    {
        $em = $this->getDoctrine()->getManager();
        $days = $em->getRepository(PlanDay::class)
            ->findBy([
                'date' => new \DateTime($date)
            ]);

        return [
            'date' => $date,
            'planDays' => $days
        ];
    }

    /**
     * @Route(path="/plan/add", name="plan_add")
     * @Template("plan/add.html.twig")
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(PlanDayForm::class);

        $form->handleRequest($request);

        if ($form->isValid()) {
            /**
             * @var PlanDay $planDay
             */
            $planDay = $form->getData();

            $em = $this->getDoctrine()->getManager();

            $em->persist($planDay);
            $em->flush();

            $this->addFlash('success', 'Added');

            $this->redirectToRoute('plan_list');
        }

        return [
            'form' => $form->createView()
        ];
    }
}
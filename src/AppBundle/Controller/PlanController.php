<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PlanDay;
use AppBundle\Entity\PlanDayIngredient;
use AppBundle\Form\PlanDayForm;
use AppBundle\Form\PlanDayIngredientForm;
use AppBundle\Util\PlanDayUtil;
use AppBundle\Util\RecipeUtil;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
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
     * @Route(path="/plan/day/{id}", name="plan_day")
     * @Template("plan/day.html.twig")
     */
    public function dayAction(PlanDay $planDay, Request $request)
    {
        $recipeUtil = new RecipeUtil();
        $ingredients = $recipeUtil->summarizePlanDays($planDay);

        $planDayIngredient = new PlanDayIngredient();
        $planDayIngredient->setPlanDay($planDay);

        $addForm = $this->createForm(
            PlanDayIngredientForm::class,
            $planDayIngredient
        );
        $addForm->handleRequest($request);

        if ($addForm->isValid()) {
            $planDayIngredient = $addForm->getData();

            $em = $this->getDoctrine()->getManager();

            $em->persist($planDayIngredient);
            $em->refresh($planDay);
            $em->flush();

            $this->addFlash('success', 'Added new Ingredient');
        }

        return [
            'day' => $planDay,
            'sum' => $ingredients,
            'addForm' => $addForm->createView()
        ];
    }

    /**
     * @Route(path="/plan/ingredient/delete/{id}", name="plan_ingredient_delete")
     */
    public function deleteIngredientAction(PlanDayIngredient $ingredient)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($ingredient);
        $em->flush();

        $this->addFlash('success', 'Removed Ingredient '.$ingredient->getPlanDay()->getId());

        return $this->redirectToRoute('plan_day', [
            'id' => $ingredient->getPlanDay()->getId()
        ]);
    }

    /**
     * @Route(path="/plan/add", name="plan_add", defaults={"date"="now"})
     * @Route(path="/plan/add/{$date}")
     * @Template("plan/add.html.twig")
     */
    public function addAction(\DateTime $date, Request $request)
    {
        $form = $this->createForm(PlanDayForm::class);
        $form->get('date')
            ->setData($date);
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

            return $this->redirectToRoute('plan_day', ['date' => $planDay->getDate()->format('Y-m-d')]);
        }

        return [
            'form' => $form->createView()
        ];
    }
}
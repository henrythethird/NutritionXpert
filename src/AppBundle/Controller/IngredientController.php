<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ingredient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class IngredientController extends Controller
{
    /**
     * @Route("/ingredient", name="ingredient_list")
     * @Method("GET")
     */
    public function listAction() {
        $em = $this->getDoctrine()->getManager();
        $ingredients = $em->getRepository("AppBundle:Ingredient")->findAll();

        return $this->render('ingredient/index.html.twig', [
            'ingredients' => $ingredients
        ]);
    }

    /**
     * @Route("/ingredient/{name}", name="ingredient_show")
     * @Method("GET")
     */
    public function showAction(Ingredient $ingredient) {
        return $this->render('ingredient/show.html.twig', [
           'ingredient' => $ingredient,
            'name' => $ingredient->getName()
        ]);
    }

    public function searchAction() {

    }
}

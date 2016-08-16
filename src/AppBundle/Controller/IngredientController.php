<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class IngredientController extends Controller
{
    /**
     * @Route("/ingredient", name="ingredient_list")
     */
    public function listAction() {
        $em = $this->getDoctrine()->getManager();
        $ingredients = $em->getRepository("AppBundle:Ingredient")->findAll();

        return $this->render('ingredient/index.html.twig', [
            'ingredients' => $ingredients
        ]);
    }

    /**
     * @Route("/ingredient/{ingredientName}", name="ingredient_show")
     */
    public function showAction($ingredientName) {
        $em = $this->getDoctrine()->getManager();
        $ingredient = $em->getRepository("AppBundle:Ingredient")->findOneBy([
            'name' => $ingredientName
        ]);

        return $this->render('ingredient/show.html.twig', [
           'ingredient' => $ingredient,
            'name' => $ingredientName
        ]);
    }

    public function searchAction() {

    }
}

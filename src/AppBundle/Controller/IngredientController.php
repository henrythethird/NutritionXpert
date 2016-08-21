<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ingredient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class IngredientController extends Controller
{
    /**
     * @Route("/ingredient", name="ingredient_list")
     */
    public function listAction() {
        $ingredients = $this->getDoctrine()
            ->getRepository("AppBundle:Ingredient")
            ->findAll();

        return $this->render('ingredient/index.html.twig', [
            'ingredients' => $ingredients
        ]);
    }

    /**
     * @Route("/ingredient/details/{name}", name="ingredient_show")
     */
    public function showAction(Ingredient $ingredient) {
        return $this->render('ingredient/show.html.twig', [
           'ingredient' => $ingredient,
            'name' => $ingredient->getName()
        ]);
    }

    /**
     * @Route("/ingredient/search", name="ingredient_search")
     * @Method("GET")
     */
    public function searchAction() {
        $ingredientName = $this->get('request_stack')
            ->getCurrentRequest()
            ->get('q');

        $ingredients = $this->getDoctrine()
            ->getRepository("AppBundle:Ingredient")
            ->byNameContains($ingredientName);

        return new JsonResponse([
            'results' => $ingredients
        ]);
    }
}

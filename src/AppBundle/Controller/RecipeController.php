<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recipe;
use AppBundle\Util\RecipeUtil;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends Controller
{
    /**
     * @Route("/recipe", name="recipe_list")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $recipes = $em->getRepository("AppBundle:Recipe")
            ->findAll();

        return $this->render('recipe/index.html.twig', [
            'recipes' => $recipes
        ]);
    }

    /**
     * @Route("/recipe/{name}", name="recipe_show")
     * @Method("GET")
     */
    public function showAction(Recipe $recipe) {
        $recipeUtil = new RecipeUtil($recipe);
        return $this->render('recipe/show.html.twig', [
            'recipe' => $recipe,
            'sum' => $recipeUtil->summarizeIngredients()
        ]);
    }
}
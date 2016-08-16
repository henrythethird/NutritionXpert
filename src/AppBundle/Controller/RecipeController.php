<?php

namespace AppBundle\Controller;

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
     * @Route("/recipe/{recipeName}", name="recipe_show")
     */
    public function showAction($recipeName) {
        $em = $this->getDoctrine()->getManager();
        $recipe = $em->getRepository("AppBundle:Recipe")
            ->findOneBy([
                'name' => $recipeName
            ]);

        return $this->render('recipe/show.html.twig', [
            'recipe' => $recipe
        ]);
    }
}
<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recipe;
use AppBundle\Form\IngredientForm;
use AppBundle\Form\RecipeForm;
use AppBundle\Util\RecipeUtil;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends Controller
{
    /**
     * @Route("/recipe", name="recipe_list")
     * @Template("recipe/index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $recipes = $em->getRepository(Recipe::class)
            ->findAll();

        return [
            'recipes' => $recipes
        ];
    }

    /**
     * @Route("/recipe/details/{name}", name="recipe_show")
     * @Template("recipe/show.html.twig")
     * @Method("GET")
     */
    public function showAction(Recipe $recipe)
    {
        $recipeUtil = new RecipeUtil();
        $sum = $recipeUtil
            ->summarizeRecipeIngredients($recipe->getRecipeIngredients());
        
        return [
            'recipe' => $recipe,
            'sum' => $sum,
            'dav' => RecipeUtil::DAV
        ];
    }

    /**
     * @Route("/recipe/delete/{name}", name="recipe_delete")
     */
    public function deleteAction(Recipe $recipe)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($recipe);
        $em->flush();

        $this->addFlash('success', 'Recipe removed');
        return $this->redirectToRoute('recipe_list');
    }

    /**
     * @Route("/recipe/new", name="recipe_new")
     * @Template("recipe/add.html.twig")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(RecipeForm::class);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $recipe = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($recipe);
            $em->flush();

            $this->addFlash('success', 'Recipe added');

            return $this->redirectToRoute('recipe_list');
        }

        return [
            'form' => $form->createView()
        ];
    }

    /**
     * @Route("/recipe/edit/{name}", name="recipe_edit")
     * @Template("recipe/edit.html.twig")
     */
    public function editAction(Request $request, Recipe $recipe)
    {
        $form = $this->createForm(RecipeForm::class, $recipe);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $recipe = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($recipe);
            $em->flush();

            $this->addFlash('success', 'Recipe updated');

            return $this->redirectToRoute('recipe_list');
        }

        return [
            'form' => $form->createView()
        ];
    }
}
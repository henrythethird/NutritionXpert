<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recipe;
use AppBundle\Form\IngredientForm;
use AppBundle\Form\RecipeForm;
use AppBundle\Util\RecipeUtil;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/recipe/details/{name}", name="recipe_show")
     * @Method("GET")
     */
    public function showAction(Recipe $recipe)
    {
        $recipeUtil = new RecipeUtil($recipe);
        return $this->render('recipe/show.html.twig', [
            'recipe' => $recipe,
            'sum' => $recipeUtil->summarizeIngredients()
        ]);
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

        return $this->render('recipe/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/recipe/edit/{name}", name="recipe_edit")
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

        return $this->render('recipe/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
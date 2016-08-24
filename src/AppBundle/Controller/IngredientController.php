<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ingredient;
use AppBundle\Form\IngredientForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/ingredient/edit/{name}", name="ingredient_edit")
     */
    public function editAction(Request $request, Ingredient $ingredient)
    {
        $form = $this->createForm(IngredientForm::class, $ingredient);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $ingredient = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($ingredient);
            $em->flush();

            $this->addFlash('success', 'Ingredient updated');

            return $this->redirectToRoute('ingredient_list');
        }

        return $this->render('ingredient/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/ingredient/delete/{name}", name="ingredient_delete")
     */
    public function deleteAction(Ingredient $ingredient)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($ingredient);
        $em->flush();

        $this->addFlash('success', 'Ingredient removed');
        return $this->redirectToRoute('ingredient_list');
    }

    /**
     * @Route("/ingredient/new", name="ingredient_new")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(IngredientForm::class);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $ingredient = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($ingredient);
            $em->flush();

            $this->addFlash('success', 'Ingredient added');

            return $this->redirectToRoute('ingredient_list');
        }

        return $this->render('ingredient/add.html.twig', [
            'form' => $form->createView()
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

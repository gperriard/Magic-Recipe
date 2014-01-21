<?php

namespace Hoax\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\Common\Persistence\ObjectRepository;

use Hoax\CoreBundle\Entity\Ingredient;
use Hoax\CoreBundle\Form\IngredientType;

class IngredientController extends Controller
{
    /**
     * Return all the ingredients
     *
     * @return Response
     */
    public function indexAction()
    {
        $ingredients = $this->getIngredientRepository()->findAll();

        return $this->render(
            'HoaxCoreBundle:Ingredient:index.html.twig',
            array(
                'ingredients' => $ingredients
            )
        );
    }

    /**
     * Display form to add an ingredient
     *
     * @param Request $request
     * @return Response|RedirectResponse
     */
    public function newAction(Request $request)
    {
        $ingredient = new Ingredient();

        $form = $this->createForm(new IngredientType(), $ingredient);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ingredient);
            $em->flush();

            return $this->redirect($this->generateUrl('ingredients'));
        }

        return $this->render(
            'HoaxCoreBundle:Ingredient:new.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * Return the Ingredient repository
     *
     * @return ObjectRepository
     */
    protected function getIngredientRepository()
    {
        return $this->getDoctrine()->getRepository('HoaxCoreBundle:Ingredient');
    }
}

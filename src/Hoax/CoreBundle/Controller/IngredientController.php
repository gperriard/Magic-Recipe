<?php

namespace Hoax\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
     * Return Ingredient repository
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    protected function getIngredientRepository()
    {
        return $this->getDoctrine()->getRepository('HoaxCoreBundle:Ingredient');
    }
}

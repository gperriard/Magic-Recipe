<?php

namespace Hoax\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Doctrine\Common\Persistence\ObjectRepository;

class RecipeController extends Controller
{
    /**
     * Return all the recipes
     *
     * @return Response
     */
    public function indexAction()
    {
        $recipes = $this->getRecipeRepository()->findAll();

        return $this->render(
            'HoaxCoreBundle:Recipe:index.html.twig',
            array(
                'recipes' => $recipes
            )
        );
    }

    /**
     * Return the Recipe repository
     * 
     * @return ObjectRepository
     */
    protected function getRecipeRepository()
    {
        return $this->getDoctrine()->getRepository('HoaxCoreBundle:Recipe');
    }
}

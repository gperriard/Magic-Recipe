<?php

namespace Hoax\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * Return a sample text
     *
     * @return Response
     */
    public function indexAction()
    {
        return new Response('Hello World', 200);
    }
}

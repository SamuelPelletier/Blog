<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ExerciseController extends Controller
{
    
    /**
     * @Route("/{users}", name="users")
     */
    public function testAction()
    {
    	return new Response('Hello', Response::HTTP_OK, array('X-My-Header'=>"J'ai fait un header"));
    }
}

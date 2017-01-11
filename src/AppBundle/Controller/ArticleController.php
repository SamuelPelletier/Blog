<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller{

	/**
	* @Route("/", name="homepage")
	*/
	public function indexAction(Request $request)
	{
		// replace this example code with whatever you need
		return $this->render('article/index.html.twig', [
				'base_dir' => 'Hello',
		]);
	}
	
	/**
	 * @Route("/{id}",requirements={"id" = "\d+"}, defaults={"id" = 1}, name="show_article")
	 */
	public function showAction(Request $request, $id)
	{
		return $this->render('article/show.html.twig',array('id'=>$id));
	}
}
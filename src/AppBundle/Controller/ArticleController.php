<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;



/**
 * @Route("/article")
 */

class ArticleController extends Controller{

	/**
	* @Route("/", name="article_homepage")
	*/
	public function indexAction(Request $request)
	{
		// replace this example code with whatever you need
		return $this->render('article/index.html.twig', [
				'base_dir' => 'Hello',
		]);
	}
	
	/**
	 * @Route("/{id}",requirements={"id" = "\d+"}, defaults={"id" = 1}, name="article_show")
	 */
	public function showAction(Request $request, $id)
	{
		return $this->render('article/show.html.twig',array('id'=>$id));
	}
	
	/**
	 * @Route("/add", name="artcile_add")
	 */
	public function addAction(){
		$article = new Article();
		$form = $this->createForm(ArticleType::class, $article);
		return $this->render('article/add.html.twig', array('articleForm'=>$form->createView()));
	}
}
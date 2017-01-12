<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @Route("/article")
 */
class ArticleController extends Controller
{

    /**
     * @Route("/", name="article_homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('article/index.html.twig', [
            'base_dir' => 'Hello'
        ]);
    }

    /**
     * @Route("/{id}",requirements={"id" = "\d+"}, defaults={"id" = 1}, name="article_show")
     */
    public function showAction(Request $request, $id)
    {
        return $this->render('article/show.html.twig', array(
            'id' => $id
        ));
    }

    /**
     * @Route("/add", name="article_add")
     */
    public function addAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $em = $this->getDoctrine()->getManager();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('image.uploader')->upload($article);
            $em->persist($article);
            $em->flush();

            $this->addFlash('success', 'The article was save !');

            return $this->redirectToRoute('article_homepage');
        }

        return $this->render('article/add.html.twig', array(
            'articleForm' => $form->createView()
        ));
    }

    /**
     * @Route("/update/{id}", name="article_update",requirements={"id" = "\d+"})
     */
    public function updateAction(Article $article, Request $request)
    {
        $articleImgPath = $article->getHeaderImage();
        $article->setHeaderImage(new File($this->getParameter('file_path') . $articleImgPath));
        $form = $this->createForm(ArticleType::class, $article);
        $em = $this->getDoctrine()->getManager();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();

            $this->addFlash('success', 'The article was upadte successefuly !');

            return $this->redirectToRoute('article_homepage');
        }

        return $this->render('article/add.html.twig', array(
            'articleForm' => $form->createView(),
            'article' => $article,
            'oldArticleImage' => $articleImgPath
        ));
    }
}
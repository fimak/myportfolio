<?php

namespace Fimak\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $articles = $em->getRepository('FimakSiteBundle:Article')
            ->getLatestArticles();

        return $this->render('FimakSiteBundle:Article:index.html.twig', array(
            'articles' => $articles
        ));
    }

    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('FimakSiteBundle:Article')->find($id);

        if (!$article) {
            throw $this->createNotFoundException('Unable to find article.');
        }

        $comments = $em->getRepository('FimakSiteBundle:Comment')
            ->getCommentsForArticle($article->getId());

        return $this->render('FimakSiteBundle:Article:view.html.twig', array(
            'article' => $article,
            'comments' => $comments
        ));
    }
}
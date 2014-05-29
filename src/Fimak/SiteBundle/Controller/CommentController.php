<?php

namespace Fimak\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Fimak\SiteBundle\Entity\Comment;
use Fimak\SiteBundle\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends Controller
{
    public function newAction($article_id)
    {
        $article = $this->getArticle($article_id);

        $comment = new Comment();
        $comment->setArticle($article);
        $form = $this->createForm(new CommentType(), $comment);

        return $this->render('FimakSiteBundle:Comment:form.html.twig', array(
            'comment' => $comment,
            'form' => $form->createView()
        ));
    }

    public function createAction(Request $request, $article_id)
    {
        $article = $this->getArticle($article_id);

        $comment  = new Comment();
        $comment->setArticle($article);
        $form = $this->createForm(new CommentType(), $comment);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()
                ->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirect($this->generateUrl('fimak_site_article_view', array(
                    'id' => $comment->getArticle()->getId())) . '#comment-' . $comment->getId()
            );
        }

        return $this->render('FimakSiteBundle:Comment:create.html.twig', array(
            'comment' => $comment,
            'form'    => $form->createView()
        ));
    }

    protected function getArticle($article_id)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $article = $em->getRepository('FimakSiteBundle:Article')->find($article_id);

        if (!$article) {
            throw $this->createNotFoundException('Unable to find article.');
        }

        return $article;
    }
}
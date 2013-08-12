<?php
// src/Blogger/BlogBundle/Controller/CommentController.php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Entity\Comment;
use Blogger\BlogBundle\Form\CommentType;

/**
 * Comment controller.
 */
class CommentController extends Controller
{ 
  
    public function newAction($article_id)
    {
        $article = $this->getBlog($article_id);
        $comment = new Comment();
        $comment->setArticle($article);
        $form   = $this->createForm(new CommentType(), $comment);

        return $this->render('BlogBundle:Comment:form.html.twig', array(
            'comment' => $comment,
            'form'   => $form->createView()
        ));
    }

    public function createAction($article_id)
    {
        $article = $this->getArticle($article_id);

        $comment  = new Comment();
        $comment->setArticle($article);
        $request = $this->getRequest();
        $form    = $this->createForm(new CommentType(), $comment);
        $form->bindRequest($request);

        if ($form->isValid()) {
            // TODO: Persist the comment entity

            return $this->redirect($this->generateUrl('blog_show_article', array(
                'id' => $comment->getArticle()->getId())) .
                '#comment-' . $comment->getId()
            );
        }

        return $this->render('BlogBundle:Comment:create.html.twig', array(
            'comment' => $comment,
            'form'    => $form->createView()
        ));
    }

    protected function getBlog($article_id)
    {
        $em = $this->getDoctrine()
                    ->getManager();

        $article = $em->getRepository('BlogBundle:Article')->find($article_id);

        if (!$article) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $blog;
    }

}
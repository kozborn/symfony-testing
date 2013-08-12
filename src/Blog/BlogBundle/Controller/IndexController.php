<?php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $blogArticles = $em->getRepository('BlogBundle:Article')->getLatestArticles();

        if (!$blogArticles) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
      
        return $this->render('BlogBundle:Index:index.html.twig', array(
            'blogArticles'=>$blogArticles,
        ));
    }
    
    public function showAction($id){
        $em = $this->getDoctrine()->getManager();

        $blogArticle = $em->getRepository('BlogBundle:Article')->find($id);

        if (!$blogArticle) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
      
        $comments = $em->getRepository('BlogBundle:Comment')
                   ->getCommentsForArticle($blogArticle->getId());
        
      return $this->render('BlogBundle:Index:show.html.twig', array(
          'id'=>$id,
          'blogArticle'=> $blogArticle,
          'comments'=>$comments,
          ));
    }
}

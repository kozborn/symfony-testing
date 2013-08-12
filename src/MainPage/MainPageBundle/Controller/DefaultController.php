<?php

namespace MainPage\MainPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MainPageBundle:Default:index.html.twig', array());
    }
}

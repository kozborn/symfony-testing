<?php

namespace Test\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller
{
    public function indexAction()
    {
        return $this->render('TestBundle:Test:index.html.twig', array());
    }
    
    public function testAction()
    {
        return $this->render('TestBundle:Test:test.html.twig', array());
    }
}

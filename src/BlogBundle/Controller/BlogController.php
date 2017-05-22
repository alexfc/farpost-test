<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('BlogBundle:Blog:index.html.twig');
    }

    /**
     * @Route("/posts/{id}")
     */
    public function showAction($id)
    {
        return $this->render('BlogBundle:Blog:show.html.twig');
    }
}

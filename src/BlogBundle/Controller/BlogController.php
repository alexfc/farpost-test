<?php

namespace BlogBundle\Controller;

use BlogBundle\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BlogController extends Controller
{

    /**
     * @Route("/{page}", defaults={"page" = 1}, name="blog_index")
     */
    public function indexAction($page)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $paginator = $entityManager->getRepository('BlogBundle:Post')->getLatestPosts($page);

        $posts = $paginator->getIterator();

        if (count($posts) == 0) {
            throw new NotFoundHttpException('404. Page not found');
        }

        $maxPages = ceil($paginator->count() / PostRepository::POSTS_PER_PAGE);
        $currentPage = $page;
        $routeName = 'blog_index';

        return $this->render('BlogBundle:Blog:index.html.twig', compact('posts', 'maxPages', 'currentPage', 'routeName'));
    }

    /**
     * @Route("/posts/{id}", name="post_show")
     */
    public function showAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $post = $entityManager->getRepository('BlogBundle:Post')->find($id);

        if (is_null($post)) {
            throw new NotFoundHttpException('404. Page not found');
        }

        return $this->render('BlogBundle:Blog:show.html.twig', compact('post'));
    }
}

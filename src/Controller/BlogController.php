<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     * @param ArticleRepository $articleRepository
     * @return Response
     */
    public function index(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->findAll();
        return $this->render('blog/index.html.twig', [
            'page_name' => 'Blog',
            'page_description' => 'A blog.',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/blog/{slug}", name="article")
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        /** @var Article $article */
        $article = $repository->findOneBy(['slug' => $slug]);

        return $this->render('blog/article.html.twig', [
            'page_name' => $article->getName(),
            'page_description' => $article->getDescription(),
            'article' => $article
        ]);
    }
}

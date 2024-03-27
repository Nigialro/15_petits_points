<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Article;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(Request $request, ManagerRegistry $registry): Response
    {
        $entityManager = $registry->getManager();
        $articles = $entityManager->getRepository(Article::class)->createQueryBuilder('i')
        ->orderBy('i.id', 'DESC')
        ->getQuery()
        ->getResult();

        $articleId = $request->query->get('articleId');
        $selectedArticle = null;

        if ($articleId !== null) {
            foreach ($articles as $article) {
                if ($article->getId() == $articleId) {
                    $selectedArticle = $article;
                    break;
                }
            }
        }

        return $this->render('pages/index.html.twig', [
            'controller_name' => 'DefaultController',
            'articles' => $articles,
            'selectedArticle' => $selectedArticle,
        ]);
    }

    #[Route('/mentions', name: 'app_legal')]
    public function legal(): Response
    {
        return $this->render('pages/legal.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}

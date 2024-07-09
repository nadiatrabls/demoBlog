<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }


    #[Route('/', name: 'home')]
    public function home(ArticleRepository $repo): Response
    {
        //pour récupéré le repository, je le passe en paramétre de la méthode home()
        //cela s'appel une injection de dépendance
        $articles = $repo->findAll();
        //j'utilise la méthode findAll() pour récupérer tous les articles en bdd

        //render() permet de crée une vue en sélectionnant un template et en lui passant de la données

        return $this->render('blog/home.html.twig', [
            'articles' => $articles //j'envoi tout les articles sur la vue 
            
        ]);
    }
    
    #[Route('/blog/{id}', name: 'blog_show')]
    public function show(Article $article): Response
    {
        
        return $this->render('blog/show.html.twig',[
               'article'=> $article 
        ]);
            
       
    }
}

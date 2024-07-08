<?php

namespace App\DataFixtures;
use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i= 1; $i<= 10; $i++){
            //on instancie la classe article qui se trouve dans le dossier app/entity
            $article = new Article();
            //nous pouvons maintenant faire appel au setter pour crée des articles
            $article->setTitle("Titre de l'article n°$1")
                    ->setContent("<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée</p>")
                    ->setImage("https://picsum.photos/250/150")
                    ->setCreatedAt( new \DateTime());//on instancie la classe datetime() pour fomater la date
            $manager->persist($article);//permer de faire persister l'article dans le temps: stocker
        }
        // $product = new Product();
        // $manager->persist($product);

        // la méthode flush() lance la requete SQL qui va enregistré les articles en bdd
        $manager->flush();
    }
}

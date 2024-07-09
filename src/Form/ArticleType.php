<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // l'objet $builder permet ce créer un formulaire
        //la méthode add() permet d'ajouter des champs au formulaire 
        $builder
            ->add('title')
            ->add('content', TextType::class)
            ->add('image')
            //->add('createdAt') 
            //nous allons commenter ce champ car nous ne voulons pas que l'utilisateur
            //rentre lui meme la date de création de l'article. cela sera fait lors du traitement
            //du formulaire, avant l'insertion de l'article
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}

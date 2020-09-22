<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('tristantheb')
            ->setPassword('azerty123')
            ->setCreatedOn(new \DateTime('now'));

        $article = new Article();
        $article->setName('Je suis un article')
            ->setSlug('je-suis-un-article')
            ->setDescription('Je suis la description de l\'article')
            ->setAuthor($user)
            ->setTag('Article')
            ->setContent('Bla bla bla bla bla bla bla bla bla bla')
            ->setCreatedOn(new \DateTime('now'));

        $manager->persist($user);
        $manager->persist($article);

        $manager->flush();
    }
}

<?php

namespace Fimak\SiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Fimak\SiteBundle\Entity\Comment;

class CommentFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comment = new Comment();
        $comment->setAuthor('symfony');
        $comment->setComment('To make a long story short. You can\'t go wrong by choosing Symfony! And no one has ever been fired for using Symfony.');
        $comment->setArticle($manager->merge($this->getReference('article-1')));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('David');
        $comment->setComment('To make a long story short. Choosing a framework must not be taken lightly; it is a long-term commitment. Make sure that you make the right selection!');
        $comment->setArticle($manager->merge($this->getReference('article-1')));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Dade');
        $comment->setComment('Anything else, mom? You want me to mow the lawn? Oops! I forgot, New York, No grass.');
        $comment->setArticle($manager->merge($this->getReference('article-2')));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Kate');
        $comment->setComment('Are you challenging me? ');
        $comment->setArticle($manager->merge($this->getReference('article-2')));
        $comment->setCreated(new \DateTime("2011-07-23 06:15:20"));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Dade');
        $comment->setComment('Name your stakes.');
        $comment->setArticle($manager->merge($this->getReference('article-2')));
        $comment->setCreated(new \DateTime("2011-07-23 06:18:35"));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Kate');
        $comment->setComment('If I win, you become my slave.');
        $comment->setArticle($manager->merge($this->getReference('article-2')));
        $comment->setCreated(new \DateTime("2011-07-23 06:22:53"));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Dade');
        $comment->setComment('Your SLAVE?');
        $comment->setArticle($manager->merge($this->getReference('article-2')));
        $comment->setCreated(new \DateTime("2011-07-23 06:25:15"));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Kate');
        $comment->setComment('You wish! You\'ll do shitwork, scan, crack copyrights...');
        $comment->setArticle($manager->merge($this->getReference('article-2')));
        $comment->setCreated(new \DateTime("2011-07-23 06:46:08"));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Dade');
        $comment->setComment('And if I win?');
        $comment->setArticle($manager->merge($this->getReference('article-2')));
        $comment->setCreated(new \DateTime("2011-07-23 10:22:46"));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Kate');
        $comment->setComment('Make it my first-born!');
        $comment->setArticle($manager->merge($this->getReference('article-2')));
        $comment->setCreated(new \DateTime("2011-07-23 11:08:08"));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Dade');
        $comment->setComment('Make it our first-date!');
        $comment->setArticle($manager->merge($this->getReference('article-2')));
        $comment->setCreated(new \DateTime("2011-07-24 18:56:01"));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Kate');
        $comment->setComment('I don\'t DO dates. But I don\'t lose either, so you\'re on!');
        $comment->setArticle($manager->merge($this->getReference('article-2')));
        $comment->setCreated(new \DateTime("2011-07-25 22:28:42"));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Stanley');
        $comment->setComment('It\'s not gonna end like this.');
        $comment->setArticle($manager->merge($this->getReference('article-3')));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Gabriel');
        $comment->setComment('Oh, come on, Stan. Not everything ends the way you think it should. Besides, audiences love happy endings.');
        $comment->setArticle($manager->merge($this->getReference('article-3')));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Mile');
        $comment->setComment('Doesn\'t Bill Gates have something like that?');
        $comment->setArticle($manager->merge($this->getReference('article-5')));
        $manager->persist($comment);

        $comment = new Comment();
        $comment->setAuthor('Gary');
        $comment->setComment('Bill Who?');
        $comment->setArticle($manager->merge($this->getReference('article-5')));
        $manager->persist($comment);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
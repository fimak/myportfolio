<?php

namespace Fimak\SiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Fimak\SiteBundle\Entity\Article;

class ArticleFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $article1 = new Article();
        $article1->setTitle('A day with Symfony2');
        $article1->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        //$article1->setImage('beach.jpg');
        $article1->setAuthor('FIMAk');
        $article1->setTags('symfony2, php, portfolio');
        $article1->setCreated(new \DateTime());
        $article1->setUpdated($article1->getCreated());
        $manager->persist($article1);

        $article2 = new article();
        $article2->setTitle('The pool on the roof must have a leak');
        $article2->setBody('Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis.');
        //$article2->setImage('pool_leak.jpg');
        $article2->setAuthor('Zero Cool');
        $article2->setTags('pool, leaky, hacked, movie, hacking, symarticle');
        $article2->setCreated(new \DateTime("2011-07-23 06:12:33"));
        $article2->setUpdated($article2->getCreated());
        $manager->persist($article2);

        $article3 = new article();
        $article3->setTitle('Misdirection. What the eyes see and the ears hear, the mind believes');
        $article3->setBody('Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        //$article3->setImage('misdirection.jpg');
        $article3->setAuthor('Gabriel');
        $article3->setTags('misdirection, magic, movie, hacking, symarticle');
        $article3->setCreated(new \DateTime("2011-07-16 16:14:06"));
        $article3->setUpdated($article3->getCreated());
        $manager->persist($article3);

        $article4 = new article();
        $article4->setTitle('The grid - A digital frontier');
        $article4->setBody('Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.');
        //$article4->setImage('the_grid.jpg');
        $article4->setAuthor('Kevin Flynn');
        $article4->setTags('grid, daftpunk, movie, symarticle');
        $article4->setCreated(new \DateTime("2011-06-02 18:54:12"));
        $article4->setUpdated($article4->getCreated());
        $manager->persist($article4);

        $article5 = new article();
        $article5->setTitle('You\'re either a one or a zero. Alive or dead');
        $article5->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        //$article5->setImage('one_or_zero.jpg');
        $article5->setAuthor('Gary Winston');
        $article5->setTags('binary, one, zero, alive, dead, !trusting, movie, symarticle');
        $article5->setCreated(new \DateTime("2011-04-25 15:34:18"));
        $article5->setUpdated($article5->getCreated());
        $manager->persist($article5);

        $manager->flush();

        $this->addReference('article-1', $article1);
        $this->addReference('article-2', $article2);
        $this->addReference('article-3', $article3);
        $this->addReference('article-4', $article4);
        $this->addReference('article-5', $article5);
    }

    public function getOrder()
    {
        return 1;
    }
}
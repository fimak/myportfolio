<?php

namespace Fimak\SiteBundle\Tests\Entity;

use Fimak\SiteBundle\Entity\Article;

class ArticleTest extends \PHPUnit_Framework_TestCase
{
    public function testSlugify()
    {
        $article = new Article();

        $this->assertEquals('hello-world', $article->slugify('Hello World'));
        $this->assertEquals('a-day-with-symfony2', $article->slugify('A Day With Symfony2'));
        $this->assertEquals('hello-world', $article->slugify('Hello    world'));
        $this->assertEquals('symblog', $article->slugify('symblog '));
        $this->assertEquals('symblog', $article->slugify(' symblog'));
    }

    public function testSetSlug()
    {
        $blog = new Article();

        $blog->setSlug('Symfony2 Blog');
        $this->assertEquals('symfony2-blog', $blog->getSlug());
    }

    public function testSetTitle()
    {
        $blog = new Article();

        $blog->setTitle('Hello World');
        $this->assertEquals('hello-world', $blog->getSlug());
    }
}
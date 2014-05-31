<?php

namespace Fimak\SiteBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testAbout()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/about');

        $this->assertEquals(1, $crawler->filter('h1:contains("About me")')->count());
    }

    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        // Check there are some blog entries on the page
        $this->assertTrue($crawler->filter('article.article')->count() > 0);

        // Find the first link, get the title, ensure this is loaded on the next page
        $articleLink   = $crawler->filter('article.article h2 a')->first();
        $articleTitle  = $articleLink->text();
        $crawler    = $client->click($articleLink->link());

        // Check the h2 has the blog title in it
        $this->assertEquals(1, $crawler->filter('h2:contains("' . $articleTitle .'")')->count());
    }



    // todo: add test for contact action
}
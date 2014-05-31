<?php

namespace Fimak\SiteBundle\Tests\Entity\Repository;

use Fimak\SiteBundle\Entity\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleRepositoryTest extends WebTestCase
{
    /**
     * @var \Fimak\SiteBundle\Entity\Repository\ArticleRepository
     */
    private $articleRepository;

    public function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $this->articleRepository = $kernel->getContainer()
            ->get('doctrine.orm.entity_manager')
            ->getRepository('FimakSiteBundle:Article');
    }

    public function testGetTags()
    {
        $tags = $this->articleRepository->getTags();

        $this->assertTrue(count($tags) > 1);
        $this->assertContains('php', $tags);
    }

    public function testGetTagWeights()
    {
        $tagsWeight = $this->articleRepository->getTagWeights(
            array('php', 'code', 'code')
        );

        $this->assertTrue(count($tagsWeight) > 1);

        // Test case where count is over max weight of 5
        $tagsWeight = $this->articleRepository->getTagWeights(
            array_fill(0, 10, 'php')
        );

        $this->assertTrue(count($tagsWeight) >= 1);

        // Test case with multiple counts over max weight of 5
        $tagsWeight = $this->articleRepository->getTagWeights(
            array_merge(array_fill(0, 10, 'php'), array_fill(0, 2, 'html'), array_fill(0, 6, 'js'))
        );

        $this->assertEquals(5, $tagsWeight['php']);
        $this->assertEquals(3, $tagsWeight['js']);
        $this->assertEquals(1, $tagsWeight['html']);

        // Test empty case
        $tagsWeight = $this->articleRepository->getTagWeights(array());

        $this->assertEmpty($tagsWeight);
    }
}
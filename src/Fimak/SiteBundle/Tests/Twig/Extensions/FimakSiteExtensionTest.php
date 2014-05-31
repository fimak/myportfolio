<?php

namespace articleger\articleBundle\Tests\Twig\Extensions;

use Fimak\SiteBundle\Twig\Extensions\FimakSiteExtension;

class FimakSiteExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatedAgo()
    {
        $article = new FimakSiteExtension();

        $this->assertEquals("0 seconds ago", $article->createdAgo(new \DateTime()));
        $this->assertEquals("34 seconds ago", $article->createdAgo($this->getDateTime(-34)));
        $this->assertEquals("1 minute ago", $article->createdAgo($this->getDateTime(-60)));
        $this->assertEquals("2 minutes ago", $article->createdAgo($this->getDateTime(-120)));
        $this->assertEquals("1 hour ago", $article->createdAgo($this->getDateTime(-3600)));
        $this->assertEquals("1 hour ago", $article->createdAgo($this->getDateTime(-3601)));
        $this->assertEquals("2 hours ago", $article->createdAgo($this->getDateTime(-7200)));

        // Cannot create time in the future
        $this->setExpectedException('\InvalidArgumentException');
        $article->createdAgo($this->getDateTime(60));
    }

    protected function getDateTime($delta)
    {
        return new \DateTime(date("Y-m-d H:i:s", time()+$delta));
    }
}
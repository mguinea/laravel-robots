<?php

namespace Robots\Tests;

class RobotsTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testAddAllow()
    {
        $this->robots->reset();
        $this->robots->addAllow('foo');
        $this->assertEquals('Allow: foo', $this->robots->generate());
    }

    public function testAddAllows()
    {
        $this->robots->reset();
        $this->robots->addAllow(['foo', 'bar']);
        $this->assertEquals("Allow: foo\nAllow: bar", $this->robots->generate());
    }

    public function testAddComments()
    {
        $this->robots->reset();
        $this->robots->addComment('foo');
        $this->assertEquals('# foo', $this->robots->generate());
    }

    public function testAddDisallow()
    {
        $this->robots->reset();
        $this->robots->addDisallow('foo');
        $this->assertEquals('Disallow: foo', $this->robots->generate());
    }

    public function testAddDisallowAll()
    {
        $this->robots->reset();
        $this->robots->addDisallow('/');
        $this->assertEquals('Disallow: /', $this->robots->generate());
    }

    public function testAddDisallows()
    {
        $this->robots->reset();
        $this->robots->addDisallow(['foo', 'bar']);
        $this->assertEquals("Disallow: foo\nDisallow: bar", $this->robots->generate());
    }

    public function testAddHost()
    {
        $this->robots->reset();
        $this->robots->addHost('foo');
        $this->assertEquals('Host: foo', $this->robots->generate());
    }

    public function testAddHosts()
    {
        $this->robots->reset();
        $this->robots->addHost(['foo', 'bar']);
        $this->assertEquals("Host: foo\nHost: bar", $this->robots->generate());
    }

    public function testAddSitemap()
    {
        $this->robots->reset();
        $this->robots->addSitemap('foo');
        $this->assertEquals('Sitemap: foo', $this->robots->generate());
    }

    public function testAddSitemaps()
    {
        $this->robots->reset();
        $this->robots->addSitemap('foo');
        $this->robots->addSitemap('bar');
        $this->assertEquals("Sitemap: foo\nSitemap: bar", $this->robots->generate());
    }

    public function testAddSpacer()
    {
        $this->robots->reset();
        $this->robots->addSpacer();
        $this->assertEquals('', $this->robots->generate());
    }

    public function testAddUserAgent()
    {
        $this->robots->reset();
        $this->robots->addUserAgent('foo');
        $this->assertEquals('User-agent: foo', $this->robots->generate());
    }

    public function testConcatenate()
    {
        $response = $this->robots->reset()
            ->addUserAgent('foo')
            ->generate();
        $this->assertEquals('User-agent: foo', $response);
    }
}

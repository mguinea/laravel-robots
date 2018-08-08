<?php

namespace Robots\Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Robots\Facades\Robots;

class RobotsFacadeTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testFacadeAddAllow()
    {
        Robots::reset();

        Robots::addAllow('foo');

        $this->assertEquals('Allow: foo', Robots::generate());
    }


    public function testFacadeAddComments()
    {
        Robots::reset();

        Robots::addComment('foo');

		$this->assertEquals('# foo', Robots::generate());
    }

    public function testFacadeAddDisallow()
    {
        Robots::reset();

        Robots::addDisallow('foo');

		$this->assertEquals('Disallow: foo', Robots::generate());
    }

    public function testFacadeAddHost()
    {
        Robots::reset();

        Robots::addHost('foo');

		$this->assertEquals('Host: foo', Robots::generate());
    }

    public function testFacadeAddSitemap()
    {
        Robots::reset();

        Robots::addSitemap('foo');

		$this->assertEquals('Sitemap: foo', Robots::generate());
    }

    public function testFacadeAddSpacer()
    {
        Robots::reset();

        Robots::addSpacer();

		$this->assertEquals('', Robots::generate());
    }

    public function testFacadeAddUserAgent()
    {
        Robots::reset();

        Robots::addUserAgent('foo');

		$this->assertEquals('User-agent: foo', Robots::generate());
    }
}
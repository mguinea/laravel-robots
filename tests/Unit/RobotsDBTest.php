<?php

namespace Robots\Tests;

use Robots\Models\RobotsRow;
use Robots\Robots;

class RobotsDBTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testAddDBAllow()
    {
        $expected = 'Allow: foo';

        RobotsRow::create([
            'type' => Robots::ALLOW,
            'action' => 'foo',
        ]);

        $arrayDBRows = RobotsRow::generateArray();

        $robots = new Robots($arrayDBRows);

        $this->assertEquals($expected, $robots->generate());
    }

    public function testAddDBDisallow()
    {
        $expected = 'Disallow: foo';

        RobotsRow::create([
            'type' => Robots::DISALLOW,
            'action' => 'foo',
        ]);

        $arrayDBRows = RobotsRow::generateArray();

        $robots = new Robots($arrayDBRows);

        $this->assertEquals($expected, $robots->generate());
    }

    public function testAddDBUserAgent()
    {
        $expected = 'User-agent: foo';

        RobotsRow::create([
            'type' => Robots::USER_AGENT,
            'action' => 'foo',
        ]);

        $arrayDBRows = RobotsRow::generateArray();

        $robots = new Robots($arrayDBRows);

        $this->assertEquals($expected, $robots->generate());
    }

    public function testAddDBHost()
    {
        $expected = 'Host: foo';

        RobotsRow::create([
            'type' => Robots::HOST,
            'action' => 'foo',
        ]);

        $arrayDBRows = RobotsRow::generateArray();

        $robots = new Robots($arrayDBRows);

        $this->assertEquals($expected, $robots->generate());
    }

    public function testAddDBSitemap()
    {
        $expected = 'Sitemap: foo';

        RobotsRow::create([
            'type' => Robots::SITEMAP,
            'action' => 'foo',
        ]);

        $arrayDBRows = RobotsRow::generateArray();

        $robots = new Robots($arrayDBRows);

        $this->assertEquals($expected, $robots->generate());
    }
}

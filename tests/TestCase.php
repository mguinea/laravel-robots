<?php

namespace Robots\Tests;

use Illuminate\Database\Schema\Blueprint;
use Orchestra\Testbench\TestCase as Orchestra;
use Robots\Robots;

abstract class TestCase extends Orchestra
{
    /** @var \Robots\Robots */
    protected $robots;

    public function setUp()
    {
        parent::setUp();

        $this->robots = new Robots;
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Robots\RobotsServiceProvider::class
        ];
    }
}

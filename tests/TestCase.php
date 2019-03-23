<?php

namespace Robots\Tests;

use Robots\Robots;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /** @var \Robots\Robots */
    protected $robots;

    public function setUp(): void
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
            \Robots\RobotsServiceProvider::class,
        ];
    }
}

<?php

namespace Robots\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Robots\Robots;

abstract class TestCase extends Orchestra
{
    /** @var \Robots\Robots */
    protected $robots;

    public function setUp(): void
    {
        parent::setUp();

        $this->robots = new Robots;

        $this->setUpDatabase($this->app);
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

    /**
     * Set up the database.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase($app)
    {
        include_once __DIR__.'/../database/migrations/create_robots_tables.php.stub';

        (new \CreateRobotsTables())->up();
    }
}

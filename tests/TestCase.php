<?php

namespace Mguinea\Robots\Tests;

use Mguinea\Robots\Robots;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /** @var \Mguinea\Robots\Robots */
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
            \Mguinea\Robots\RobotsServiceProvider::class,
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

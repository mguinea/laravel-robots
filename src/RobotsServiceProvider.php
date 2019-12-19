<?php

namespace Robots;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class RobotsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Filesystem $filesystem)
    {
        $this->publishes([
            __DIR__.'/../config/robots.php' => config_path('robots.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../database/migrations/create_robots_tables.php.stub' => $this->getMigrationFileName($filesystem),
        ], 'migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('robots', function ($app) {
            return new Robots();
        });

        $this->app->alias('robots', 'Robots\Robots');

        $this->mergeConfigFrom(
            __DIR__.'/../config/robots.php',
            'robots'
        );
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His');

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path.'*_create_robots_tables.php');
            })->push($this->app->databasePath()."/migrations/{$timestamp}_create_robots_tables.php")
            ->first();
    }
}

<?php

namespace Robots;

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
    public function boot()
    {
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
    }
}

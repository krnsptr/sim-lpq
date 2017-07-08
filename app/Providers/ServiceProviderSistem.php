<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Sistem;

class ServiceProviderSistem extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Sistem::class, function ($app) {
            //return $app['cache']->remember('site.sistem', 1, function () {
               // return Sistem::first()->toArray();
            //});
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Sistem::class];
    }
}

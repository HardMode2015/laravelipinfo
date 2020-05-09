<?php

namespace hardmode\laravelipinfo;

use Illuminate\Support\ServiceProvider;

class laravelipinfoServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'ipinfo');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'ipinfo');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravelipinfo.php', 'laravelipinfo');

        // Register the service the package provides.
        $this->app->singleton('laravelipinfo', function ($app) {
            return new laravelipinfo;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelipinfo'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravelipinfo.php' => config_path('laravelipinfo.php'),
        ], 'laravelipinfo.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/ipinfo'),
        ], 'laravelipinfo.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/ipinfo'),
        ], 'laravelipinfo.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/ipinfo'),
        ], 'laravelipinfo.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}

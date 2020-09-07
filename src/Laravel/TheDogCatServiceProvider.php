<?php

namespace TheDogCat\Laravel;

use Illuminate\Contracts\Container\Container as Application;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use TheDogCat\TheDogApi;
use TheDogCat\TheCatApi;

/**
 * Class TheDogCatServiceProvider.
 */
class TheDogCatServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * The path of Config File.
     *
     * @var string
     */
    const CONFIG_PATH = __DIR__ . '/config/the-dog-cat.php';

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig($this->app);
    }

    /**
     * Setup the config.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     */
    protected function setupConfig(Application $app)
    {
        if ($app instanceof LaravelApplication && $app->runningInConsole()) {
            $this->publishes([self::CONFIG_PATH => config_path('the-dog-cat.php')]);
        } elseif ($app instanceof LumenApplication) {
            $app->configure('the-dog-cat');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings($this->app);
    }

    /**
     * Register the bindings.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     */
    protected function registerBindings(Application $app)
    {
        $this->mergeConfigFrom(self::CONFIG_PATH, 'the-dog-cat');

        $app->singleton('the-dog-cat', function ($app) {
            return new TheDogApi();
        });

        //$app->alias('dog.api', TheDogApi::class);
        //$app->alias('cat.api', TheCatApi::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['the-dog-cat'];
    }
}
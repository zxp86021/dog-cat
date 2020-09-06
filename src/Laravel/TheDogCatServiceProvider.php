<?php

namespace TheDogCat\Laravel;

use Illuminate\Contracts\Container\Container as Application;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

/**
 * Class TheDogCatServiceProvider.
 */
class TheDogCatServiceProvider extends ServiceProvider
{
    /** @var bool Indicates if loading of the provider is deferred. */
    protected $defer = true;

    /** Boot the service provider. */
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
        $source = __DIR__ . '/config/the-dog-cat.php';

        if ($app instanceof LaravelApplication && $app->runningInConsole()) {
            $this->publishes([$source => config_path('the-dog-cat.php')]);
        } elseif ($app instanceof LumenApplication) {
            $app->configure('the-dog-cat');
        }

        $this->mergeConfigFrom($source, 'the-dog-cat');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerManager($this->app);
        $this->registerBindings($this->app);
    }

    /**
     * Register the manager class.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     */
    protected function registerManager(Application $app)
    {
        //
    }

    /**
     * Register the bindings.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     */
    protected function registerBindings(Application $app)
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['the-dog-cat',];
    }
}
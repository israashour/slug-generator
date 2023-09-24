<?php

namespace Slg\SlugGenerator;

use Illuminate\Support\ServiceProvider;

class SlugGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'slg');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'slg');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        // Publishing the views.
        $this->publishes([
            _DIR_.'/resources/views' => resource_path('views/vendor/slug-generator'),
            _DIR_.'/routes/web.php' => base_path('routes/slug-generator.php'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/slug-generator.php', 'slug-generator');

        // Register the service the package provides.
        $this->app->singleton('slug-generator', function ($app) {
            return new SlugGenerator;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['slug-generator'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/slug-generator.php' => config_path('slug-generator.php'),
        ], 'slug-generator.config');

        // Publishing the views.
        // $this->publishes([
        //     __DIR__.'/../resources/views' => base_path('resources/views/vendor/slg'),
        // ], 'slug-generator.views');

        // Publishing the routes.
        // $this->publishes([
        //     __DIR__.'/../routes/web.php' => base_path('routes/vendor/slg'),
        // ], 'slug-generator.routes');

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/slg'),
        ], 'slug-generator.assets');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/slg'),
        ], 'slug-generator.lang');*/

        // Registering package commands.
        // $this->commands([]);
    }
}

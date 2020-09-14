<?php

namespace Freedom\ErrorHandler\Providers;

use Illuminate\Support\ServiceProvider as ServiceProvider;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/error-handler.php' => config_path('error-handler.php'),
        ], 'config');
        $this->mergeConfigFrom(__DIR__.'/../../config/error-handler.php', 'error-handler');
        $this->loadViewsFrom(__DIR__.'/../views','error-handler');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }
}

<?php

namespace CodeMasterSolucoes\FlashMaterialize;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'CodeMasterSolucoes\FlashMaterialize\SessionStore',
            'CodeMasterSolucoes\FlashMaterialize\LaravelSessionStore'
        );

        $this->app->singleton('flash', function () {
            return $this->app->make('CodeMasterSolucoes\FlashMaterialize\FlashNotifier');
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        if (File::isDirectory(config('flash-materialize.views_path'))) {
            $this->loadViewsFrom(base_path('resources/views/vendor/flash-materialize'), 'flash');
        } else {
            $this->loadViewsFrom(__DIR__ . '/../../views', 'flash');
        }

        $this->publishes([
            __DIR__ . '/../../views' => base_path('resources/views/vendor/flash-materialize'),
        ]);

        $this->registerNamespaces();
    }

    /**
     * Register package's namespaces.
     */
    protected function registerNamespaces()
    {
        $configPath = __DIR__ . '/../config/config.php';

        $this->mergeConfigFrom($configPath, 'flash-materialize');
        $this->publishes([
            $configPath => config_path('flash-materialize.php'),
        ], 'config');
    }
}

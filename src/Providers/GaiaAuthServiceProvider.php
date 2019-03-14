<?php

namespace Labsys\GaiaAuth\Providers;

use Illuminate\Support\ServiceProvider;
use Labsys\GaiaAuth\Middleware\GaiaAuth;

class GaiaAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('auth_gaia.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__.'/../Migration');

        if ($this->app->runningInConsole()) {
            $this->commands([
                FooCommand::class,
                BarCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('GaiaAuth', function ($app) {
                    return new GaiaAuth($app);
                });

        $this->app->alias('GaiaAuth', 'Labsys\GaiaAuth\GaiaAuth');

        $this->mergeConfig();
    }

    //合并
    private function mergeConfig()
    {
//        $this->mergeConfigFrom(
//            __DIR__ . '/../Config/config.php', 'auth_gaia'
//        );
    }
}

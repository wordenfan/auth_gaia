<?php

namespace Labsys\GaiaAuth\Providers;

use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('GaiaAuth', function ($app) {
                    return new ShakaAuthRole($app);
                });

        $this->app->alias('GaiaAuth', 'Labsys\GaiaAuth\GaiaAuth');

        $this->mergeConfig();
    }

    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'auth_gaia'
        );
    }
}

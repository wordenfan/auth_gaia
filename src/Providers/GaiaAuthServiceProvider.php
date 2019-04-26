<?php

namespace Labsys\GaiaAuth\Providers;

use Illuminate\Support\ServiceProvider;
use Labsys\GaiaAuth\GaiaAuth;
use Labsys\GaiaAuth\Command\MigrationCommand;

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

        $this->publishes([
            __DIR__.'/../Migration/' => database_path('migrations')
        ]);

        $this->publishes([
            __DIR__.'/../Seeds/' => database_path('seeds')
        ]);

        $this->bladeDirectives();

        // $this->loadMigrationsFrom(__DIR__.'/../Migration');

        if ($this->app->runningInConsole()) {
            $this->commands([
                 MigrationCommand::class,
            ]);
        }
    }

    /**
     * Register the blade directives
     *
     * @return void
     */
    private function bladeDirectives()
    {
        if (!class_exists('\Blade')) return;
        // Call to GaiaAuth::hasRole
        \Blade::directive('role', function ($expression) {
            return "<?php if (\\GaiaAuth::hasRole({$expression})) : ?>";
        });
        \Blade::directive('endrole', function ($expression) {
            return "<?php endif; ?>";
        });
        // Call to GaiaAuth::can
        \Blade::directive('permission', function ($expression) {
            return "<?php if (\\GaiaAuth::canDo({$expression})) : ?>";
        });
        \Blade::directive('endpermission', function ($expression) {
            return "<?php endif; ?>";
        });
        //
        \Blade::directive('nopermission', function ($expression) {
            return "<?php if (! \\GaiaAuth::canDo({$expression})) : ?>";
        });
        \Blade::directive('endnopermission', function ($expression) {
            return "<?php endif;?>";
        });
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

        $this->app->alias('GaiaAuth', 'Labsys\GaiaAuth\Facades\GaiaAuth');

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

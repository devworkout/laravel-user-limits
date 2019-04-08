<?php

namespace DevWorkout\UserLimits;

use DevWorkout\UserLimits\Commands\RefreshLimits;
use Illuminate\Support\ServiceProvider;

class UserLimitsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ( $this->app->runningInConsole() )
        {
            $this->publishes( [
                __DIR__ . '/../config/config.php' => config_path( 'laravel-user-limits.php' ),
            ], 'config' );

            $this->loadMigrationsFrom( [
                __DIR__ . '/../database/migrations',
            ] );

            $this->commands( [
                RefreshLimits::class,
            ] );

            /*
            $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-user-limits');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/laravel-user-limits'),
            ], 'views');
            */
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__ . '/../config/config.php', 'laravel-user-limits' );
    }
}

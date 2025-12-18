<?php

namespace Curini\Password\Providers;

use Illuminate\Support\ServiceProvider;

class AppAuthProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/socialite.php' => config_path('socialite.php'),
        ], 'password-config');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'socialite');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
}

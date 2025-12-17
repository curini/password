<?php

namespace App\Providers;

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
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'socialite');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
}

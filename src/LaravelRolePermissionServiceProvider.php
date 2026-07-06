<?php

namespace Lfcuser\LaravelRolePermission;

use Illuminate\Support\ServiceProvider;

class LaravelRolePermissionServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/laravel-role-permission.php',
            'laravel-role-permission'
        );
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->publishes([
            __DIR__ . '/../config/laravel-role-permission.php' => config_path('laravel-role-permission.php'),
        ], 'laravel-role-permission-config');
    }
}

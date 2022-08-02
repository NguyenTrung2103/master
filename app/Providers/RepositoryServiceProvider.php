<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Admin\PermissionGroup\PermissionGroupRepositoryInterface::class,
            \App\Repositories\Admin\PermissionGroup\PermissionGroupRepository::class
        );
    }

    public function boot()
    {
        //
    }
}

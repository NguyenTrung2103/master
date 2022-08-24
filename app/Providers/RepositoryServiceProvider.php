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
        $this->app->singleton(
            \App\Repositories\Admin\Permission\PermissionRepositoryInterface::class,
            \App\Repositories\Admin\Permission\PermissionRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\Role\RoleRepositoryInterface::class,
            \App\Repositories\Admin\Role\RoleRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\User\UserRepositoryInterface::class,
            \App\Repositories\Admin\User\UserRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Admin\Category\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\Question\QuestionRepositoryInterface::class,
            \App\Repositories\Admin\Question\QuestionRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\Answer\AnswerRepositoryInterface::class,
            \App\Repositories\Admin\Answer\AnswerRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\Customer\CustomerRepositoryInterface::class,
            \App\Repositories\Admin\Customer\CustomerRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\Phonezalo\PhonezaloRepositoryInterface::class,
            \App\Repositories\Admin\Phonezalo\PhonezaloRepository::class
        );
    }

    public function boot()
    {
        //
    }
}

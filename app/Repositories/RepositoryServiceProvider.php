<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      /*
     * Binding for Project Repositories...
     */

     /*
     * Binding for User Repositories...
     */
     $this->app->bind(
        'App\Repositories\User\UserRepositoryInterface',
         'App\Repositories\User\UserRepository'
     );

     $this->app->bind(
        'App\Repositories\User\PermissionRepositoryInterface',
         'App\Repositories\User\PermissionRepository'
     );

     $this->app->bind(
        'App\Repositories\User\RoleRepositoryInterface',
         'App\Repositories\User\RoleRepository'
     );

     $this->app->bind(
        'App\Repositories\User\TagRepositoryInterface',
         'App\Repositories\User\TagRepository'
     );

     $this->app->bind(
        'App\Repositories\User\CategoryRepositoryInterface',
         'App\Repositories\User\CategoryRepository'
     );

     $this->app->bind(
        'App\Repositories\User\PostRepositoryInterface',
         'App\Repositories\User\PostRepository'
     );
    }
}

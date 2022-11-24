<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Admin\Skill\SkillRepositoryInterface::class,
            \App\Repositories\Admin\Skill\SkillRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\SkillMatrix\SkillMatrixRepositoryInterface::class,
            \App\Repositories\Admin\SkillMatrix\SkillRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\Level\LevelRepositoryInterface::class,
            \App\Repositories\Admin\Level\LevelRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Admin\User\UserRepositoryInterface::class,
            \App\Repositories\Admin\User\UserRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

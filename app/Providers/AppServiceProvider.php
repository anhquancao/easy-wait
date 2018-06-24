<?php

namespace App\Providers;

use App\Repositories\QueueEloquentRepository;
use App\Repositories\QueueRepositoryInterface;
use App\Repositories\UserEloquentRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserEloquentRepository::class
        );

        $this->app->singleton(
            QueueRepositoryInterface::class,
            QueueEloquentRepository::class
        );
    }
}

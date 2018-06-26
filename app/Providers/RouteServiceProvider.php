<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapCustomerWebRoutes();

        $this->mapUserWebRoutes();

        $this->mapCustomerApiRoutes();

        $this->mapUserApiRoutes();
    }

    protected function mapCustomerApiRoutes() {
        Route::prefix('customer-api/v1')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/customer.api.php'));
    }

    protected function mapUserApiRoutes()
    {
        Route::prefix('user-api/v1')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/user.api.php'));
    }

    protected function mapUserWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix("user")
            ->group(base_path('routes/user.web.php'));
    }

    protected function mapCustomerWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/customer.web.php'));
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}

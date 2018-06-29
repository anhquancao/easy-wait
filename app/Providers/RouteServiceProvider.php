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

        $this->mapWebRoutes();

        $this->mapCustomerApiRoutes();

        $this->mapUserApiRoutes();

        $this->mapAuthApiRoutes();
    }

    protected function mapAuthApiRoutes() {
        Route::prefix('auth-api/v1')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path("routes/auth.api.php"));
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

}

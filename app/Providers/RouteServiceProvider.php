<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

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
        $this->mapBackendRoutes();
        $this->mapFrontendRoutes();
        $this->mapFrontendNonSessionRoutes();
    }

    protected function mapBackendRoutes()
    {
        Route::prefix(\config('app.backend-prefix'))
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/backend.php'));
    }

    protected function mapFrontendRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/frontend.php'));
    }

    protected function mapFrontendNonSessionRoutes()
    {
        Route::middleware('non-session')
            ->namespace($this->namespace)
            ->group(base_path('routes/frontend-non-session.php'));
    }
}

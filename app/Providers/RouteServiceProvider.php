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
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The path to the "admin" route for your application.
     *
     * @var string
     */
    public const ADMIN_DASHBOARD = '/admin';

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
        //
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
            //  ->middleware('cache.headers:private;max_age=3600') // brooz Cache-Control HTTP header globally
             ->namespace($this->namespace)
             ->group(function ($router) {
                 require base_path('routes/amp.php');
                 require base_path('routes/admin.php');
                 require base_path('routes/web.php');
                 // php artisan route:clear
        });

        // 127.0.0.1:8000/admin
        // Route::prefix('admin')
        //      ->middleware(['web']) /// , 'auth', 'verified'  :::>  auth : want database users
        //      ->namespace($this->namespace . '\Admin')
        //      ->group(base_path('routes/admin.php'));
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
             ->middleware('cache.headers:private;max_age=3600') // added this line
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}

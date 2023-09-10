<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $this->configureRateLimiting();

        // $this->routes(function () {
        //     Route::middleware('web')
        //         ->namespace($this->namespace) // add this line
        //         ->group(base_path('routes/web.php'));

        //     Route::prefix('api')
        //         ->middleware('api')
        //         ->namespace($this->namespace) // and this line
        //         ->group(base_path('routes/api.php'));
        // });

        Paginator::useBootstrap();

        Gate::define('admin', function (User $user) {
            return $user->name == 'arthur';
        });
    }
    // protected $namespace = 'App\Http\Controllers';



}

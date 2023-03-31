<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useBootstrap();
        
    }

    // public function boot()
    // {
    //     $this->registerPolicies();
    //     Gate::define('view-page-admin', function ($user) {

    //         if ($user->level == "0") {

    //             return true;

    //         }

    //         return false;

    //     });
    //     Gate::define('view-page-guest', function ($user) {

    //         if ($user->admin == "1" || $user->admin == "0") {

    //             return true;

    //         }

    //         return false;

    //     });
    // }
}

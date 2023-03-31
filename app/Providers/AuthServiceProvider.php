<?php

namespace App\Providers;


use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
       $this->registerPolicies();

        Gate::define('show-blog', function ($user){
            return $user->checkPermissionAccess('admin_blog');
        });

        Gate::define('show-type', function ($user){
            return $user->checkPermissionAccess('admin_type');
        });

        Gate::define('show-comment', function ($user){
            return $user->checkPermissionAccess('admin_comment');
        });

        Gate::define('show-product', function ($user){
            return $user->checkPermissionAccess('admin_product');
        });

        Gate::define('show-user', function ($user){
            return $user->checkPermissionAccess('admin_user');
        });

        Gate::define('show-role', function ($user){
            return $user->checkPermissionAccess('admin_role');
        });

        Gate::define('show-chart', function ($user){
            return $user->checkPermissionAccess('admin_chart');
        });

        Gate::define('show-insurance', function ($user){
            return $user->checkPermissionAccess('admin_insurance');
        });

        Gate::define('show-slider', function ($user){
            return $user->checkPermissionAccess('admin_slider');
        });

        Gate::define('show-checkorder', function ($user){
            return $user->checkPermissionAccess('admin_checkorder');
        });

        Gate::define('show-customer', function ($user){
            return $user->checkPermissionAccess('admin_customer');
        });

        Gate::define('show-shipping', function ($user){
            return $user->checkPermissionAccess('admin_shipping');
        });
    }
}

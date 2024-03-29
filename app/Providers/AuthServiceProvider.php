<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */

    public function boot(GateContract $gate): void
    {
        $this->registerPolicies();

        $gate->define('editor',function($user){
            return $user->role_id === 1845;
        });

        $gate->define('viewer',function($user){
            return $user->role_id === 1745;
        });

    }
}

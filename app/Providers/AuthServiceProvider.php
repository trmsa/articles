<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Aerospace;
use App\Models\Biology;
use App\Models\Cosmology;
use App\Models\Physics;
use App\Models\User;
use App\Policies\AerospacePolicy;
use App\Policies\BiologyPolicy;
use App\Policies\CosmologyPolicy;
use App\Policies\PhysicsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Cosmology::class => CosmologyPolicy::class,
        Aerospace::class => AerospacePolicy::class,
        Biology::class => BiologyPolicy::class,
        Physics::class => PhysicsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::before(function($user) {
            if($user->type === 'admin') {
                return true;
            }
        });

        Gate::define('admin', function(User $user) {
            return $user->type === 'admin';
        });
        
        $this->registerPolicies();

    }
}

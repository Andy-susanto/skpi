<?php

namespace App\Providers;

use App\Models\Permissions;
use App\Models\User;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $Permission = Permissions::all();
        foreach ($Permission as $permission) {
            Gate::define($permission->permission, function (User $user) use ($permission) {
                return $user->hasPermission($permission->permission);
            });
        }
    }
}

<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
     * @return bool
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ()
        {
            $roles = DB::table('user_role')->where('id_user', Auth::user()->id)->get();

            foreach($roles as $role)
            {
                $role = DB::table('role')->where('id', $role->id_role)->get();
                if($role[0]->name == "Admin")
                {
                    return true;
                }
            }
        });

        return false;
    }
}

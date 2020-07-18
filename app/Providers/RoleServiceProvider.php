<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.dashboard', function ($view) {
            $role_id = 0;
            if (Auth::check()) {
                $role = User::with('role')->where('id', auth()->user()->id)->first();
                $role_id = $role->id;
            }
            $view->with('role', $role_id);
        });
    }
}

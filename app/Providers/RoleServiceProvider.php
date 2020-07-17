<?php

namespace App\Providers;

use App\User;
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
            $role = User::with('role')->where('id', auth()->user()->id)->first();
            $view->with('role', $role->id);
        });
    }
}

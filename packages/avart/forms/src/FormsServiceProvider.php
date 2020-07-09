<?php

namespace Avart\Forms;

use Illuminate\Support\ServiceProvider;

class FormsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        $this->app->make('Avart\Forms\FieldsController');
        $this->loadViewsFrom(__DIR__.'/views', 'forms');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateForm::class,
            ]);
        }
        $this->publishes([
            __DIR__.'/assets' => public_path('avart/forms'),
        ], 'public');
    }
}

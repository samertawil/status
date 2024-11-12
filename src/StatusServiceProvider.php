<?php

namespace status\Pkg;

use Illuminate\Support\ServiceProvider;

class StatusServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
       
        $this->loadRoutesFrom(__DIR__ .'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views/','StatusModule');

        $this->publishes([__DIR__.'/../public' => public_path('vendor/StatusModule'),
    ], 'public');

    }
}

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

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'StatusModule');
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'statuCustomeTrans');
        // $this->mergeConfigFrom(__DIR__.'/../config','status');

        $this->publishes(
            [__DIR__ . '/../public' => public_path('vendor/StatusModule'),],
            'public'
        );

        $this->publishes(
            [__DIR__ . '/../config/status.php' => config_path('status.php'),],
            'config'
        );

        $this->publishes(
            [__DIR__ . '/../resources/views/status' => resource_path('views/status'),],
            'views'
        );

        $this->publishes(
            [__DIR__ . '/../lang/ar/statuCustomeTrans.php' => lang_path('ar/statuCustomeTrans.php'),],
            'lang'
        );
    }
}

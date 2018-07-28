<?php

namespace Woenel\Itexmo;

use Illuminate\Support\ServiceProvider;

class ItexmoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Config/itexmo.php' => config_path('itexmo.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('Itexmo', 'Woenel\Itexmo');
    }
}
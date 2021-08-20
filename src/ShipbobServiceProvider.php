<?php

namespace Bryanjamesdelaluya\ShipbobLaravel;

use Illuminate\Support\ServiceProvider;

/**
* Class ShipbobServiceProvider
* @package Bryanjamesdelaluya\ShipbobLaravel
* @author Bryan James Dela Luya
**/

class ShipbobServiceProvider extends ServiceProvider
{
    public function boot() 
    {
        $this->publishes([
            __DIR__ . '/../config/shipbob.php' => config_path('shipbob.php'),
            __DIR__ . '/../samples/ShipbobController.php' => app_path('Http/Controllers/API/ShipbobController.php')
        ]);
    }

    public function register() 
    {
        $this->app->singleton(Shipbob::class, function() {
            return new Shipbob();
        });
    }
}
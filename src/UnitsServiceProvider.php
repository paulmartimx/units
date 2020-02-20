<?php

namespace Units;

use Illuminate\Support\ServiceProvider;
use Units\Providers\BootstrapProvider;

use Units\UnitManager;

class UnitsServiceProvider extends ServiceProvider
{    

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $manager = new UnitManager;
        
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
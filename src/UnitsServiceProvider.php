<?php

namespace Units;
    
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Blade;

use Units\UnitManager;
use Units\Commands\UnitAdd;
use Units\Commands\UnitList;
use Units\Commands\UnitGet;

class UnitsServiceProvider extends ServiceProvider
{

    protected $manager;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {                

        $this->commands([
            UnitAdd::class,
            UnitList::class,
            UnitGet::class
        ]);

        $this->setHelpers($this->manager->units);
        $this->setMiddleware($this->manager->units);
        $this->setRoutes($this->manager->units);
        $this->setViews($this->manager->units);
        $this->setBladeComponents($this->manager->units);
        $this->setCommands($this->manager->units);
        $this->setMigrations($this->manager->units);
        $this->setProviders($this->manager->units);        

        $this->setPsr4();

        
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $configPath = __DIR__ . '/../config/config.php';
        $this->mergeConfigFrom($configPath, 'units');

        $this->manager = new UnitManager;
        $this->setAliases($this->manager->units);
        $this->setConfigs($this->manager->units);

    }


    /**
     * Register unit's base config and PSR-4 Autoloading.
     */
    protected function setPsr4()
    {
        $loader = require base_path() . '/vendor/autoload.php';
        $loader->setPsr4("Units\\", config("units.basepath") . "/");
    }

    
    /**
     * Register unit's config files.
     */
    protected function setConfigs($units)
    {
        foreach($units as $unit)
        {
            if(file_exists( "{$unit->path}/config.php" ))
                $this->mergeConfigFrom(
                    "{$unit->path}/config.php",
                    $unit->hint
                );
        }
    }

    /**
     * Register unit's route files.
     */
    protected function setRoutes($units)
    {
        foreach($units as $unit)
        {
            if(file_exists( "{$unit->path}/routes.php" ))
                $this->loadRoutesFrom( "{$unit->path}/routes.php" );
        }
    }

    /**
     * Register unit's view directories.
     */
    protected function setViews($units)
    {
        foreach($units as $unit)
        {
            if(is_dir( "{$unit->path}/_Views" ))
                $this->loadViewsFrom( "{$unit->path}/_Views", $unit->hint );
        }
    }

    /**
     * Register unit's middleware.
     */
    protected function setMiddleware($units)
    {
        foreach($units as $unit)
        {
            if(is_dir( "{$unit->path}/Middleware" ))
                {
                    foreach($unit->manifest["middleware"] as $alias => $namespace)
                    {
                        $this->app['router']->aliasMiddleware($alias, $namespace);
                    }
                }
        }
    }


    /**
     * Register unit's commands.
     */
    protected function setCommands($units)
    {
        foreach($units as $unit)
        {
            if(is_dir( "{$unit->path}/Commands" ))
                if(size($unit->manifest["commands"]) > 0)
                    $this->commands($unit->manifest["commands"]);
        }
    }

    /**
     * Register unit's migration files.
     */
    protected function setMigrations($units)
    {
        foreach($units as $unit)
        {
            if(is_dir( "{$unit->path}/Migrations" ))
                $this->loadMigrationsFrom("{$unit->path}/Migrations");
        }
    }

    /**
     * Register unit's helpers .php files.
     */
    protected function setHelpers($units)
    {
        foreach($units as $unit)
        {
            if(is_dir( "{$unit->path}/Helpers" ))
                foreach (glob( "{$unit->path}/Helpers/*.php" ) as $filename){
                    require_once($filename);
                }
        }
    }


    /**
     * Register unit's Blade Components and Aliasess.
     */
    protected function setBladeComponents($units)
    {
        foreach($units as $unit)
        {
            foreach($unit->manifest["blade_components"] as $view => $alias)
            {
                Blade::component($view, $alias);
            }

            foreach($unit->manifest["blade_aliases"] as $view => $alias)
            {
                Blade::include($view, $alias);
            }
        }
    }


    /**
     * Register unit's Providers.
     */
    protected function setProviders($units)
    {
        foreach($units as $unit)
        {
            foreach($unit->manifest["providers"] as $provider)
            {
                if(class_exists($provider))
                    app()->register($provider);
            }            
        }
    }


    /**
     * Register unit's Class Aliases.
     */
    protected function setAliases($units)
    {
        foreach($units as $unit)
        {
            foreach($unit->manifest["aliases"] as $alias => $namespace)
            {
                $this->app->booting(function() use ($alias, $namespace) {
                                    $loader = AliasLoader::getInstance();
                                    $loader->alias($alias, $namespace);
                                });
            }            
        }
    }

}
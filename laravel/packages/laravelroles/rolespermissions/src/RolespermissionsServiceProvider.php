<?php

namespace Laravelroles\Rolespermissions;

use Illuminate\Support\ServiceProvider;

class RolespermissionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		$this->publishes([__DIR__.'/views'=> base_path('resources/views/laravelroles/rolespermissions')]
		);
		$this->publishes([
		__DIR__. '/migrations'=>$this->app->databasePath().'/migrations'], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
		include __DIR__."/routes.php";
		$this->app->make('Laravelroles\Rolespermissions\Controllers\RoleController');
		$this->app->make('Laravelroles\Rolespermissions\Controllers\RouteController');
		$this->app->make('Laravelroles\Rolespermissions\Controllers\UserController');
		
    }
}

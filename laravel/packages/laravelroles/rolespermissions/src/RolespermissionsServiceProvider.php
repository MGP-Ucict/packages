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
    }
}

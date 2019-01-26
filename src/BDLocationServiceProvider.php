<?php

namespace Shahadatzcpe\BDLocation;

use Illuminate\Support\ServiceProvider;

class BDLocationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
                ImportData::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/migrations/' => database_path('migrations')
        ], 'migrations');

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

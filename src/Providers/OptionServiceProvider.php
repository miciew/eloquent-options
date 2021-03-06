<?php

namespace Miciew\Laravel\Option\Providers;

use Illuminate\Support\ServiceProvider;

class OptionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([ __DIR__ . '/../../config/config.php' => config_path('eloquent-options.php'), ], 'config');

        $this->publishes([ __DIR__ . '/../../database/migrations/' => database_path('migrations') ], 'migrations');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}

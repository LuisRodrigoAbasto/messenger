<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Mensaje;
use App\Observers\MensajeObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Mensaje::observe(MensajeObserver::class);
    }
}

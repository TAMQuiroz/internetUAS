<?php

namespace Intranet\Providers;

use Carbon\Carbon;
use Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('es');
        view()->composer('app', function ($view) {
            $now = new Carbon;
            $message = "0";
            if (isset(Session::get('academic-cycle')->FechaFin)){
                $end_date = new Carbon(Session::get('academic-cycle')->FechaFin);
                $message = $end_date->diffInDays($now);
            }

            $view->with('diffForHumans', $message);
        });

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

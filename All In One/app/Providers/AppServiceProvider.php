<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Facades\Invoice;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Invoice',function ($app){
            return new Invoice();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

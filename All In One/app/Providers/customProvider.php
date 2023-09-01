<?php

namespace App\Providers;
use App\Http\Service\DemoService;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;
use App\Models\Student;


class customProvider extends ServiceProvider
{
    /**
     * Register services.
     * 
     *
     * @return void 
     */
    public function register()
    {
        $this->demmo();
       
        // $this->app->bind(DemoService::class, function () {
        //     return new DemoService('id:-'.rand(1,100));
        // });
        // return "id:-".rand(1,100);
    }
    public function demmo(){
     return "sdfsd";  
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['*'], function ($pages) {
            if (Auth::check()) {
                $id = Auth::id();
                // view()->share('userinfo', $id);
                $pages->with('userinfo', Student::where('id', '=', $id)->first());
            } else {                                                                                                                                                    
            }
        });
        // view()->share('userinfo', Student::where('email', '=', "arunsuthar21@gmail.com")->first());
        // view()->composer(['*'], function ($pages) {
        //     if (Auth::check()) {
        //         $id = Auth::id();
        //         // view()->share('userinfo', $id);
        //         $pages->with('userinfo', Student::where('id', '=', $id)->first());
        //     } else {
        //     }
        // });
    }
}
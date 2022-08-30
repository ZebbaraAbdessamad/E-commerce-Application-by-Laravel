<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Modules\Frontend\Entities\Command;

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
        Paginator::useBootstrap();
         view()->composer(['dashbord.header'], function ($view) {
            $commands=Command::where('stauts_command','=','not_yet')->get();
            $n=0;
            foreach($commands as $command){
                $n++;
            }
            $view->with('total', $n);
        });
    }
}

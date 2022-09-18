<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFive();

        Blade::directive('datetime', function($expr){
            return "<?php if(!is_null($expr)){ echo ($expr)->toDateTimeString('minute'); }  ?>";
        });
        Blade::directive('date', function($expr){
            return "<?php if(!is_null($expr)){ echo ($expr)->toDateString(); }  ?>";
        });
    }
}

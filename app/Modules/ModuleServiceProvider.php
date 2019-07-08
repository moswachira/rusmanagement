<?php
namespace App\Modules;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Home/Views','home');
        $this->loadViewsFrom(__DIR__.'/Product/Views','product');
        $this->loadViewsFrom(__DIR__.'/Profressor/Views','pro');
        $this->loadViewsFrom(__DIR__.'/Login/Views','login');
       
    }
}
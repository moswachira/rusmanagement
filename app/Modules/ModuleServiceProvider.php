<?php
namespace App\Modules;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Home/Views','home');
        $this->loadViewsFrom(__DIR__.'/Home/Views','study');
        $this->loadViewsFrom(__DIR__.'/Home/Views','academic');
        $this->loadViewsFrom(__DIR__.'/Home/Views','train');
        $this->loadViewsFrom(__DIR__.'/Product/Views','product');
        $this->loadViewsFrom(__DIR__.'/Profressor/Views','pro');
        $this->loadViewsFrom(__DIR__.'/Login/Views','login');
        $this->loadViewsFrom(__DIR__.'/Responsible/Views','res');
        $this->loadViewsFrom(__DIR__.'/Chief/Views','chi');
    }
}
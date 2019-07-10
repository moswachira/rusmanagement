<?php
namespace App\Modules;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Home/Views','home');
        $this->loadViewsFrom(__DIR__.'/Study/Views','stu');
        $this->loadViewsFrom(__DIR__.'/Home/Views','academic');
        $this->loadViewsFrom(__DIR__.'/Trian/Views','tra');
        $this->loadViewsFrom(__DIR__.'/Train/Views','tra2');
        $this->loadViewsFrom(__DIR__.'/Education/Views','edu');
        $this->loadViewsFrom(__DIR__.'/Education/Views','edu2');
        $this->loadViewsFrom(__DIR__.'/Product/Views','product');
        $this->loadViewsFrom(__DIR__.'/Profressor/Views','pro');
        $this->loadViewsFrom(__DIR__.'/Login/Views','login');
        $this->loadViewsFrom(__DIR__.'/Responsible/Views','res');
        $this->loadViewsFrom(__DIR__.'/Chief/Views','chi');
    }
}
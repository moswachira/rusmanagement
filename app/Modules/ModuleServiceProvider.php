<?php
namespace App\Modules;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/Home/Views','home');
        $this->loadViewsFrom(__DIR__.'/Study/Views','stu');
        $this->loadViewsFrom(__DIR__.'/Soure/Views','sou');
        $this->loadViewsFrom(__DIR__.'/Portfolio/Views','por');
        $this->loadViewsFrom(__DIR__.'/Positiontypes/Views','post');
        $this->loadViewsFrom(__DIR__.'/Academictype/Views','acaty');
        $this->loadViewsFrom(__DIR__.'/Train/Views','tra');
        $this->loadViewsFrom(__DIR__.'/Typesoure/Views','cap');
        $this->loadViewsFrom(__DIR__.'/Education/Views','edu');
        $this->loadViewsFrom(__DIR__.'/Product/Views','product');
        $this->loadViewsFrom(__DIR__.'/Reports/Views','repo');
        $this->loadViewsFrom(__DIR__.'/Position/Views','pos');
        $this->loadViewsFrom(__DIR__.'/Profressor/Views','pro');
        $this->loadViewsFrom(__DIR__.'/Qualification/Views','qua');
        $this->loadViewsFrom(__DIR__.'/Groups/Views','gro');
        $this->loadViewsFrom(__DIR__.'/Publishs/Views','pub');
        $this->loadViewsFrom(__DIR__.'/Login/Views','login');
        $this->loadViewsFrom(__DIR__.'/Responsible/Views','res');
        $this->loadViewsFrom(__DIR__.'/Institutions/Views','ins');
        $this->loadViewsFrom(__DIR__.'/Branchs/Views','bra');
        $this->loadViewsFrom(__DIR__.'/Chief/Views','chi');
        $this->loadViewsFrom(__DIR__.'/Right/Views','rig'); 
        $this->loadViewsFrom(__DIR__.'/Degrees/Views','deg');
        $this->loadViewsFrom(__DIR__.'/Subjectss/Views','sub');
        $this->loadViewsFrom(__DIR__.'/Follow/Views','fow');
        $this->loadViewsFrom(__DIR__.'/requestlog/Views','log');
        $this->loadViewsFrom(__DIR__.'/Request/Views','req');
        $this->loadViewsFrom(__DIR__.'/Followtrain/Views','fot');
        $this->loadViewsFrom(__DIR__.'/Sides/Views','sid');
        $this->loadViewsFrom(__DIR__.'/Document/Views','doc');
        $this->loadViewsFrom(__DIR__.'/Comment/Views','com');
       
    }
}
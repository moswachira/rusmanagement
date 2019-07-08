<?php
Route::prefix('')->group(function () {
    Route::Get('/','\App\Modules\Home\HomeController@index');
    Route::GET('/Home/study','\App\Modules\Home\HomeController@study');
    Route::GET('/Home/academic','\App\Modules\Home\HomeController@academic');
    Route::GET('/Home/train','\App\Modules\Home\HomeController@train');
    Route::GET('/Home/train2','\App\Modules\Home\HomeController@train2');
    Route::GET('/profressor','\App\Modules\Profressor\ProfressorController@index');
    Route::GET('/profressor/create','\App\Modules\Profressor\ProfressorController@create');
    Route::Get('/login','\App\Modules\Login\LoginController@index');
    Route::Get('/responsible','\App\Modules\Responsible\ResponsibleController@index');
    Route::Get('/chief','\App\Modules\Chief\ChiefController@index');
});
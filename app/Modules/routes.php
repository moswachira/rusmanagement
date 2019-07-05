<?php
Route::prefix('')->group(function () {
    Route::Get('/','\App\Modules\Home\HomeController@index');
    Route::GET('/profressor','\App\Modules\Profressor\ProfressorController@index');
    Route::GET('/profressor/create','\App\Modules\Profressor\ProfressorController@create');
    Route::Get('/login','\App\Modules\Login\LoginController@index');
  
});
<?php
Route::prefix('')->group(function () {
    Route::Get('/','\App\Modules\Home\HomeController@index');
    Route::GET('/study','\App\Modules\Study\StudyController@index');
    Route::GET('/Home/academic','\App\Modules\Home\HomeController@academic');
    Route::GET('/train','\App\Modules\Train\TrainController@index');
    Route::GET('/train/conclude','\App\Modules\Train\TrainController@conclude');
    Route::GET('/education','\App\Modules\Education\EducationController@index');
    Route::GET('/education/finish','\App\Modules\Education\EducationController@finish');
    Route::GET('/profressor','\App\Modules\Profressor\ProfressorController@index');
    Route::GET('/profressor/create','\App\Modules\Profressor\ProfressorController@create');
    Route::Get('/login','\App\Modules\Login\LoginController@index');
    Route::Post('/login','\App\Modules\Login\LoginController@action');
    Route::Get('/logout','\App\Modules\Login\LoginController@logout');
    Route::Get('/responsible','\App\Modules\Responsible\ResponsibleController@index');
    Route::Get('/chief','\App\Modules\Chief\ChiefController@index');
    Route::Get('/right','\App\Modules\Right\RightController@index');

});
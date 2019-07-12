<?php
Route::prefix('')->group(function () {
    Route::Get('/','\App\Modules\Home\HomeController@index');
    Route::GET('/home/study','\App\Modules\Study\StudyController@index');
    Route::GET('/home/soure','\App\Modules\Soure\SoureController@soure');
    Route::GET('/home/academic','\App\Modules\Academic\AcademicController@listacademic');
    Route::GET('/academic/addacademic','\App\Modules\Academic\AcademicController@formacademic');
    Route::GET('/train','\App\Modules\Train\TrainController@index');
    Route::GET('/conclude','\App\Modules\Train\TrainController@conclude');
    Route::GET('/education','\App\Modules\Education\EducationController@index');
    Route::GET('/finish','\App\Modules\Education\EducationController@finish');
    Route::GET('/home/profressor','\App\Modules\Profressor\ProfressorController@index');
    Route::GET('/profressor/create','\App\Modules\Profressor\ProfressorController@create');
    Route::Get('/login','\App\Modules\Login\LoginController@index');
    Route::Post('/login','\App\Modules\Login\LoginController@action');
    Route::Get('/logout','\App\Modules\Login\LoginController@logout');
    Route::Get('/responsible','\App\Modules\Responsible\ResponsibleController@index');
    Route::Get('/chief','\App\Modules\Chief\ChiefController@index');
    Route::Get('/home/right','\App\Modules\Right\RightController@right');

});
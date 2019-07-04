<?php
Route::prefix('liff')->group(function () {
    Route::Get('/','\App\Modules\Home\HomeController@index');
    Route::Get('/product','\App\Modules\Product\ProductController@index');
});
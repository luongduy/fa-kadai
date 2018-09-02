<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'HomeController@index')->name('home');

Route::group(['as' => 'receipt.', 'prefix' => 'receipt'], function () {
    Route::get('scan', 'ReceiptController@showScanForm')->name('scan-get');
    Route::post('scan', 'ReceiptController@scan')->name('scan-post');
    Route::get('history/{id?}', 'ReceiptController@history')->name('history');
});

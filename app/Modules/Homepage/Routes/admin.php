<?php
//Route::get('/', function (){
//    dd(auth()->user());
//    dd('sss');
//})->name('dashboard');
//Route::get('/', 'HomepageController@getIndex')->name('dashboard');

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::get('/', 'HomepageController@getIndex')->name('dashboard');

});

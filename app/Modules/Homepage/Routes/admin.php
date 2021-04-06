<?php
Route::group([
    'middleware' => ['auth'],
    'prefix'=>'admin'
], function () {

    Route::get('/', 'HomepageController@getIndex')->name('dashboard');

    });

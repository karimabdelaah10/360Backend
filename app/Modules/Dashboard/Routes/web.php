<?php
Route::group([
    'middleware' => ['auth']
], function () {
Route::get('/', 'DashboardController@getIndex')->name('dashboard');
    });

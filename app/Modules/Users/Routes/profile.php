<?php

Route::group([
    'middleware' => [ 'auth']
], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'ProfileController@getIndex')->name('profile.index');

        Route::get('/edit', 'ProfileController@getEdit')->name('profile.edit');
        Route::post('/edit', 'ProfileController@postEdit')->name('profile.edit');
        Route::post('/change-password', 'ProfileController@changePassword')->name('profile.changePassword');
        Route::get('/money-requests', 'ProfileController@getMoneyRequests');
        Route::get('/orders', 'ProfileController@getOrders');
        Route::get('/order/{order_id}', 'ProfileController@getOrderDetails');

    });
});

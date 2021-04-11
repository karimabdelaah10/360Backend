<?php
//
//Route::group([
//    'middleware' => ['auth','IsSuperAdmin',]
//], function () {
//    Route::group(['prefix' => 'admins'], function () {
//        Route::get('/', '\App\Modules\Users\Controllers\AdminsController@getIndex');
//
//        Route::get('/create', '\App\Modules\Users\Controllers\AdminsController@getCreate');
//        Route::post('/create', '\App\Modules\Users\Controllers\AdminsController@postCreate')->name('admins.create');
//
//        Route::get('/edit/{id}', '\App\Modules\Users\Controllers\AdminsController@getEdit');
//        Route::post('/edit/{id}', '\App\Modules\Users\Controllers\AdminsController@postEdit')
//            ->name('users.putUser');
//
//        Route::get('/view/{id}', '\App\Modules\Users\Controllers\AdminsController@getView')
//            ->name('users.view');
//
//        Route::get('/add-product/{id}', '\App\Modules\Users\Controllers\AdminsController@getAddProduct');
//        Route::post('/add-product/{id}', '\App\Modules\Users\Controllers\AdminsController@postAddProduct');
//        Route::get('/delete-product/{id}', '\App\Modules\Users\Controllers\AdminsController@deleteProduct');
//
//        Route::get('/delete/{id}', '\App\Modules\Users\Controllers\AdminsController@getDelete')
//            ->name('users.delete');
//    });
//});

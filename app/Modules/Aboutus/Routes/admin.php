<?php
Route::group([
    'middleware' => ['auth'],
    'prefix'=>'services'
], function () {

    Route::get('/', 'ServicesController@getIndex');
    Route::get('/create', 'ServicesController@getCreate');
    Route::post('/create', 'ServicesController@postCreate');
    Route::get('/edit/{id}', 'ServicesController@getEdit');
    Route::post('/edit/{id}', 'ServicesController@postEdit');
    Route::get('/delete/{id}', 'ServicesController@getDelete');

    });

Route::group([
    'middleware' => ['auth'],
    'prefix'=>'aboutus'
], function () {
    Route::get('/edit', 'AboutUsController@getEdit');
    Route::post('/edit', 'AboutUsController@postEdit');
});

<?php
Route::group([
    'prefix'=>'jobs'
], function () {

    Route::get('/', 'JobsController@getIndex');
    Route::get('/create', 'JobsController@getCreate');
    Route::post('/create', 'JobsController@postCreate');
    Route::get('/edit/{id}', 'JobsController@getEdit');
    Route::post('/edit/{id}', 'JobsController@postEdit');
    Route::get('/delete/{id}', 'JobsController@getDelete');
});

Route::group([
    'prefix'=>'cvs'
], function () {

    Route::get('/', 'JobCvsController@getIndex');
    Route::get('/delete/{id}', 'JobCvsController@getDelete');
});

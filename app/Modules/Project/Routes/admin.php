<?php
Route::group([
    'middleware' => ['auth'],
    'prefix'=>'projects'
], function () {

    Route::get('/','ProjectsController@getIndex')->name('admin-getProjects');
    Route::get('/view/{id}','ProjectsController@getView')->name('admin-getViewProject');
    Route::get('/create','ProjectsController@getCreate')->name('admin-getCreateProject');

    Route::post('/create', 'ProjectsController@postCreate');
    Route::get('/edit/{id}', 'ProjectsController@getEdit');
    Route::post('/edit/{id}', 'ProjectsController@postEdit');
    Route::get('/delete/{id}', 'ProjectsController@getDelete');

    });

<?php
Route::group([
    'middleware' => ['auth'],
    'prefix'=>'projects'
], function () {

    Route::get('/','ProjectsController@getIndex')->name('admin-getProjects');
    Route::get('/view/{id}','ProjectsController@getView')->name('admin-getProjectView');

    });

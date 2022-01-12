<?php
Route::group([
    'middleware' => ['auth'],
    'prefix'=>'categories'
], function () {

    Route::get('/','CategoryController@getIndex');

    Route::get('/list-projects/{category_id}','CategoryController@listProjects');
    Route::get('/edit-project-order/{project_id}','CategoryController@getEditProjectOrder');
    Route::post('/edit-project-order/{project_id}','CategoryController@postEditProjectOrder');
    Route::get('/view/{id}','CategoryController@getView');
    Route::get('/create','CategoryController@getCreate');
    Route::post('/create', 'CategoryController@postCreate');
    Route::get('/edit/{id}', 'CategoryController@getEdit');
    Route::post('/edit/{id}', 'CategoryController@postEdit');
    Route::get('/delete/{id}', 'CategoryController@getDelete');

    });

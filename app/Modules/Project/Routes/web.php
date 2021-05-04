<?php
Route::group([
    'prefix'=>'project'
], function () {

    Route::get('/','ProjectsController@index')->name('getAllProjects');
    Route::get('/{id}','ProjectsController@getProject')->name('getProject');

});

Route::get('/category-projects/{id?}','ProjectsController@getCategoryProjects');
//Route::get('/category-projects/{name?}', function ($name = 'sss') {
//    return $name;
//});

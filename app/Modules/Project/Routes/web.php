<?php
Route::group([
    'prefix'=>'project'
], function () {

    Route::get('/','ProjectsController@index')->name('getAllProjects');
    Route::get('/{id}','ProjectsController@getProject')->name('getProject');

});
Route::group([
    'prefix'=>'category-projects'
], function () {
    Route::get('/{id}','ProjectsController@getCategoryProjects');
});

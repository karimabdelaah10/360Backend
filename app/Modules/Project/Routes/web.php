<?php
Route::group([
    'prefix'=>'project'
], function () {

    Route::get('/{id}','ProjectsController@index')->name('getProject');

});
Route::group([
    'prefix'=>'category-projects'
], function () {
    Route::get('/{id}','ProjectsController@getCategoryProjects');
});

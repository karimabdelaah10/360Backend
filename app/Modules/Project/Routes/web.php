<?php
Route::group([
    'prefix'=>'project',
    'middleware' => ['IsProduction'],
], function () {

    Route::get('/','ProjectsController@index')->name('getAllProjects');
    Route::get('/{id}','ProjectsController@getProject')->name('getProject');

});

Route::get('/sub-categories/{category}','ProjectsController@getSubCategoriesByCategoryId')->name('getSubCategoriesByCategoryId');
Route::get('/category-projects/{id?}','ProjectsController@getCategoryProjects');

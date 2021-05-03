<?php
Route::group([
    'prefix'=>'project'
], function () {

    Route::get('/','ProjectsController@index')->name('getAllProjects');
    Route::get('/{id}','ProjectsController@getProject')->name('getProject');

});

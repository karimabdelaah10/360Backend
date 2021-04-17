<?php
Route::group([
    'prefix'=>'project'
], function () {

    Route::get('/{id}','ProjectsController@index')->name('getProject');

});

<?php
Route::group([
    'prefix'=>'jobs'
], function () {

    Route::get('/', 'JobsController@getIndex');
    Route::post('/', 'JobsController@postMessage');

});


<?php
Route::group([
    'prefix'=>'jobs',
    'middleware' => ['IsProduction'],
], function () {

    Route::get('/', 'JobsController@getIndex');
    Route::post('/', 'JobsController@postMessage');

});

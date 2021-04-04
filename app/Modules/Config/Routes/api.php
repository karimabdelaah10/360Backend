<?php
Route::group(['prefix' => 'configs' , 'as' => 'specs.'], function () {
    Route::get('/', 'Api\ConfigApiController@getConfigByTitle');
});

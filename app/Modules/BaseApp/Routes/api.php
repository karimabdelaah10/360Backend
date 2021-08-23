<?php

Route::group(['prefix' => 'Basic', 'as' => 'specs.'], function () {
    Route::get('/init/', 'Api\BasicApiController@init');
    Route::get('/search/{search_key}', 'Api\BasicApiController@search');
});

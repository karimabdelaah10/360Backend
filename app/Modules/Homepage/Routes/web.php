<?php
Route::group([], function () {
    Route::get('/', 'HomepageController@getIndex');
});

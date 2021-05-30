<?php
Route::group([], function () {
    Route::get('/', 'HomepageController@getIndex');
    Route::get('/clear',function(){
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        return "clear done";
    });
});

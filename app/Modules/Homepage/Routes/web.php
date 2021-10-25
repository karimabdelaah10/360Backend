<?php
Route::group([
    'middleware' => ['IsProduction'],
], function () {
    Route::get('/', 'HomepageController@getIndex')->name('homepage');
    Route::get('/clear',function(){
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        return "clear done";
    });
});
Route::group([
], function () {
    Route::get('/under_construction', 'HomepageController@getUnderConstruction')->name('under_construction');
});
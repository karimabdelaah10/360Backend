<?php
Route::group([
    'prefix'=>'aboutus',
    'middleware' => ['IsProduction'],
], function () {

    Route::get('/', 'AboutUsController@getIndex')->name('getAboutUS');

});

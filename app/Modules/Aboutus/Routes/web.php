<?php
Route::group([
    'prefix'=>'aboutus'
], function () {

    Route::get('/', 'AboutUsController@getIndex');

});

<?php
Route::group([
    'prefix'=>'contactus',
    'middleware' => ['IsProduction'],
], function () {

    Route::get('/', 'ContactMessagesController@getIndex');
    Route::post('/', 'ContactMessagesController@postMessage');

});

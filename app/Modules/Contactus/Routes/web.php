<?php
Route::group([
    'prefix'=>'contactus'
], function () {

    Route::get('/', 'ContactMessagesController@getIndex');
    Route::post('', 'ContactMessagesController@postMessage');

});

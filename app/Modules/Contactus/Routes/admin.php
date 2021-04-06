<?php
Route::group([
    'middleware' => ['auth'],
    'prefix'=>'admin/contact-messages'
], function () {

    Route::get('/', 'ContactMessagesController@getIndex');
    Route::get('/view/{id}', 'ContactMessagesController@getView');
    Route::get('/delete/{id}', 'ContactMessagesController@getDelete');
    Route::get('/clear', 'ContactMessagesController@clearAll');

    });

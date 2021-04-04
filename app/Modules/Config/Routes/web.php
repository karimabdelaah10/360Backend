
<?php

Route::group([
    'middleware' => [ 'auth','IsSuperAdmin']
], function () {
    Route::group(['prefix' => 'configs' , 'as' => 'configs.'], function () {
        Route::get('/edit', 'ConfigController@getEdit');
        Route::post('/edit', 'ConfigController@postEdit');
  });
});

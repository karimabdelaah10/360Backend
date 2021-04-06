<?php
Route::group([], function () {
    Route::get('/', function (){
        return view('welcome');
    });
});

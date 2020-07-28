<?php
Route::group(['namespace' => 'Email'], function() {
    Route::resource('email', 'EmailsController');
    Route::post('/get-emails', 'EmailsController@getDataTable')->name('email.get');
});

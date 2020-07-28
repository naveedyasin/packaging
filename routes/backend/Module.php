<?php
Route::group(['namespace' => 'Module'], function() {
    Route::resource('module', 'ModulesController');
    Route::resource('sub-module', 'SubModulesController');
//    Route::post('/get-emails', 'EmailsController@getDataTable')->name('email.get');
});

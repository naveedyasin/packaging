<?php
Route::group(['namespace' => 'Service'], function() {
    Route::resource('service', 'ServicesController');
    Route::post('/get-services', 'ServicesController@getDataTable')->name('service.get');
});

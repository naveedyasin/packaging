<?php
Route::group(['namespace' => 'Box'], function() {
    Route::resource('box', 'BoxesController');
    Route::post('/get-box', 'BoxesController@getDataTable')->name('box.get');
});

<?php
Route::group(['namespace' => 'Page'], function() {
    Route::resource('page', 'PagesController');
    Route::post('/get-page', 'PagesController@getDataTable')->name('page.get');
});

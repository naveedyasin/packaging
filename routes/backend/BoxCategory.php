<?php
Route::group(['namespace' => 'Box'], function() {
    Route::resource('boxcategory', 'BoxCategoriesController');
    Route::post('/getbox-cat', 'BoxCategoriesController@getDataTable')->name('boxcategory.get');
});

<?php
Route::group(['namespace' => 'Blog'], function() {
    Route::resource('category', 'CategoriesController');
    Route::post('/get-cat', 'CategoriesController@getDataTable')->name('category.get');
});

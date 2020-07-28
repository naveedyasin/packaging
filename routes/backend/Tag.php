<?php
Route::group(['namespace' => 'Blog'], function() {
    Route::resource('tag', 'TagsController');
    Route::post('/get-tag', 'TagsController@getDataTable')->name('tag.get');
    Route::post('tag/update', 'TagsController@update')->name('tag.update');
    Route::get('tag/destroy/{id}', 'TagsController@destroy')->name('tag.delete');
});

<?php
Route::group(['namespace' => 'Blog'], function() {
    Route::resource('post', 'PostsController');
    Route::post('/get-post', 'PostsController@getDataTable')->name('post.get');
});

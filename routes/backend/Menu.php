<?php
Route::group(['namespace' => 'Menu'], function() {
    Route::get('menu', 'MenuController@index')->name('menu.index');
});

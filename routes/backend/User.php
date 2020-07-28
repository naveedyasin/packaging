<?php
Route::group(['namespace' => 'User'], function() {
    Route::resource('user', 'UsersController');
    Route::post('/get-users', 'UsersController@getDataTable')->name('user.get');
    Route::get('profile/{admin}', 'UsersController@myProfile')->name('my.profile');
    Route::put('profile/{admin}', 'UsersController@updateProfile')->name('profile.update');
    Route::put('profile/password/{admin}', 'UsersController@updatePassword')->name('password.update');
});

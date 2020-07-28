<?php
Route::get('/settings', 'SettingsController@index')->name('settings');
Route::post('/update-settings/{setting}', 'SettingsController@updateBasic')->name('basic.settings');
Route::post('/update-email/{setting}', 'SettingsController@updateEmail')->name('email.settings');
Route::post('/update-seo/{setting}', 'SettingsController@updateSEO')->name('seo.settings');
Route::post('/update-cookie/{setting}', 'SettingsController@updateCookieSetting')->name('cookie.settings');

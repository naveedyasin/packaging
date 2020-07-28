<?php
Route::group(['namespace' => 'Permission'], function() {
    Route::resource('permission', 'PermissionsController');
    Route::post('get-permissions', 'PermissionsController@getDataTable')->name('permission.get');

    Route::post('get-deleted-permissions', 'PermissionsDeletedController@getDataTable')->name('deleted.permission.get');
    Route::get('permissions-deleted', 'PermissionsDeletedController@index')->name('permissions-deleted');
    Route::get('permission-deleted/{id}', 'PermissionsDeletedController@show')->name('permission-show-deleted');
    Route::put('permission-restore/{id}', 'PermissionsDeletedController@restorePermission')->name('permission-restore');
    Route::post('permissions-deleted-restore-all', 'PermissionsDeletedController@restoreAllDeletedPermissions')->name('permissions-deleted-restore-all');
    Route::delete('permissions-deleted-destroy-all', 'PermissionsDeletedController@destroyAllDeletedPermissions')->name('destroy-all-deleted-permissions');
    Route::delete('permission-destroy/{id}', 'PermissionsDeletedController@destroy')->name('permission-item-destroy');
});

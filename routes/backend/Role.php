<?php
Route::group(['namespace' => 'Role'], function() {
    Route::resource('role', 'RolesController');
    Route::post('/get-roles', 'RolesController@getDataTable')->name('role.get');

    Route::post('/get-deleted-roles', 'RolesDeletedController@getDataTable')->name('deleted.role.get');
    // Deleted Roles Dashboard and CRUD Routes
    Route::get('roles-deleted', 'RolesDeletedController@index')->name('roles-deleted');
    Route::get('role-deleted/{id}', 'RolesDeletedController@show')->name('role-show-deleted');
    Route::put('role-restore/{id}', 'RolesDeletedController@restoreRole')->name('role-restore');
    Route::post('roles-deleted-restore-all', 'RolesDeletedController@restoreAllDeletedRoles')->name('roles-deleted-restore-all');
    Route::delete('roles-deleted-destroy-all', 'RolesDeletedController@destroyAllDeletedRoles')->name('destroy-all-deleted-roles');
    Route::delete('role-destroy/{id}', 'RolesDeletedController@destroy')->name('role-item-destroy');
});

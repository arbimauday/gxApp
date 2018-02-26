<?php

/*
|--------------------------------------------------------------------------
| Backpack\BackupManager Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the Backpack\BackupManager package.
|
*/

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
], function () {
    Route::get('backup', 'BackupController@index');
    Route::get('backup/create', 'BackupController@create');
    Route::get('backup/download/{file_name?}', 'BackupController@download');
    Route::get('backup/delete/{file_name?}', 'BackupController@delete')->where('file_name', '(.*)');
});

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::prefix('user')->group(function() {
//     Route::get('/', 'UserController@index');
// });

Route::get('/profile','ProfileController@index')->name('profile.index')->middleware('role:admin');
Route::put('/profile','ProfileController@update')->name('profile.update')->middleware('role:admin');
Route::post('/change-passwrod','ProfileController@changePassword')->name('profile.change_password')->middleware('role:admin');


Route::prefix('roles')->group(function() {
    Route::get('/', 'RoleController@index')->name('roles.index')->middleware('role:admin');
    Route::post('/', 'RoleController@store')->name('roles.store')->middleware('role:admin');
    Route::get('/create', 'RoleController@create')->name('roles.create')->middleware('role:admin');
    Route::get('/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('role:admin');
    Route::delete('/delete', 'RoleController@destroy')->name('roles.destroy')->middleware('role:admin');
    Route::get('/role-permission', 'RoleController@role_permission')->name('roles.role_permission')->middleware('role:admin');
    Route::post('/give-role-permission', 'RoleController@give_rolePermission')->name('roles.give_rolePermission')->middleware('role:admin');
});


Route::prefix('permissions')->group(function() {
    Route::get('/', 'PermissionController@index')->name('permissions.index')->middleware('role:admin');
    Route::post('/', 'PermissionController@store')->name('permissions.store')->middleware('role:admin');
    Route::get('/create', 'PermissionController@create')->name('permissions.create')->middleware('role:admin');
    Route::get('/{permission}/edit', 'PermissionController@edit')->name('permissions.edit')->middleware('role:admin');
    Route::delete('/delete', 'PermissionController@destroy')->name('permissions.destroy')->middleware('role:admin');
});


Route::prefix('users')->group(function() {
    Route::get('/', 'UserController@index')->name('users.index')->middleware('role:admin');
    Route::post('/', 'UserController@store')->name('users.store')->middleware('role:admin');
    Route::get('/create', 'UserController@create')->name('users.create')->middleware('role:admin');
    Route::get('/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('role:admin');
    Route::delete('/delete', 'UserController@destroy')->name('users.destroy')->middleware('role:admin');
    Route::post('/change-passwrod','UserController@changePassword')->name('users.change_password')->middleware('role:admin');
});


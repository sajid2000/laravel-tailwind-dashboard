<?php

use Illuminate\Support\Facades\Route;

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

// Admin route
Route::name('admin.')->prefix('admin')->namespace('Admin')->middleware(['auth'])->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::delete('users/delete-selected', 'UserController@destroyMany')->name('users.destroyMany');
    Route::resource('users', 'UserController');

    Route::delete('roles/delete-selected', 'RoleController@destroyMany')->name('roles.destroyMany');
    Route::resource('roles', 'RoleController');
});

// Front route
Route::name('front.')->namespace('Front')->middleware(['guest'])->group(function () {
    Route::get('/', 'FrontController@index')->name('index');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    
    // user management
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

    // property management
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('properties', \App\Http\Controllers\Admin\PropertyController::class);
    Route::resource('properties.features', \App\Http\Controllers\Admin\FeatureController::class);
    Route::resource('properties.galleries', \App\Http\Controllers\Admin\GalleryController::class);
    Route::resource('messages', \App\Http\Controllers\Admin\MessageController::class)->only('index','destroy');
});

Auth::routes();


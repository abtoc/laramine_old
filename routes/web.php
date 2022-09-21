<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'user'], function(){
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('can:view,user');
    });
    Route::get('/my/password', [MyController::class, 'password'])->name('my.password');
    Route::post('/my/password', [MyController::class, 'password_update'])->name('my.password.update');
});

Route::group(['middleware' => ['auth', 'user', 'can:admin']], function(){
    Route::view('/admin', 'admin')->name('admin');
    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{user}/edit', 'edit')->name('edit');
        Route::post('{user}', 'update')->name('update');
        Route::delete('{user}', 'destroy')->name('destroy');
        Route::post('{user}/lock', 'lock')->name('lock');
        Route::post('{user}/unlock', 'active')->name('active');
    });
    Route::controller(GroupController::class)->prefix('groups')->name('groups.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{user}/edit', 'edit')->name('edit');
        Route::post('{user}', 'update')->name('update');
        Route::delete('{user}', 'destroy')->name('destroy');
        Route::get('{user}/users', 'users')->name('users');
        Route::delete('{user}/users/{id}', 'users_destroy')->name('users.destroy');
    });
});
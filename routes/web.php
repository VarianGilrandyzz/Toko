<?php

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', 'HomeController@index')->name('admin.home');
Route::get('admin/profile', 'homeController@profile')->name('admin.profile');

Route::resource('admin/user', UserController::class);
Route::resource('admin/barang', BarangController::class);



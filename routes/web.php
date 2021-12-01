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

Route::get('/', 'UserHomeController@index')->name('home');
Route::get('/pemesanan', 'UserHomeController@pemesanan')->name('pemesanan');

Route::get('admin', 'AdminHomeController@index')->name('admin.home');

Route::resource('admin/user', UserController::class);
Route::resource('admin/barang', BarangController::class);



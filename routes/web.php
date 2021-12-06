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
Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::get('/', 'UserHomeController@index')->name('home');
Route::get('/pemesanan', 'UserHomeController@pemesanan')->name('pemesanan');
Route::post('/pemesananProses', 'UserHomeController@pemesananProses')->name('proses.pemesanan');
Route::get('admin', 'AdminHomeController@index')->name('admin.home');

// route resource
Route::resource('admin/user', UserController::class);
Route::resource('admin/barang', BarangController::class);
Route::resource('admin/pembeli', PembeliController::class);



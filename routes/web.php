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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
	Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
	Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
	Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
	Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
	Route::get('mobil', ['as' => 'pages.mobil', 'uses' => 'App\Http\Controllers\MobilController@index']);
	Route::get('peminjaman', ['as' => 'pages.peminjaman', 'uses' => 'App\Http\Controllers\PeminjamanController@cek']);
	Route::get('kembalian', ['as' => 'pages.kembalian', 'uses' => 'App\Http\Controllers\KembaliController@cek']);
	Route::get('peminjam', ['as' => 'pages.peminjam', 'uses' => 'App\Http\Controllers\PeminjamanController@pinjam']);
	Route::get('kembalis', ['as' => 'pages.kembalis', 'uses' => 'App\Http\Controllers\KembaliController@kembalis']);
	Route::post('transaksi', ['as' => 'pages.transaksi', 'uses' => 'App\Http\Controllers\PeminjamanController@transaksi']);
	Route::post('transaksikembali', ['as' => 'pages.transaksikembali', 'uses' => 'App\Http\Controllers\KembaliController@transaksi']);
	Route::get('mobil-create', ['as' => 'pages.mobil.create', 'uses' => 'App\Http\Controllers\MobilController@create']);

	Route::post('mobil-store', ['as' => 'pages.mobil.store', 'uses' => 'App\Http\Controllers\MobilController@store']);
	Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
	Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('user/input', ['as' => 'user.input', 'uses' => 'App\Http\Controllers\UserController@create']);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
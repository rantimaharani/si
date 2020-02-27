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

Route::get('home', function () {
    return view('welcome');
});

Auth::routes();



// Route::group(['prefix' => 'admin' , 'middleware' => 'auth'], function () {
//     Route::resource('kategori','KategoriController');
// });
Route::group(['prefix' => 'admin' , 'middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('kategori','KategoriController');
    Route::resource('informasi','InformasiController');
    Route::resource('daftar_roti','DaftarRotiController');
    });

    
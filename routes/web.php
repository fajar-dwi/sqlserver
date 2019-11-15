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

Route::get('/coba', function () {
    return view('coba');
});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/manage-buku', 'BukuController@index')->name('manage-buku');
Route::put('/manage-buku/edit', 'BukuController@update')->name('manage-buku.update');
Route::post('/manage-buku/tambah','BukuController@store')->name('manage-buku.tambah');
Route::delete('/manage-buku/hapus/{id}','BukuController@destroy')->name('manage-buku.hapus');
Route::get('/manage-user','UserController@index')->name('manage-user');
Route::put('/manage-user/edit', 'UserController@update')->name('manage-user.update');
Route::post('/manage-user/tambah', 'UserController@store')->name('manage-user.tambah');
Route::delete('/manage-user/hapus/{id}','UserController@destroy')->name('manage-user.hapus');


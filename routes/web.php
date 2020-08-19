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
    return view('home');
});



Route::get('/mhs', 'MahasiswaController@index');
Route::post('/mhs/store', 'MahasiswaController@store');
Route::post('/mhs/update', 'MahasiswaController@update');
Route::get('/mhs/hapus/{id}', 'MahasiswaController@destroy');

Route::get('/dosen', 'DosenController@index');
Route::post('/dosen/store', 'DosenController@store');
Route::post('/dosen/update', 'DosenController@update');
Route::get('/dosen/hapus/{id}', 'DosenController@destroy');

Route::get('/jurusan', 'JurusanController@index');
Route::post('/jurusan/store', 'JurusanController@store');
Route::post('/jurusan/update', 'JurusanController@update');
Route::get('/jurusan/hapus/{id}', 'JurusanController@destroy');	

Route::get('/mk', 'MatakuliahController@index');
Route::post('/mk/store', 'MatakuliahController@store');
Route::post('/mk/update', 'MatakuliahController@update');
Route::get('/mk/hapus/{id}', 'MatakuliahController@destroy');

Route::get('/nilai', 'NilaiController@index');
Route::post('/nilai/store', 'NilaiController@store');
Route::post('/nilai/update', 'NilaiController@update');
Route::get('/nilai/hapus/{id}', 'NilaiController@destroy');

Route::get('/akt', 'AngkatanController@index');
Route::post('/akt/store', 'AngkatanController@store');
Route::post('/akt/update', 'AngkatanController@update');
Route::get('/akt/hapus/{id}', 'AngkatanController@destroy');

Route::get('/jdw', 'JadwalController@index');
Route::post('/jdw/store', 'JadwalController@store');
Route::post('/jdw/update', 'JadwalController@update');
Route::get('/jdw/hapus/{id}', 'JadwalController@destroy');

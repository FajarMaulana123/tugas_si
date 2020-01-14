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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', 'Sekolah@login');
Route::post('/login', 'Sekolah@loginpost');
Route::get('/logout', 'Sekolah@logout');
Route::get('/index', 'Sekolah@index');
Route::get('/datasiswa', 'Sekolah@datasiswa');
Route::post('/datasiswa/tambah', 'Sekolah@tambahsiswa');
Route::post('/datasiswa/{id}', 'Sekolah@editsiswa');
Route::get('/hapussiswa/{id}', 'Sekolah@hapussiswa');
Route::post('/tahunajaran', 'Sekolah@tahun');

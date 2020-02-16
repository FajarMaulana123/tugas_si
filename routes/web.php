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
Route::post('/gantipass/{id}', 'Sekolah@gantipass');
Route::get('/logout', 'Sekolah@logout');
Route::get('/index', 'Sekolah@index');
Route::get('/datasiswa', 'Sekolah@datasiswa');
Route::post('/datasiswa/tambah', 'Sekolah@tambahsiswa');
Route::post('/datasiswa/{id}', 'Sekolah@editsiswa');
Route::get('/hapussiswa/{id}', 'Sekolah@hapussiswa');
Route::post('/tahunajaran', 'Sekolah@tahun');
Route::get('/spp', 'Sekolah@spp');
Route::post('/tarif', 'Sekolah@tarif');
Route::get('/hapustarif/{id}', 'Sekolah@hapustarif');
Route::get('/datapembayaran', 'Sekolah@datapembayaran');
Route::post('/status', 'Sekolah@status');

Route::get('/siswa', 'Siswa@siswa');
Route::get('/carisiswa', 'Siswa@carisiswa');
Route::post('/pembayaran', 'Siswa@pembayaran');

Route::get('/loginadmin', 'Admin@login');
Route::post('/loginadmin', 'Admin@loginpost');
Route::get('/logoutadmin', 'Admin@logout');
Route::post('/gantipassadmin/{id}', 'Admin@gantipassadmin');
Route::get('/admin', 'Admin@index'); 
Route::get('/datasekolah', 'Admin@datasekolah');
Route::get('/daftarsekolah', 'Admin@daftarsekolah');
Route::post('/daftarsekolah', 'Admin@daftar');
Route::get('/hapussekolah/{id}', 'Admin@hapussekolah');

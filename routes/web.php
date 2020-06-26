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


Route::group(['middleware' => 'guest'], function() {
  Route::get('/login','AuthController@login') -> name('login');
  Route::post('/postlogin','AuthController@postlogin');
});
  Route::get('/logout','AuthController@logout');
  Route::get('/view','BukuController@liat');
  Route::get('/view/{id}/detail','BukuController@liatdetail');
  Route::get('/laporan/{aktif}/exportsiswa','SiswaController@export');
  Route::get('/laporan/{jenis}/exportbuku','BukuController@export');
  Route::post('/pengaturan/import','DendaController@importexcel');

Route::group(['middleware' => 'revalidate'], function() {
  Route::group(['middleware' => 'auth'], function() {
  Route::get('/','SiswaController@home');
  Route::get('/daftarsiswa/aktif','SiswaController@index');
  Route::get('/daftarsiswa/tidakaktif','SiswaController@tidakaktif');
  Route::get('/daftarsiswa/{id}/edit','SiswaController@edit');
  Route::post('/daftarsiswa/buat','SiswaController@buat');
  Route::get('/daftarsiswa/{id}/hapus','SiswaController@hapus');
  Route::post('/daftarsiswa/{id}/update','SiswaController@update');
  Route::get('/daftarsiswa/{id}/detail','SiswaController@detail');

  Route::get('/daftarbuku/tematik','BukuController@index');
  Route::get('/daftarbuku/nontematik','BukuController@nontematik');
  Route::post('/daftarbuku/buat','BukuController@buat');
  Route::get('/daftarbuku/{id}/hapus','BukuController@hapus');
  Route::get('/daftarbuku/{id}/edit','BukuController@edit');
  Route::get('/daftarbuku/{id}/pinjam','BukuController@pinjam');
  Route::get('/daftarbuku/{id}/detail','BukuController@detail');
  Route::post('/daftarbuku/{id}/pinjambuku','BukuController@pinjambuku');
  Route::post('/daftarbuku/{id}/update','BukuController@update');

  Route::get('/daftartransaksi/{id}/pinjam','TransController@pinjam');
  Route::get('/daftartransaksi/{id}/buat','TransController@buat');
  Route::get('/daftartransaksi/{id}/kembali','TransController@kembali');
  Route::get('/daftartransaksi/{id}/{buku}/kembalikan','TransController@kembalikan');
  Route::post('/daftartransaksi/{id}/perpanjang','TransController@perpanjang');
  Route::get('/daftartransaksi/aktif','TransController@index');
  Route::get('/daftartransaksi/semua','TransController@semua');


  Route::get('/pengaturan','DendaController@index');
  Route::get('/pengaturan/lulus','DendaController@lulus');
  Route::get('/pengaturan/hapus','DendaController@hapus');
  Route::post('/pengaturan/{id}/update','DendaController@update');
  Route::post('/pengaturan/pass','DendaController@gantipass');

  Route::get('/laporan','TransController@laporan');
  Route::get('/laporan/semuatransaksi','TransController@semuatransaksi');
  Route::post('/laporan/transaksi','TransController@transaksi');
  
});
});




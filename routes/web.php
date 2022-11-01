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

// Route::get('/', function () {
//     return view('welcome');
// });

/* FRONT END */
// Home
Route::get('/', 'Home@index');
Route::get('home', 'Home@index');
Route::get('kontak', 'Home@kontak');
// Login
Route::get('login', 'Login@index');
Route::post('login/cek', 'Login@cek');
Route::get('login/lupa', 'Login@lupa');
Route::get('login/logout', 'Login@logout');
// Berita
Route::get('berita', 'Berita@index');
Route::get('berita/read/{par1}', 'Berita@read');
// Bantuan
Route::get('bantuan', 'Bantuan@cari');
Route::get('bantuan', 'Bantuan@index');
// galeri
Route::get('galeri', 'Galeri@index');
Route::get('galeri/detail/{par1}', 'Galeri@detail');
/* END FRONT END */
/* BACK END */
Route::group(['namespace' => 'Admin'],
function()
{
	// dasbor
    Route::get('admin/dasbor', 'Dasbor@index');
    Route::get('admin/dasbor/konfigurasi', 'Dasbor@konfigurasi');
    // user
    Route::get('admin/user', 'User@index');
    Route::post('admin/user/tambah', 'User@tambah');
    Route::get('admin/user/edit/{par1}', 'User@edit');
    Route::post('admin/user/proses_edit', 'User@proses_edit');
    Route::get('admin/user/delete/{par1}', 'User@delete');
    Route::post('admin/user/proses', 'User@proses');
    // konfigurasi
    Route::get('admin/konfigurasi', 'Konfigurasi@index');
    Route::get('admin/konfigurasi/logo', 'Konfigurasi@logo');
    Route::get('admin/konfigurasi/icon', 'Konfigurasi@icon');
    Route::get('admin/konfigurasi/email', 'Konfigurasi@email');
    Route::get('admin/konfigurasi/gambar', 'Konfigurasi@gambar');
    Route::get('admin/konfigurasi/pembayaran', 'Konfigurasi@pembayaran');
    Route::post('admin/konfigurasi/proses', 'Konfigurasi@proses');
    Route::post('admin/konfigurasi/proses_logo', 'Konfigurasi@proses_logo');
    Route::post('admin/konfigurasi/proses_icon', 'Konfigurasi@proses_icon');
    Route::post('admin/konfigurasi/proses_email', 'Konfigurasi@proses_email');
    Route::post('admin/konfigurasi/proses_gambar', 'Konfigurasi@proses_gambar');
    Route::post('admin/konfigurasi/proses_pembayaran', 'Konfigurasi@proses_pembayaran');
    // berita
    Route::get('admin/berita', 'Berita@index');
    Route::get('admin/berita/cari', 'Berita@cari');
    Route::get('admin/berita/status_berita/{par1}', 'Berita@status_berita');
    Route::get('admin/berita/kategori/{par1}', 'Berita@kategori');
    Route::get('admin/berita/jenis_berita/{par1}', 'Berita@jenis_berita');
    Route::get('admin/berita/author/{par1}', 'Berita@author');
    Route::get('admin/berita/tambah', 'Berita@tambah');
    Route::get('admin/berita/edit/{par1}', 'Berita@edit');
    Route::get('admin/berita/delete/{par1}', 'Berita@delete');
    Route::post('admin/berita/tambah_proses', 'Berita@tambah_proses');
    Route::post('admin/berita/edit_proses', 'Berita@edit_proses');
    Route::post('admin/berita/proses', 'Berita@proses');
    // kategori
    Route::get('admin/kategori', 'Kategori@index');
    Route::post('admin/kategori/tambah', 'Kategori@tambah');
    Route::post('admin/kategori/edit', 'Kategori@edit');
    Route::get('admin/kategori/delete/{par1}', 'Kategori@delete');
    // kategori_bantuan
    Route::get('admin/kategori_bantuan', 'Kategori_bantuan@index');
    Route::post('admin/kategori_bantuan/tambah', 'Kategori_bantuan@tambah');
    Route::post('admin/kategori_bantuan/edit', 'Kategori_bantuan@edit');
    Route::get('admin/kategori_bantuan/delete/{par1}', 'Kategori_bantuan@delete');
    // kategori_galeri
    Route::get('admin/kategori_galeri', 'Kategori_galeri@index');
    Route::post('admin/kategori_galeri/tambah', 'Kategori_galeri@tambah');
    Route::post('admin/kategori_galeri/edit', 'Kategori_galeri@edit');
    Route::get('admin/kategori_galeri/delete/{par1}', 'Kategori_galeri@delete');
    // galeri
    Route::get('admin/galeri', 'Galeri@index');
    Route::get('admin/galeri/cari', 'Galeri@cari');
    Route::get('admin/galeri/status_galeri/{par1}', 'Galeri@status_galeri');
    Route::get('admin/galeri/kategori/{par1}', 'Galeri@kategori');
    Route::get('admin/galeri/tambah', 'Galeri@tambah');
    Route::get('admin/galeri/edit/{par1}', 'Galeri@edit');
    Route::get('admin/galeri/delete/{par1}', 'Galeri@delete');
    Route::post('admin/galeri/tambah_proses', 'Galeri@tambah_proses');
    Route::post('admin/galeri/edit_proses', 'Galeri@edit_proses');
    Route::post('admin/galeri/proses', 'Galeri@proses');
    // bantuan
    Route::get('admin/bantuan', 'Bantuan@index');
    Route::get('admin/bantuan/cari', 'Bantuan@cari');
    Route::get('admin/bantuan/status_bantuan/{par1}', 'Bantuan@status_bantuan');
    Route::get('admin/bantuan/kategori/{par1}', 'Bantuan@kategori');
    Route::get('admin/bantuan/tambah', 'Bantuan@tambah');
    Route::get('admin/bantuan/edit/{par1}', 'Bantuan@edit');
    Route::get('admin/bantuan/unduh/{par1}', 'Bantuan@unduh');
    Route::get('admin/bantuan/delete/{par1}', 'Bantuan@delete');
    Route::post('admin/bantuan/tambah_proses', 'Bantuan@tambah_proses');
    Route::post('admin/bantuan/edit_proses', 'Bantuan@edit_proses');
    Route::post('admin/bantuan/proses', 'Bantuan@proses');
     // warga
     Route::get('admin/warga', 'Warga@index');
     Route::get('admin/warga/cari', 'Warga@cari');
     Route::get('admin/warga/status_warga/{par1}', 'Warga@status_warga');
     Route::get('admin/warga/kategori/{par1}', 'Warga@kategori');
     Route::get('admin/warga/tambah', 'Warga@tambah');
     Route::get('admin/warga/edit/{par1}', 'Warga@edit');
     Route::get('admin/warga/delete/{par1}', 'Warga@delete');
     Route::post('admin/warga/tambah_proses', 'Warga@tambah_proses');
     Route::post('admin/warga/edit_proses', 'Warga@edit_proses');
     Route::post('admin/warga/proses', 'Warga@proses');
     Route::get('admin/warga/cetak', 'Warga@cetak');
});
/* END BACK END*/
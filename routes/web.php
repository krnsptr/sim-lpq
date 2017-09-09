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



//Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('daftar', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('daftar', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/jadwal', 'ControllerJadwal@jadwal_KBM');

Route::group(['prefix' => 'dasbor', 'middleware' => ['role:member']], function() {
    Route::get('/', 'ControllerMember@index');

    Route::get('/akun', 'ControllerMember@edit');
    Route::post('/akun/edit', 'ControllerMember@simpan');
    Route::post('/akun/password', 'ControllerMember@password_simpan');

    Route::post('/program/tambah', 'ControllerMember@program_baru');
    Route::post('/program/tambah/pengajar', 'ControllerPengajar@tambah');
    Route::post('/program/tambah/santri', 'ControllerSantri@tambah');

    Route::post('/program/edit', 'ControllerMember@program_edit');
    Route::post('/program/edit/pengajar', 'ControllerPengajar@simpan');
    Route::post('/program/edit/santri', 'ControllerSantri@simpan');

    Route::post('/program/hapus', 'ControllerMember@program_konfirmasiHapus');
    Route::post('/program/hapus/pengajar', 'ControllerPengajar@hapus');
    Route::post('/program/hapus/santri', 'ControllerSantri@hapus');

    Route::get('/penjadwalan', 'ControllerJadwal@index');
    Route::post('/penjadwalan/ganti', 'ControllerJadwal@ganti');
    Route::post('/penjadwalan/tambah', 'ControllerJadwal@tambah');
    Route::post('/penjadwalan/edit', 'ControllerJadwal@simpan');
    Route::post('/penjadwalan/kapasitas-membina', 'ControllerPengajar@kapasitas_membina_simpan');
    Route::get('/penjadwalan/hapus', 'ControllerJadwal@konfirmasiHapus');
    Route::post('/penjadwalan/hapus', 'ControllerJadwal@hapus');

    Route::get('/kelompok', 'ControllerKelompok@index');

    Route::get('/spp', 'ControllerSPP@index');

    //Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::get('/', 'ControllerAdmin@index');
    Route::get('/statistik', 'ControllerAdmin@statistik');
    Route::post('/pengaturan/edit', 'ControllerAdmin@pengaturan_simpan');
    Route::get('/download', 'ControllerAdmin@download');
    Route::post('/download/proses', 'ControllerAdmin@download_proses');

    Route::get('/anggota', 'ControllerMember@member_index');
    Route::post('/anggota/tambah', 'ControllerMember@tambah');
    Route::post('/anggota/edit', 'ControllerMember@simpan');
    Route::post('/anggota/hapus', 'ControllerMember@hapus');
    Route::post('/anggota/password', 'ControllerMember@password_simpan');

    Route::get('/pengajar', 'ControllerPengajar@index');
    Route::post('/pengajar/pengajar', 'ControllerPengajar@pengajar');
    Route::post('/pengajar/tambah', 'ControllerPengajar@tambah');
    Route::post('/pengajar/edit', 'ControllerPengajar@simpan');
    Route::post('/pengajar/hapus', 'ControllerPengajar@hapus');
    Route::get('/pengajar/ekspor/excel', 'ControllerPengajar@ekspor_excel');

    Route::get('/santri', 'ControllerSantri@index');
    Route::post('/santri/santri', 'ControllerSantri@santri');
    Route::post('/santri/kelompok', 'ControllerKelompok@kelompok');
    Route::post('/santri/tambah', 'ControllerSantri@tambah');
    Route::post('/santri/edit', 'ControllerSantri@simpan');
    Route::post('/santri/hapus', 'ControllerSantri@hapus');
    Route::get('/santri/ekspor/excel', 'ControllerSantri@ekspor_excel');

    Route::get('/kelompok', 'ControllerKelompok@index');
    Route::post('/kelompok/jadwal', 'ControllerKelompok@jadwal');
    Route::post('/kelompok/jadwal/tambah', 'ControllerJadwal@tambah');
    Route::post('/kelompok/jadwal/edit', 'ControllerJadwal@simpan');
    Route::post('/kelompok/jadwal/kapasitas-membina', 'ControllerPengajar@kapasitas_membina_simpan');
    Route::post('/kelompok/jadwal/hapus', 'ControllerJadwal@hapus');
    Route::post('/kelompok/tambah', 'ControllerKelompok@tambah');
    Route::post('/kelompok/hapus', 'ControllerKelompok@hapus');

    Route::get('/spp', 'ControllerSPP@index');
    Route::post('/spp/edit', 'ControllerSPP@simpan');

    //Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});

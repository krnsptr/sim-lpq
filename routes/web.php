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

Route::get('/login', function () {
    return view('login');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/user/dasbor', function () {
    return view('user.dasbor');
});

Route::get('/user/akun', function () {
    return view('user.akun');
});

Route::get('/user/kelompok', function () {
    return view('user.kelompok');
});

Route::get('/user/penjadwalan', function () {
    return view('user.penjadwalan');
});

Route::get('/user/penjadwalan-hapus', function () {
    return view('user.penjadwalan-hapus');
});

Route::get('/user/program-edit', function () {
    return view('user.program-edit');
});

Route::get('/user/program-hapus', function () {
    return view('user.program-hapus');
});

Route::get('/user/program-tambah', function () {
    return view('user.program-tambah');
});

Route::get('/user/spp', function () {
    return view('user.spp');
});

Route::get('/admin/anggota', function () {
    return view('admin.anggota');
});

Route::get('/admin/beranda', function () {
    return view('admin.beranda');
});
Route::get('/admin/dasbor', function () {
    return view('admin.dasbor');
});

Route::get('/admin/download', function () {
    return view('admin.download');
});

Route::get('/admin/santri', function () {
    return view('admin.santri');
});
Route::get('/admin/pengajar', function () {
    return view('admin.pengajar');
});
Route::get('/admin/kelompok', function () {
    return view('admin.kelompok');
});


//Auth::routes();
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('daftar', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('daftar', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::group(['prefix' => 'dasbor', 'middleware' => ['role:member']], function() {
    Route::get('/', 'ControllerMember@index');
    //Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::get('/', 'ControllerAdmin@index');
    //Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
});

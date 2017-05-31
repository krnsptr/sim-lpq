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

Route::get('/', function () {
    return view('beranda');
});
Route::get('/masuk', function () {
    return view('login');
});
Route::get('user/dasbor', 'userController@index');

Route::get('/user/akun', function () {
    return view('user.akun');
});

Route::get('/user/dasbor', function () {
    return view('user.dasbor');
});

Route::get('/user/kelompok', function () {
    return view('user.kelompok');
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

Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/admin/anggota', function () {
    return view('admin.anggota');
});

Route::get('/admin/beranda', function () {
    return view('admin.beranda');
});
Route::get('/admin/dashbor', function () {
    return view('admin.dashbor');
});
Route::get('/admin/download', function () {
    return view('admin.download');
});

Route::get('/admin/spp', function () {
    return view('admin.spp');
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
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/dasbor', 'ControllerMember@index');

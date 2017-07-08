<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sistem;
use Illuminate\Support\Facades\Input;

class ControllerAdmin extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Menampilkan halaman dasbor kepada admin
   */
  public function index()
  {
      return view('admin.dasbor');
  }

  /**
   * Memproses pengeditan pengaturan sistem dari admin
   */
  public function pengaturan_simpan()
  {
      $pengumuman = Input::get('pengumuman');
      $pendaftaran_pengajar = (int)Input::get('pendaftaran_pengajar');
      $pendaftaran_santri = (int)Input::get('pendaftaran_santri');
      $penjadwalan_pengajar = (int)Input::get('penjadwalan_pengajar');
      $penjadwalan_santri = (int)Input::get('penjadwalan_santri');
      $system=Sistem::first();
      $system->pengumuman=$pengumuman;
      $system->pendaftaran_pengajar=$pendaftaran_pengajar;
      $system->pendaftaran_santri=$pendaftaran_santri;
      $system->penjadwalan_pengajar=$penjadwalan_pengajar;
      $system->penjadwalan_santri=$penjadwalan_santri;




      if($system->save()) session()->flash('success', 'Jadwal berhasil disimpan');
      else session()->flash('error', 'Jadwal gagal disimpan');

      return redirect('admin/');
  }

  /**
   * Menampilkan halaman download kepada admin
   */
  public function download()
  {
      return view('admin.download');
  }

  /**
   * Memproses download file dari admin
   */
  public function download_proses()
  {
      //
  }
}

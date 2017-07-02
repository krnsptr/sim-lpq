<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sistem;

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
      $data['daftar_sistem'] = Sistem::all();
      return view('admin.dasbor',$data);
  }

  /**
   * Memproses pengeditan pengaturan sistem dari admin
   */
  public function pengaturan_simpan()
  {
      //
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

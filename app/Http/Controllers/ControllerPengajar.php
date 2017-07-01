<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengajar;

class ControllerPengajar extends Controller
{
  /**
   * Menampilkan daftar pengajar kepada admin
   */
  public function index()
  {
      $data['daftar_pengajar'] = Pengajar::all();
      return view('admin.Pengajar', $data);

  }

  /**
   * Memproses penambahan pengajar dari member dan admin
   */
  public function tambah()
  {
      //
      //if(Auth::user()->hasRole('admin'));
      //else;
  }

  /**
   * Memproses pengeditan pengajar dari member dan admin
   */
  public function simpan()
  {
      //
      //if(Auth::user()->hasRole('admin'));
      //else;
  }

  /**
   * Memproses penghapusan pengajar dari member dan admin
   */
  public function hapus()
  {
      //
      //if(Auth::user()->hasRole('admin'));
      //else;
  }
}

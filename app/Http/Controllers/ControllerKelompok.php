<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ControllerKelompok extends Controller
{
    /**
     * Menampilkan daftar kelompok kepada member dan admin
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin')) {
          //
          return view('admin.kelompok');
        }
        else {
          //
          return view('member.kelompok');
        }
    }

    /**
     * Memproses penambahan kelompok dari admin
     */
    public function tambah()
    {
        //
    }

    /**
     * Memproses penghapusan kelompok dari admin
     */
    public function hapus()
    {
        //
    }
}

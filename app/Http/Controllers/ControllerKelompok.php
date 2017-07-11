<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Pengajar;
use App\kelompok;

class ControllerKelompok extends Controller
{
    /**
     * Menampilkan daftar kelompok kepada member dan admin
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin')) {
          //
        $data['daftar_pengajar'] = Pengajar::all();
          return view('admin.kelompok', $data);
        }
        else {
          //
          return view('member.kelompok');
        }
    }

    /**
     * Memproses penambahan kelompok dari admin
     */
    public function edit()
    {
        //
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

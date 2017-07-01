<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ControllerSantri extends Controller
{
    /**
     * Menampilkan daftar santri kepada admin
     */
    public function index()
    {
        //
        return view('admin.santri');
    }

    /**
     * Memproses penambahan santri dari member dan admin
     */
    public function tambah()
    {
        //
        //if(Auth::user()->hasRole('admin'));
        //else;
    }

    /**
     * Memproses pengeditan santri dari member dan admin
     */
    public function simpan()
    {
        //
        //if(Auth::user()->hasRole('admin'));
        //else;
    }

    /**
     * Memproses penghapusan santri dari member dan admin
     */
    public function hapus()
    {
        //
        //if(Auth::user()->hasRole('admin'));
        //else;
    }
}

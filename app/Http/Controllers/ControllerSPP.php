<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerSPP extends Controller
{
    /**
     * Menampilkan daftar pembayaran SPP santri kepada member dan admin
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin')) {
          //
          return view('admin.spp');
        }
        else {
          //
          return view('member.spp');
        }
    }

    /**
     * Memproses pengeditan status pembayaran SPP dari admin
     */
    public function simpan()
    {
        //
    }
}

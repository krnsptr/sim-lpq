<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Santri;

class ControllerSPP extends Controller
{
    /**
     * Menampilkan daftar pembayaran SPP santri kepada member dan admin
     */
    public function index()
    {
        if(Auth::user()->hasRole('admin')) {
          //
          $data['daftar_santri'] = Santri::all();
          return view('admin.spp', $data);
        }
        else {
          $data['daftar_santri']= auth()->user()->daftar_santri;
          return view('member.spp', $data);
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

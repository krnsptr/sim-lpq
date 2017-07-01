<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerJadwal extends Controller
{
    /**
     * Menampilkan halaman penjadwalan kepada member
     */
    public function index()
    {
        //
        return view('member.penjadwalan');
    }

    /**
     * Menampilkan jadwal KBM kepada pengunjung
     */
    public function jadwal_KBM()
    {
        //
        return view('jadwal');
    }

    /**
     * Memproses penambahan jadwal pengajar dari member dan admin
     */
    public function tambah()
    {
        //
        //if(Auth::user()->hasRole('admin'));
        //else;
    }

    /**
     * Memproses pengeditan jadwal pengajar dari member dan admin
     */
    public function simpan()
    {
        //
        //if(Auth::user()->hasRole('admin'));
        //else;
    }

    /**
     * Memproses pengeditan kelompok santri dari member dan admin
     */
    public function ganti()
    {
        //
        //if(Auth::user()->hasRole('admin'));
        //else;
    }

    /**
     * Menampilkan halaman konfirmasi penghapusan jadwal pengajar kepada member
     */
    public function konfirmasiHapus()
    {
        //
        return view('member.penjadwalan-hapus');
    }

    /**
     * Memproses penghapusan jadwal pengajar dari member dan admin
     */
    public function hapus()
    {
        //
        //if(Auth::user()->hasRole('admin'));
        //else;
    }
}

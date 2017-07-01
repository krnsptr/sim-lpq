<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengajar;
use App\Santri;
use App\Jenis_program;
use App\Sistem;

class ControllerMember extends Controller
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
     * Menampilkan halaman dasbor kepada member
     */
    public function index()
    {
        $member = auth()->user();
        $data['daftar_pengajar'] = $member->daftar_pengajar;
        $data['daftar_santri'] = $member->daftar_santri;
        $data['daftar_jenis_program'] = Jenis_program::all();
        $data['pendaftaran_pengajar'] = Sistem::first()->pendaftaran_pengajar;
        $data['pendaftaran_santri'] = Sistem::first()->pendaftaran_santri;
        return view('member.dasbor', $data);
    }

    /**
     * Menampilkan daftar member kepada admin
     */
    public function member_index()
    {
        //
        return view('admin.anggota');
    }

    /**
     * Menampilkan halaman tambah program kepada member
     */
    public function program_baru()
    {
        //
        return view('member.program-tambah');
    }

    /**
     * Menampilkan halaman edit program kepada member
     */
    public function program_edit()
    {
        //
        return view('member.program-edit');
    }

    /**
     * Menampilkan halaman konfirmasi penghapusan program kepada member
     */
    public function program_konfirmasiHapus()
    {
        //
        return view('member.program-hapus');
    }

    /**
     * Memproses penambahan akun dari admin
     */
    public function tambah()
    {
        //
    }

    /**
     * Menampilkan halaman edit akun kepada member
     */
    public function edit()
    {
        $data['member'] = auth()->user();
        return view('member.akun', $data);
    }

    /**
     * Memproses pengeditan akun dari member dan admin
     */
    public function simpan()
    {
        //
        //if(Auth::user()->hasRole('admin'));
        //else;
    }

    /**
     * Memproses penghapusan akun dari admin
     */
    public function hapus()
    {
        //
    }
}

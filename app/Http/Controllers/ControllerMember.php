<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Pengajar;
use App\Santri;
use App\Jenis_program;
use App\Sistem;
use App\Pengguna;

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
        $data['daftar_anggota']=Pengguna::all();
        return view('admin.anggota',$data);
    }

    /**
     * Menampilkan halaman tambah program kepada member
     */
    public function program_baru()
    {
        $tambah = Input::get('tambah');

        $data['keanggotaan'] = (int) substr($tambah, 0, 1);
        $jenis_program = (int) substr($tambah, 1, 1);
        $data['jenis_program'] = Jenis_program::find($jenis_program);
        if(!$data['jenis_program']) return redirect('dasbor');
        return view('member.program-tambah', $data);
    }

    /**
     * Menampilkan halaman edit program kepada member
     */
    public function program_edit()
    {
      $id = (int) Input::get('id');
      $data['keanggotaan'] = (int) Input::get('keanggotaan');

      $pengguna = auth()->user();

      if($data['keanggotaan'] === 1) {
        $data['pengajar'] = Pengajar::find($id);
        if(!$data['pengajar']) return response('Pengajar tidak ditemukan.', 404);
        if($pengguna != $data['pengajar']->pengguna) return response('Tidak diizinkan.', 403);
        $data['jenis_program'] = $data['pengajar']->jenjang->jenis_program;
      }

      else if($data['keanggotaan'] === 2) {
        $data['santri'] = Santri::find($id);
        if(!$data['santri']) return response('Santri tidak ditemukan.', 404);
        if($pengguna != $data['santri']->pengguna) return response('Tidak diizinkan.', 403);
        $data['jenis_program'] = $data['santri']->jenjang->jenis_program;
      }

      else return redirect('Tidak ditemukan.', 404);

      return view('member.program-edit', $data);
    }

    /**
     * Menampilkan halaman konfirmasi penghapusan program kepada member
     */
    public function program_konfirmasiHapus()
    {
      $id = (int) Input::get('id');
      $data['keanggotaan'] = (int) Input::get('keanggotaan');

      $pengguna = auth()->user();

      if($data['keanggotaan'] === 1) {
        $data['pengajar'] = Pengajar::find($id);
        if(!$data['pengajar']) return response('Pengajar tidak ditemukan.', 404);
        if($pengguna != $data['pengajar']->pengguna) return response('Tidak diizinkan.', 403);
        $data['jenis_program'] = $data['pengajar']->jenjang->jenis_program;
      }

      else if($data['keanggotaan'] === 2) {
        $data['santri'] = Santri::find($id);
        if(!$data['santri']) return response('Santri tidak ditemukan.', 404);
        if($pengguna != $data['santri']->pengguna) return response('Tidak diizinkan.', 403);
        $data['jenis_program'] = $data['santri']->jenjang->jenis_program;
      }

      else return redirect('Tidak ditemukan.', 404);

      return view('member.program-hapus', $data);
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

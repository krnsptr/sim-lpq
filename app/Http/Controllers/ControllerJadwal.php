<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Pengajar;
use App\Jadwal;
use App\Sistem;

class ControllerJadwal extends Controller
{
    /**
     * Menampilkan halaman penjadwalan kepada member
     */
    public function index()
    {
        $member = auth()->user();
        $data['daftar_pengajar'] = $member->daftar_pengajar;
        $data['daftar_santri'] = $member->daftar_santri;
        $data['penjadwalan_pengajar'] = Sistem::first()->penjadwalan_pengajar;
        $data['penjadwalan_santri'] = Sistem::first()->penjadwalan_santri;
        return view('member.penjadwalan', $data);
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
      //cek status penjadwalan_pengajar dari sistem

      $hari = (int) Input::get('hari');
      $waktu = Input::get('waktu');
      $id_pengajar = (int) Input::get('id_pengajar');

      //validasi hari
      //validasi waktu

      $pengajar = Pengajar::find($id_pengajar);
      if(!$pengajar) return response('Pengajar tidak ditemukan.', 404);

      $pengguna = auth()->user();
      if($pengguna->hasRole('member') && $pengguna != $pengajar->pengguna) return response('Tidak diizinkan.', 403);

      $jadwalBaru = new Jadwal;
      $jadwalBaru->hari = $hari;
      $jadwalBaru->waktu = $waktu;
      $jadwalBaru->pengajar()->associate($pengajar);

      if($jadwalBaru->save()) session()->flash('success', 'Jadwal berhasil ditambahkan');
      else session()->flash('error', 'Jadwal gagal ditambahkan');

      return redirect('dasbor/penjadwalan');

      //if(Auth::user()->hasRole('admin'));
      //else;
    }

    /**
     * Memproses pengeditan jadwal pengajar dari member dan admin
     */
    public function simpan()
    {
      //cek status penjadwalan_pengajar dari sistem

      $hari = (int) Input::get('hari');
      $waktu = Input::get('waktu');
      $id_jadwal = (int) Input::get('id_jadwal');

      //validasi hari
      //validasi waktu

      $jadwal = Jadwal::find($id_jadwal);
      if(!$jadwal) return response('Jadwal tidak ditemukan.', 404);

      $pengguna = auth()->user();
      if($pengguna->hasRole('member') && $pengguna != $jadwal->pengajar->pengguna) return response('Tidak diizinkan.', 403);

      $jadwal->hari = $hari;
      $jadwal->waktu = $waktu;

      if($jadwal->save()) session()->flash('success', 'Jadwal berhasil disimpan');
      else session()->flash('error', 'Jadwal gagal disimpan');

      return redirect('dasbor/penjadwalan');

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
      //cek status penjadwalan_pengajar dari sistem

      $id_jadwal = (int) Input::get('id_jadwal');

      //validasi hari
      //validasi waktu

      $jadwal = Jadwal::find($id_jadwal);
      if(!$jadwal) return response('Jadwal tidak ditemukan.', 404);

      $pengguna = auth()->user();
      if($pengguna != $jadwal->pengajar->pengguna) return response('Tidak diizinkan.', 403);

      return view('member.penjadwalan-hapus', ['id_jadwal' => $id_jadwal]);
    }

    /**
     * Memproses penghapusan jadwal pengajar dari member dan admin
     */
    public function hapus()
    {
      //cek status penjadwalan_pengajar dari sistem

      $id_jadwal = (int) Input::get('id_jadwal');

      $jadwal = Jadwal::find($id_jadwal);
      if(!$jadwal) return response('Jadwal tidak ditemukan.', 404);

      $pengguna = auth()->user();
      if($pengguna->hasRole('member') && $pengguna != $jadwal->pengajar->pengguna) return response('Tidak diizinkan.', 403);

      if($jadwal->delete()) session()->flash('success', 'Jadwal berhasil dihapus');
      else session()->flash('error', 'Jadwal gagal dihapus');

      return redirect('dasbor/penjadwalan');

      //if(Auth::user()->hasRole('admin'));
      //else;
    }
}

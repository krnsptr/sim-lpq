<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Pengajar;
use App\Jenjang;
use App\Jadwal;
use App\Kelompok;

class ControllerKelompok extends Controller
{
    /**
     * Menampilkan daftar kelompok kepada member dan admin
     */
    public function index()
    {
        if(auth()->user()->hasRole('admin')) {
          //
        $data['daftar_pengajar'] = Pengajar::whereNotIn('id_jenjang', [1, 5, 8])->get();
        $data['hari']=[NULL,'Ahad','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
          return view('admin.kelompok', $data);
        }
        else {
        $member = auth()->user();
        $data['daftar_pengajar']=$member->daftar_pengajar;
        $data['daftar_santri'] = $member->daftar_santri;
        $data['hari']=[NULL,'Ahad','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        return view('member.kelompok', $data);
        }
    }

    /**
     * Mengirimkan daftar jadwal satu pengajar kepada admin
     */
    public function jadwal()
    {
        $pengajar = Pengajar::with('daftar_jadwal.kelompok')->find(Input::get('id_pengajar'));
        if(!$pengajar) return abort(404);
        return $pengajar->toJson();
    }

    /**
     * Memproses perubahan jenjang kelompok dari admin
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
        $jadwal = Jadwal::find(Input::get('id_jadwal'));
        $jenjang = Jenjang::find(Input::get('jenjang'));
        if(!$jadwal || !$jenjang) return abort(404);

        $kelompokBaru = new Kelompok;
        $kelompokBaru->jadwal()->associate($jadwal);
        $kelompokBaru->jenjang()->associate($jenjang);

        if($kelompokBaru->save()) return 'Berhasil.';
        else return abort(403);
    }

    /**
     * Memproses penghapusan kelompok dari admin
     */
    public function hapus()
    {
      $jadwal = Jadwal::find(Input::get('id_jadwal'));
      if(!$jadwal) return abort(404);

      $kelompok = $jadwal->kelompok;

      if($kelompok->delete()) return 'Berhasil.';
      else return abort(403);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Pengajar;
use App\Santri;
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
          $data['daftar_pengajar'] = Pengajar::whereNotIn('id_jenjang', [1, 5, 8])->get();
          $data['hari']=[NULL,'Ahad','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
            return view('admin.kelompok', $data);
        }
        else {
          $member = auth()->user();
          $data['daftar_pengajar']=$member->daftar_pengajar;
          $data['daftar_santri'] = $member->daftar_santri;
          $data['hari']=[NULL,'Ahad','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

          if($data['daftar_pengajar']->isEmpty() && $data['daftar_santri']->isEmpty())
            $data['warning'] = 'Anda belum terdaftar sebagai santri ataupun pengajar.
            Harap tambahkan program yang ingin didaftarkan.
            Silakan menuju <a href="/dasbor">Dasbor.</a>';

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
     * Mengirimkan daftar kelompok dengan jenjang dan jenis kelamin tertentu kepada admin
     */
    public function kelompok()
    {
      $santri = Santri::find(Input::get('id_santri'));
      $daftar_kelompok = DB::table('kelompok_view')->where([
        ['id_jenjang', '=', $santri->jenjang->id],
        ['jenis_kelamin', '=', $santri->pengguna->jenis_kelamin],
      ])->get();
      if(!$santri) return abort(404);
      $santri = $santri->toArray();
      $santri['jadwal'] = $daftar_kelompok->toArray();
      return json_encode($santri);
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

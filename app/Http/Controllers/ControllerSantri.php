<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Santri;
use App\Jenjang;
use App\Jenis_program;

class ControllerSantri extends Controller
{
    /**
     * Menampilkan daftar santri kepada admin
     */
    public function index()
    {
        $data['daftar_santri'] = Santri::all();
        return view('admin.santri',$data);
    }

    /**
     * Memproses penambahan santri dari member dan admin
     */
    public function tambah()
    {
        //cek status pendaftaran_santri dari sistem

        $id_jenjang_lulus = (int) Input::get('sudah_lulus');
        $tahun_kbm_terakhir = (int) Input::get('tahun_kbm_terakhir');
        $semester_kbm_terakhir = Input::get('semester_kbm_terakhir');

        $jenjang_lulus = Jenjang::find($sudah_lulus);
        if(!$jenjang_lulus) return redirect('dasbor')->with('error');

        $jenis_program = $jenjang_lulus->jenis_program;
        $terdaftar = Santri::where('id_pengguna', '=', auth()->user()->id)->whereHas('jenjang.jenis_program',function ($query) use($jenis_program) {
              $query->whereId($jenis_program->id);
        })->count();
        if($terdaftar) return redirect('dasbor')->with('error', 'Anda sudah terdaftar sebagai Santri '.$jenis_program->nama);
        $jenjang = $jenis_program->daftar_jenjang->first();
        $pengguna = auth()->user();

        $santriBaru = new Santri;
        $santriBaru->jenjang()->associate($jenjang);
        $santriBaru->sudah_lulus()->associate($jenjang_lulus);
        $santriBaru->tahun_kbm_terakhir = $tahun_kbm_terakhir;
        $santriBaru->semester_kbm_terakhir = $semester_kbm_terakhir;
        $santriBaru->pengguna()->associate($pengguna);

        if($santriBaru->save()) session()->flash('success', 'Program berhasil ditambahkan');
        else session()->flash('error', 'Program gagal ditambahkan');

        return redirect('dasbor');

        //if(Auth::user()->hasRole('admin'));
        //else;
    }

    /**
     * Memproses pengeditan santri dari member dan admin
     */
    public function simpan()
    {
      $id_jenjang_lulus = (int) Input::get('sudah_lulus');
      $tahun_kbm_terakhir = Input::get('tahun_kbm_terakhir');
      $semester_kbm_terakhir = Input::get('semester_kbm_terakhir');
      $id_santri = (int) Input::get('id_santri');

      $sudah_lulus = Jenjang::find($id_jenjang_lulus);

      $pengguna = auth()->user();
      $santri = Santri::find($id_santri);
      if(!$santri) return response('Santri tidak ditemukan.', 404);
      if($pengguna->hasRole('member') && $pengguna != $santri->pengguna) return response('Tidak diizinkan.', 403);

      if($santri->jenjang->program == $sudah_lulus->program)
        $santri->sudah_lulus()->associate($sudah_lulus);
      $santri->tahun_kbm_terakhir = $tahun_kbm_terakhir;
      $santri->semester_kbm_terakhir = $semester_kbm_terakhir;

      if($santri->save()) session()->flash('success', 'Program berhasil disimpan');
      else session()->flash('error', 'Program gagal disimpan');

      return redirect('dasbor');

      //if(Auth::user()->hasRole('admin'));
      //else;
    }

    /**
     * Memproses penghapusan santri dari member dan admin
     */
    public function hapus()
    {
      $id_santri = (int) Input::get('id_santri');

      $pengguna = auth()->user();
      $santri = Santri::find($id_santri);
      if(!$santri) return response('Santri tidak ditemukan.', 404);
      if($pengguna->hasRole('member') && $pengguna != $santri->pengguna) return response('Tidak diizinkan.', 403);

      if($santri->delete()) session()->flash('success', 'Program berhasil dihapus');
      else session()->flash('error', 'Program gagal dihapus');

      return redirect('dasbor');

      //
      //if(Auth::user()->hasRole('admin'));
      //else;
    }
}
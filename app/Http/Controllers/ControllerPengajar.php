<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Pengajar;
use App\Jenis_program;

class ControllerPengajar extends Controller
{
  /**
   * Menampilkan daftar pengajar kepada admin
   */
  public function index()
  {
      $data['daftar_pengajar'] = Pengajar::all();
      return view('admin.pengajar', $data);

  }

  /**
   * Memproses penambahan pengajar dari member dan admin
   */
  public function tambah()
  {
    if(!sistem('pendaftaran_pengajar')) return redirect('dasbor')->with('error', 'Pendaftaran pengajar sudah ditutup');

    $motivasi_mengajar = Input::get('motivasi_mengajar');
    $enrollment_key = Input::get('enrollment_key');
    $id_jenis_program = (int) Input::get('jenis_program');

    $jenis_program = Jenis_program::find($id_jenis_program);
    if(!$jenis_program) return redirect('dasbor')->with('error');

    $terdaftar = Pengajar::where('id_pengguna', '=', auth()->user()->id)->whereHas('jenjang.jenis_program',function ($query) use($id_jenis_program) {
          $query->whereId($id_jenis_program);
    })->count();
    if($terdaftar) return redirect('dasbor')->with('error', 'Anda sudah terdaftar sebagai Pengajar '.$data['jenis_program']->nama);

    if(!is_null($jenis_program->enrollment_pengajar) && $jenis_program->enrollment_pengajar !== $enrollment_key)
      return redirect('dasbor')->with('error', 'Enrollment key tidak cocok');

    $jenjang = $jenis_program->daftar_jenjang->first();
    $pengguna = auth()->user();

    $pengajarBaru = new Pengajar;
    $pengajarBaru->jenjang()->associate($jenjang);
    $pengajarBaru->motivasi_mengajar = $motivasi_mengajar;
    $pengajarBaru->pengguna()->associate($pengguna);

    if($pengajarBaru->save()) session()->flash('success', 'Program berhasil ditambahkan');
    else session()->flash('error', 'Program gagal ditambahkan');

    return redirect('dasbor');

    //if(Auth::user()->hasRole('admin'));
    //else;
  }

  /**
   * Memproses pengeditan pengajar dari member dan admin
   */
  public function simpan()
  {
    $motivasi_mengajar = Input::get('motivasi_mengajar');
    $id_pengajar = (int) Input::get('id_pengajar');

    $pengguna = auth()->user();
    $pengajar = Pengajar::find($id_pengajar);
    if(!$pengajar) return response('Pengajar tidak ditemukan.', 404);
    if($pengguna->hasRole('member') && $pengguna != $pengajar->pengguna) return response('Tidak diizinkan.', 403);

    $pengajar->motivasi_mengajar = $motivasi_mengajar;

    if($pengajar->save()) session()->flash('success', 'Program berhasil disimpan');
    else session()->flash('error', 'Program gagal disimpan');

    return redirect('dasbor');

    //if(Auth::user()->hasRole('admin'));
    //else;
  }

  public function kapasitas_membina_simpan() {
    $kapasitas_membina = (int) Input::get('kapasitas_membina');
    $id_pengajar = (int) Input::get('id_pengajar');

    $pengguna = auth()->user();
    $pengajar = Pengajar::find($id_pengajar);
    if(!$pengajar) return response('Pengajar tidak ditemukan.', 404);
    if($pengguna->hasRole('member') && $pengguna != $pengajar->pengguna) return response('Tidak diizinkan.', 403);

    $pengajar->kapasitas_membina = $kapasitas_membina;

    if($pengajar->save()) session()->flash('success', 'Jumlah kelompok yang siap dibina berhasil disimpan');
    else session()->flash('error', 'Jumlah kelompok yang siap dibina gagal disimpan');

    return redirect('dasbor/penjadwalan');
  }

  /**
   * Memproses penghapusan pengajar dari member dan admin
   */
  public function hapus()
  {
    $id_pengajar = (int) Input::get('id_pengajar');

    $pengguna = auth()->user();
    $pengajar = Pengajar::find($id_pengajar);
    if(!$pengajar) return response('Pengajar tidak ditemukan.', 404);
    if($pengguna->hasRole('member') && $pengguna != $pengajar->pengguna) return response('Tidak diizinkan.', 403);

    if($pengajar->delete()) session()->flash('success', 'Program berhasil dihapus');
    else session()->flash('error', 'Program gagal dihapus');

    return redirect('dasbor');

    //if(Auth::user()->hasRole('admin'));
    //else;
  }
}
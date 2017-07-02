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
      return view('admin.Pengajar', $data);

  }

  /**
   * Memproses penambahan pengajar dari member dan admin
   */
  public function tambah()
  {
    //cek status pendaftaran_pengajar dari sistem

    $motivasi_mengajar = Input::get('motivasi_mengajar');
    $id_jenis_program = (int) Input::get('jenis_program');

    //validasi jenjang_program_baru()
    //validasi tahun
    //validasi semester

    $jenis_program = Jenis_program::find($id_jenis_program);
    if(!$jenis_program) return redirect('dasbor');

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

    //validasi jenjang_program_edit()

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

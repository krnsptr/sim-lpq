<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Pengajar;
use App\Jenis_program;
Use App\Jenjang;

class ControllerPengajar extends Controller
{
  /**
   * Menampilkan daftar pengajar kepada admin
   */
  public function index()
  {
      $data['daftar_pengajar'] = Pengajar::with([
        'pengguna', 'jenjang.jenis_program'
      ])->get();
      $data['daftar_jenis_program'] = Jenis_program::all();
      $data['hari']=[NULL,'Ahad','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
      return view('admin.pengajar', $data);
  }

  /**
   * Mengirimkan data satu pengajar kepada admin
   */
  public function pengajar()
  {
      $pengajar = Pengajar::find(Input::get('id_pengajar'));
      if(!$pengajar) return abort(404);
      return $pengajar->toJson();
  }

  /**
   * Memproses penambahan pengajar dari member dan admin
   */
  public function tambah()
  {
    if(!sistem('pendaftaran_pengajar')) return redirect('dasbor')->with('error', 'Pendaftaran pengajar sudah ditutup');

    $pendaftaran = Input::get('pendaftaran');
    $memenuhi_syarat = Input::get('memenuhi_syarat');
    $motivasi_mengajar = Input::get('motivasi_mengajar');
    $enrollment_key = Input::get('enrollment_key');
    $id_jenis_program = (int) Input::get('jenis_program');

    $jenis_program = Jenis_program::find($id_jenis_program);
    if(!$jenis_program) return redirect('dasbor')->with('error');

    $terdaftar = Pengajar::where('id_pengguna', '=', auth()->user()->id)->whereHas('jenjang.jenis_program',function ($query) use($id_jenis_program) {
          $query->whereId($id_jenis_program);
    })->count();
    if($terdaftar) return redirect('dasbor')->with('error', 'Anda sudah terdaftar sebagai Pengajar '.$jenis_program->nama);

    if(!is_null($jenis_program->enrollment_pengajar) && $jenis_program->enrollment_pengajar !== $enrollment_key)
      return redirect('dasbor')->with('error', 'Enrollment key tidak cocok');

    $jenjang = $jenis_program->daftar_jenjang->first();
    $pengguna = auth()->user();

    $pengajarBaru = new Pengajar;
    $pengajarBaru->jenjang()->associate($jenjang);
    $pengajarBaru->pendaftaran = $pendaftaran;
    if($id_jenis_program === 1) $pengajarBaru->memenuhi_syarat = $memenuhi_syarat;
    $pengajarBaru->motivasi_mengajar = $motivasi_mengajar;
    $pengajarBaru->pengguna()->associate($pengguna);

    if($pengajarBaru->save()) return redirect('dasbor/penjadwalan')->with('success', 'Program berhasil ditambahkan. Harap melakukan penjadwalan.');
    else return redirect('dasbor')->with('error', 'Program gagal ditambahkan');
  }

  /**
   * Memproses pengeditan pengajar dari member dan admin
   */
  public function simpan()
  {
    $pendaftaran = Input::get('pendaftaran');
    $memenuhi_syarat = Input::get('memenuhi_syarat');
    $motivasi_mengajar = Input::get('motivasi_mengajar');
    $id_pengajar = (int) Input::get('id_pengajar');

    $pengguna = auth()->user();
    $pengajar = Pengajar::find($id_pengajar);
    if(!$pengajar) return response('Pengajar tidak ditemukan.', 404);
    if($pengguna->hasRole('member') && $pengguna != $pengajar->pengguna) return response('Tidak diizinkan.', 403);

    $pengajar->pendaftaran = $pendaftaran;
    if($pengajar->jenjang->jenis_program->id == 1) $pengajar->memenuhi_syarat = $memenuhi_syarat;
    $pengajar->motivasi_mengajar = $motivasi_mengajar;
    if(auth()->user()->hasRole('admin')) {
      $jenjang = Jenjang::find(Input::get('jenjang'));
      if(!$jenjang) return abort(404);
      $pengajar->jenjang()->associate($jenjang);
    }

    if($pengajar->save()) {
      if(auth()->user()->hasRole('admin')) return 'Berhasil.';
      return redirect('dasbor')->with('success', 'Program berhasil disimpan');
    }
    else return redirect('dasbor')->with('error', 'Program gagal disimpan');
  }

  public function kapasitas_membina_simpan() {
    $kapasitas_membina = (int) Input::get('kapasitas_membina');
    $id_pengajar = (int) Input::get('id_pengajar');

    $pengguna = auth()->user();
    $pengajar = Pengajar::find($id_pengajar);
    if(!$pengajar) return response('Pengajar tidak ditemukan.', 404);
    if($pengguna->hasRole('member') && $pengguna != $pengajar->pengguna) return response('Tidak diizinkan.', 403);

    $pengajar->kapasitas_membina = $kapasitas_membina;

    if($pengajar->save()) {
      if(auth()->user()->hasRole('admin')) return 'Berhasil.';
      return redirect('dasbor')->with('success', 'Kapasitas membina berhasil disimpan');
    }
    else return redirect('dasbor')->with('error', 'Kapasitas membina gagal disimpan');
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

    if($pengajar->delete()) {
      if(auth()->user()->hasRole('admin')) return 'Berhasil.';
      return redirect('dasbor')->with('success', 'Program berhasil dihapus');
    }
    else return redirect('dasbor')->with('error', 'Program gagal dihapus');
  }

  /**
   * Memproses download excel data pengajar oleh admin
   */
  public function ekspor_excel()
  {
    \Excel::create('Pengajar '.date('Y-m-d H.i.s'), function($excel) {

        $excel->sheet('Laki-Laki', function($sheet) {
          $daftar_pengajar = Pengajar::with(['pengguna', 'jenjang.jenis_program'])
          ->whereHas('pengguna', function ($query) {
              $query->where('jenis_kelamin', 1);
          })->get();
          $sheet->loadView(
            'ekspor.pengajar-excel', ['daftar_pengajar' => $daftar_pengajar]
          );
          $sheet->freezeFirstRow();
          $sheet->getStyle('P')->getAlignment()->setWrapText(true);
        });

        $excel->sheet('Perempuan', function($sheet) {
          $daftar_pengajar = Pengajar::with(['pengguna', 'jenjang.jenis_program'])
          ->whereHas('pengguna', function ($query) {
              $query->where('jenis_kelamin', 0);
          })->get();
          $sheet->loadView(
            'ekspor.pengajar-excel', ['daftar_pengajar' => $daftar_pengajar]
          );
          $sheet->freezeFirstRow();
          $sheet->getStyle('P')->getAlignment()->setWrapText(true);
        });
    })->download('xlsx');
  }
}

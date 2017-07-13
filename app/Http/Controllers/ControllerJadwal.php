<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Pengajar;
use App\Santri;
use App\Jadwal;
use App\Kelompok;
use DB;

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
        $data['penjadwalan_pengajar'] = sistem('penjadwalan_pengajar');
        $data['penjadwalan_santri'] = sistem('penjadwalan_santri');
        $data['hari']=[NULL,'Ahad','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        $data['data_jadwal_kelompok'] = DB::table('kelompok_view')->get();
        return view('member.penjadwalan', $data);
    }

    /**
     * Menampilkan jadwal KBM kepada pengunjung
     */
    public function jadwal_KBM()
    {
        $data['santri'] = Santri::where('id_kelompok','!=','NULL')->get();
        return view('jadwal',$data);
    }

    /**
     * Memproses penambahan jadwal pengajar dari member dan admin
     */
    public function tambah()
    {
      if(!sistem('penjadwalan_pengajar')) return redirect('dasbor/penjadwalan')->with('error', 'Penjadwalan pengajar sudah ditutup');

      $hari = (int) Input::get('hari');
      $waktu = Input::get('waktu');
      $id_pengajar = (int) Input::get('id_pengajar');

      if($hari < 1 || $hari > 7) return redirect('dasbor/penjadwalan')->with('error');
      elseif(!preg_match("/(2[0-3]|[01][0-9]):([0-5][0-9])/", $waktu)) return redirect('dasbor/penjadwalan')->with('error', 'Format waktu tidak sesuai');

      $pengajar = Pengajar::find($id_pengajar);
      if(!$pengajar) return response('Pengajar tidak ditemukan.', 404);

      $pengguna = auth()->user();
      if($pengguna->hasRole('member') && $pengguna != $pengajar->pengguna) return response('Tidak diizinkan.', 403);

      $jadwalBaru = new Jadwal;
      $jadwalBaru->hari = $hari;
      $jadwalBaru->waktu = $waktu;
      $jadwalBaru->pengajar()->associate($pengajar);

      if($jadwalBaru->save()) {
        if(auth()->user()->hasRole('admin')) return 'Berhasil.';
        return redirect('dasbor/penjadwalan')->with('success', 'Jadwal berhasil ditambahkan');
      }
      else return redirect('dasbor/penjadwalan')->with('error', 'Jadwal gagal ditambahkan');
    }

    /**
     * Memproses pengeditan jadwal pengajar dari member dan admin
     */
    public function simpan()
    {
      if(!sistem('penjadwalan_pengajar')) return redirect('dasbor/penjadwalan')->with('error', 'Penjadwalan pengajar sudah ditutup');

      $hari = (int) Input::get('hari');
      $waktu = Input::get('waktu');
      $id_jadwal = (int) Input::get('id_jadwal');

      if($hari < 1 || $hari > 7) return redirect('dasbor/penjadwalan')->with('error');
      elseif(!preg_match("/(2[0-3]|[01][0-9]):([0-5][0-9])/", $waktu)) return redirect('dasbor/penjadwalan')->with('error', 'Format waktu tidak sesuai');

      $jadwal = Jadwal::find($id_jadwal);
      if(!$jadwal) return response('Jadwal tidak ditemukan.', 404);

      $pengguna = auth()->user();
      if($pengguna->hasRole('member') && $pengguna != $jadwal->pengajar->pengguna) return response('Tidak diizinkan.', 403);

      $jadwal->hari = $hari;
      $jadwal->waktu = $waktu;

      if($jadwal->save()) {
        if(auth()->user()->hasRole('admin')) return 'Berhasil.';
        return redirect('dasbor/penjadwalan')->with('success', 'Jadwal berhasil disimpan');
      }
      else return redirect('dasbor/penjadwalan')->with('error', 'Jadwal gagal disimpan');
    }

    /**
     * Memproses pengeditan kelompok santri dari member dan admin
     */
    public function ganti()
    {
        if(auth()->user()->hasRole('member') && !sistem('penjadwalan_santri'))
          return redirect('dasbor/penjadwalan')->with('error', 'Penjadwalan santri sudah ditutup')

        $santri = Santri::find(Input::get('id_santri'));
        $id_kelompok = Input::get('id_kelompok');

        if(!$santri) return response('Santri tidak ditemukan.', 404);
        if(!empty('id_kelompok') && !Kelompok::find($id_kelompok)) return response('Kelompok tidak ditemukan.', 404);

        $santri->kelompok()->associate($id_kelompok);

        if($santri->save()) {
          if(auth()->user()->hasRole('admin')) return 'Berhasil.';
          return redirect('dasbor/penjadwalan')->with('success', 'Jadwal berhasil diubah');
        }
        else return redirect('dasbor/penjadwalan')->with('error', 'Jadwal gagal diubah');

    }

    /**
     * Menampilkan halaman konfirmasi penghapusan jadwal pengajar kepada member
     */
    public function konfirmasiHapus()
    {
      if(!sistem('penjadwalan_pengajar')) return redirect('dasbor/penjadwalan')->with('error', 'Penjadwalan pengajar sudah ditutup');

      $id_jadwal = (int) Input::get('id_jadwal');

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
      if(!sistem('penjadwalan_pengajar')) return redirect('dasbor/penjadwalan')->with('error', 'Penjadwalan pengajar sudah ditutup');

      $id_jadwal = (int) Input::get('id_jadwal');

      $jadwal = Jadwal::find($id_jadwal);
      if(!$jadwal) return response('Jadwal tidak ditemukan.', 404);

      $pengguna = auth()->user();
      if($pengguna->hasRole('member') && $pengguna != $jadwal->pengajar->pengguna) return response('Tidak diizinkan.', 403);

      if($jadwal->delete()) {
        if(auth()->user()->hasRole('admin')) return 'Berhasil.';
        return redirect('dasbor/penjadwalan')->with('success', 'Jadwal berhasil dihapus');
      }
      else return redirect('dasbor/penjadwalan')->with('error', 'Jadwal gagal dihapus');
    }
}

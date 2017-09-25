<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Pengajar;
use App\Jadwal;
use App\Sistem;
use App\Santri;
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
        $data['daftar_pengajar'] = Pengajar::where('id_pengguna', $member->id)->with('daftar_jadwal')->get();
        $data['daftar_santri'] = $member->daftar_santri;
        $data['penjadwalan_pengajar'] = sistem('penjadwalan_pengajar');
        $data['penjadwalan_santri'] = sistem('penjadwalan_santri');
        $data['hari']=[NULL,'Ahad','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];

        if($data['daftar_pengajar']->isEmpty() && $data['daftar_santri']->isEmpty())
          $data['warning'] = 'Anda belum terdaftar sebagai santri ataupun pengajar.
          Harap tambahkan program yang ingin didaftarkan.
          Silakan menuju <a href="/dasbor">Dasbor.</a>';

        elseif(
          $data['daftar_pengajar']->isNotEmpty() &&
          Pengajar::where('id_pengguna', $member->id)->whereHas('daftar_jadwal')->count() !== $data['daftar_pengajar']->count()
        ) $data['warning'] = 'Anda terdaftar sebagai pengajar tetapi belum semua program pengajar dijadwalkan.
        Harap melakukan penjadwalan.';

        foreach ($data['daftar_santri'] as $santri) {
          $data['daftar_kelompok'][$santri->id] = DB::table('kelompok_view')->where([
            ['id_jenjang', '=', $santri->jenjang->id],
            ['jenis_kelamin', '=', $santri->pengguna->jenis_kelamin],
          ])->get();
        }
        return view('member.penjadwalan', $data);
    }

    /**
     * Menampilkan jadwal KBM kepada pengunjung
     */
    public function jadwal_KBM()
    {
        $data['daftar_kelompok'] = Kelompok::has('daftar_santri')
          ->with([
            'daftar_santri.pengguna',
            'jenjang',
            'jadwal.pengajar.pengguna'
            ])->get()
            ->sortBy(function($kelompok) {
                return sprintf(
                  '%-12s%s',
                  -$kelompok->jadwal->pengajar->pengguna->jenis_kelamin,
                  $kelompok->id_jenjang
                );
            });
        $data['hari'] = [NULL,'Ahad','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        return view('jadwal',$data);
    }

    /**
     * Memproses download excel jadwal KBM
     */
     public function ekspor_excel(bool $untuk_pengajar = FALSE)
    {
      $daftar_kelompok = Kelompok::has('daftar_santri')
        ->with([
          'daftar_santri.pengguna',
          'jenjang',
          'jadwal.pengajar.pengguna'
          ])->get()
          ->sortBy(function($kelompok) {
              return sprintf(
                '%-6s%-6s%-6s%s',
                -$kelompok->jadwal->pengajar->pengguna->jenis_kelamin,
                $kelompok->id_jenjang,
                $kelompok->hari,
                $kelompok->waktu
              );
          });
      $judul = ($untuk_pengajar) ? 'Jadwal Pengajar' : 'Jadwal Santri';
      $hari = [NULL,'Ahad','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
      \Excel::create($judul.' '.date('Y-m-d H.i.s'), function($excel) use($daftar_kelompok, $hari, $untuk_pengajar) {

          $excel->sheet('Laki-Laki', function($sheet) use($daftar_kelompok, $hari, $untuk_pengajar)  {
            $sheet->loadView(
              'ekspor.jadwal-excel', [
                'daftar_kelompok' => $daftar_kelompok
                ->where('jadwal.pengajar.pengguna.jenis_kelamin', 1),
                'hari' => $hari,
                'untuk_pengajar' => $untuk_pengajar
              ]
            );
          });

          $excel->sheet('Perempuan', function($sheet) use($daftar_kelompok, $hari, $untuk_pengajar) {
            $sheet->loadView(
              'ekspor.jadwal-excel', [
                'daftar_kelompok' => $daftar_kelompok
                ->where('jadwal.pengajar.pengguna.jenis_kelamin', 0),
                'hari' => $hari,
                'untuk_pengajar' => $untuk_pengajar
              ]
            );
          });
      })->download('xlsx');
    }

    /**
     * Memproses download excel jadwal KBM
     */
     public function ekspor_pdf($untuk_pengajar = FALSE)
    {
      $daftar_kelompok = Kelompok::has('daftar_santri')
        ->with([
          'daftar_santri.pengguna',
          'jenjang',
          'jadwal.pengajar.pengguna'
          ])->get()
          ->sortBy(function($kelompok) {
              return sprintf(
                '%-6s%-6s%-6s%s',
                -$kelompok->jadwal->pengajar->pengguna->jenis_kelamin,
                $kelompok->id_jenjang,
                $kelompok->hari,
                $kelompok->waktu
              );
          });
      $judul = ($untuk_pengajar) ? 'Jadwal Pengajar' : 'Jadwal Santri';
      $hari = [NULL,'Ahad','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
      \Excel::create($judul.' '.date('Y-m-d H.i.s'), function($excel) use($daftar_kelompok, $hari, $untuk_pengajar) {

          $excel->sheet('Laki-Laki', function($sheet) use($daftar_kelompok, $hari, $untuk_pengajar)  {
            $sheet->loadView(
              'ekspor.jadwal-pdf', [
                'daftar_kelompok' => $daftar_kelompok
                ->where('jadwal.pengajar.pengguna.jenis_kelamin', 1),
                'hari' => $hari,
                'untuk_pengajar' => $untuk_pengajar
              ]
            );
          });

          $excel->sheet('Perempuan', function($sheet) use($daftar_kelompok, $hari, $untuk_pengajar) {
            $sheet->loadView(
              'ekspor.jadwal-pdf', [
                'daftar_kelompok' => $daftar_kelompok
                ->where('jadwal.pengajar.pengguna.jenis_kelamin', 0),
                'hari' => $hari,
                'untuk_pengajar' => $untuk_pengajar
              ]
            );
          });
      })->download('pdf');
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
      elseif(!preg_match("~\A(2[0-3]|[01][0-9]):([0-5][0-9])\z~", $waktu)) return redirect('dasbor/penjadwalan')->with('error', 'Format waktu tidak sesuai');

      $pengajar = Pengajar::find($id_pengajar);
      if(!$pengajar) return response('Pengajar tidak ditemukan.', 404);

      $pengguna = auth()->user();
      if($pengguna->hasRole('member') && $pengguna != $pengajar->pengguna) return response('Tidak diizinkan.', 403);

      $jadwalBentrok_santri = Santri::whereHas('kelompok.jadwal', function ($query) use ($hari, $waktu) {
        $query->where([
          ['hari', $hari],
          ['waktu', $waktu]
        ]);
      })->where('id_pengguna', $pengguna->id)->count();

      if($jadwalBentrok_santri) return redirect('dasbor/penjadwalan')->with('error', 'Terjadi bentrok jadwal. Periksa kembali jadwal yang Anda masukkan.');

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
      elseif(!preg_match("~\A(2[0-3]|[01][0-9]):([0-5][0-9])\z~", $waktu)) return redirect('dasbor/penjadwalan')->with('error', 'Format waktu tidak sesuai');

      $jadwal = Jadwal::find($id_jadwal);
      if(!$jadwal) return response('Jadwal tidak ditemukan.', 404);

      $pengguna = auth()->user();
      if($pengguna->hasRole('member') && $pengguna != $jadwal->pengajar->pengguna) return response('Tidak diizinkan.', 403);

      $jadwalBentrok_santri = Santri::whereHas('kelompok.jadwal', function ($query) use ($hari, $waktu) {
        $query->where([
          ['hari', $hari],
          ['waktu', $waktu]
        ]);
      })->where('id_pengguna', $pengguna->id)->count();

      if($jadwalBentrok_santri) return redirect('dasbor/penjadwalan')->with('error', 'Terjadi bentrok jadwal. Periksa kembali jadwal yang Anda masukkan.');

      $jadwal->hari = $hari;
      $jadwal->waktu = $waktu;

      if($jadwal->save()) {
        if(auth()->user()->hasRole('admin')) return 'Berhasil.';
        return redirect('dasbor/penjadwalan')->with('success', 'Jadwal berhasil disimpan');
      }
      else return redirect('dasbor/penjadwalan')->with('error', 'Jadwal gagal disimpan');
    }

    /**
     * Memproses pengeditan kelompok santri dari member
     */
    public function ganti()
    {
        $santri = Santri::find(Input::get('id_santri'));
        if(!$santri) return response('Santri tidak ditemukan.', 404);
        $pengguna = $santri->pengguna;
        if(auth()->user() != $pengguna) return response('Tidak diizinkan.', 403);

        $id_kelompok = Input::get('id_kelompok');
        if(!empty($id_kelompok)) {
          return DB::transaction(function () use($santri, $pengguna, $id_kelompok) {
            $kelompok = DB::table('kelompok_view')->where('id_k', '=', $id_kelompok)->first();
            if(!$kelompok) return response('Kelompok tidak ditemukan.', 404);
            if($kelompok->id_jenjang != $santri->jenjang->id || $kelompok->jenis_kelamin != $pengguna->jenis_kelamin)
              return response('Tidak diizinkan.', 403);

            $jadwalBentrok_pengajar = Jadwal::whereHas('pengajar.pengguna', function ($query) use ($pengguna, $kelompok) {
                $query->where('id', $pengguna->id);
            })->where([
              ['hari', $kelompok->hari],
              ['waktu', $kelompok->waktu],
            ])->count();

            $jadwalBentrok_santri = Santri::whereHas('kelompok.jadwal', function ($query) use ($kelompok) {
              $query->where([
                ['hari', $kelompok->hari],
                ['waktu', $kelompok->waktu]
              ]);
            })->where([
              ['id_pengguna', $pengguna->id],
              ['id_kelompok', '<>', $id_kelompok]
            ])->count();

            if($jadwalBentrok_pengajar || $jadwalBentrok_santri) return redirect('dasbor/penjadwalan')->with('error', 'Terjadi bentrok jadwal. Periksa kembali jadwal yang Anda masukkan.');

            if($kelompok->sisa < 1) return redirect('dasbor')->with('error', 'Kelompok sudah penuh.');

            $santri->kelompok()->associate($id_kelompok);
            if($santri->save()) return redirect('dasbor/penjadwalan')->with('success', 'Jadwal berhasil diubah');
            else return redirect('dasbor/penjadwalan')->with('error', 'Jadwal gagal diubah');
          });
        }
        else {
          $santri->kelompok()->dissociate();
          if($santri->save()) return redirect('dasbor/penjadwalan')->with('success', 'Jadwal berhasil diubah');
          else return redirect('dasbor/penjadwalan')->with('error', 'Jadwal gagal diubah');
        }
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

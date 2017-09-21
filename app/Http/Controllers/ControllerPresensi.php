<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Kelompok;
use DB;

class ControllerPresensi extends Controller
{
    /**
     * Menampilkan halaman Presensi kepada admin
     */
    public function index()
    {
        return view('admin.presensi');
    }

    /**
     * Memproses download excel merge presensi
     */
    public function ekspor_excel_merge()
    {
      $data['maksimum_santri'] = DB::table('kelompok_view')->max(DB::raw('kuota-sisa'));
      if(!$data['maksimum_santri']) return redirect('admin')->with('error', 'Belum ada santri.');
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
      \Excel::create('Merge Presensi '.date('Y-m-d H.i.s'), function($excel) use($data) {

          $excel->sheet('Merge Presensi', function($sheet) use($data)  {
            $sheet->loadView('ekspor.presensi-merge-excel', $data);
            $sheet->freezeFirstRow();
          });

      })->download('xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Santri;

class ControllerSPP extends Controller
{
    /**
     * Menampilkan daftar pembayaran SPP santri kepada member dan admin
     */
    public function index()
    {
        if(auth()->user()->hasRole('admin')) {
          //
          $data['daftar_santri'] = Santri::whereNotIn('id_jenjang', [1, 5, 8])
          ->with(['pengguna', 'jenjang.jenis_program'])->get();
          return view('admin.spp', $data);
        }
        else {
          $data['daftar_santri']= Santri::whereNotIn('id_jenjang', [1, 5, 8])
            ->where('id_pengguna', auth()->user()->id)
            ->with('jenjang.jenis_program')->get();
          return view('member.spp', $data);
        }
    }

    /**
     * Memproses pengeditan status pembayaran SPP dari admin
     */
    public function simpan()
    {
        $id_santri = Input::get('id_santri');
        $spp_status = (int) Input::get('spp_status');
        $spp_dibayar = (int) Input::get('spp_dibayar');
        $spp_keterangan = Input::get('spp_keterangan');

        $santri = Santri::find($id_santri);
        if(!$santri) return abort(404);

        $santri->spp_status = $spp_status;
        $santri->spp_dibayar = $spp_dibayar;
        $santri->spp_keterangan = $spp_keterangan;

        if($santri->save()) return 'Berhasil.';
        else return abort(403);
    }
}

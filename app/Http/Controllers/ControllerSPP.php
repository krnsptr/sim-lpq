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
          $data['daftar_santri'] = Santri::whereNotIn('id_jenjang', [1, 5, 8])->get();
          return view('admin.spp', $data);
        }
        else {
          $data['daftar_santri']= auth()->user()->daftar_santri->whereNotIn('id_jenjang', [1, 5, 8]);
          return view('member.spp', $data);
        }
    }

    /**
     * Memproses pengeditan status pembayaran SPP dari admin
     */
    public function simpan()
    {
        $id_santri = Input::get('id_santri');
        $spp_lunas = (bool) Input::get('spp_lunas');

        $santri = Santri::find($id_santri);
        if(!$santri) return abort(404);

        $santri->spp_lunas = $spp_lunas;

        if($santri->save()) return 'Berhasil.';
        else return abort(403);
    }
}

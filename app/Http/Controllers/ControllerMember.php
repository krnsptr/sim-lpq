<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Pengajar;
use App\Santri;
use App\Jenis_program;
use App\Pengguna;

class ControllerMember extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan halaman dasbor kepada member
     */
    public function index()
    {
        $member = auth()->user();
        $data['daftar_pengajar'] = $member->daftar_pengajar;
        $data['daftar_santri'] = $member->daftar_santri;
        $data['daftar_jenis_program'] = Jenis_program::all();
        return view('member.dasbor', $data);
    }

    /**
     * Menampilkan daftar member kepada admin
     */
    public function member_index()
    {
        $data['daftar_anggota']=Pengguna::all();
        return view('admin.anggota',$data);
    }

    /**
     * Menampilkan halaman tambah program kepada member
     */
    public function program_baru()
    {
        $tambah = Input::get('tambah');

        $data['keanggotaan'] = (int) substr($tambah, 0, 1);
        $id_jenis_program = (int) substr($tambah, 1, 1);
        $data['jenis_program'] = Jenis_program::find($id_jenis_program);
        if(!$data['jenis_program']) return redirect('dasbor')->with('error');

        if($data['keanggotaan'] === 1) {
          if(!sistem('pendaftaran_pengajar')) return redirect('dasbor')->with('error', 'Pendaftaran pengajar sudah ditutup');
          $terdaftar = Pengajar::where('id_pengguna', '=', auth()->user()->id)->whereHas('jenjang.jenis_program',function ($query) use($id_jenis_program) {
                $query->whereId($id_jenis_program);
          })->count();
          if($terdaftar) return redirect('dasbor')->with('error', 'Anda sudah terdaftar sebagai Pengajar '.$data['jenis_program']->nama);
        }
        elseif($data['keanggotaan'] === 2) {
          if(!sistem('pendaftaran_santri')) return redirect('dasbor')->with('error', 'Pendaftaran santri sudah ditutup');
          $terdaftar = Santri::where('id_pengguna', '=', auth()->user()->id)->whereHas('jenjang.jenis_program',function ($query) use($id_jenis_program) {
                $query->whereId($id_jenis_program);
          })->count();
          if($terdaftar) return redirect('dasbor')->with('error', 'Anda sudah terdaftar sebagai Santri '.$data['jenis_program']->nama);
        }


        return view('member.program-tambah', $data);
    }

    /**
     * Menampilkan halaman edit program kepada member
     */
    public function program_edit()
    {
      $id = (int) Input::get('id');
      $data['keanggotaan'] = (int) Input::get('keanggotaan');

      $pengguna = auth()->user();

      if($data['keanggotaan'] === 1) {
        $data['pengajar'] = Pengajar::find($id);
        if(!$data['pengajar']) return response('Pengajar tidak ditemukan.', 404);
        if($pengguna != $data['pengajar']->pengguna) return response('Tidak diizinkan.', 403);
        $data['jenis_program'] = $data['pengajar']->jenjang->jenis_program;
      }

      else if($data['keanggotaan'] === 2) {
        $data['santri'] = Santri::find($id);
        if(!$data['santri']) return response('Santri tidak ditemukan.', 404);
        if($pengguna != $data['santri']->pengguna) return response('Tidak diizinkan.', 403);
        $data['jenis_program'] = $data['santri']->jenjang->jenis_program;
      }

      else return redirect('Tidak ditemukan.', 404);

      return view('member.program-edit', $data);
    }

    /**
     * Menampilkan halaman konfirmasi penghapusan program kepada member
     */
    public function program_konfirmasiHapus()
    {
      $id = (int) Input::get('id');
      $data['keanggotaan'] = (int) Input::get('keanggotaan');

      $pengguna = auth()->user();

      if($data['keanggotaan'] === 1) {
        $data['pengajar'] = Pengajar::find($id);
        if(!$data['pengajar']) return response('Pengajar tidak ditemukan.', 404);
        if($pengguna != $data['pengajar']->pengguna) return response('Tidak diizinkan.', 403);
        $data['jenis_program'] = $data['pengajar']->jenjang->jenis_program;
      }

      else if($data['keanggotaan'] === 2) {
        $data['santri'] = Santri::find($id);
        if(!$data['santri']) return response('Santri tidak ditemukan.', 404);
        if($pengguna != $data['santri']->pengguna) return response('Tidak diizinkan.', 403);
        $data['jenis_program'] = $data['santri']->jenjang->jenis_program;
      }

      else return redirect('Tidak ditemukan.', 404);

      return view('member.program-hapus', $data);
    }

    /**
     * Melakukan validasi member
     */
    protected function validator(array $data, int $id = NULL)
    {
        return Validator::make($data, [
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|email|max:255|unique:pengguna,email,'.$id,
            'username' => 'required|min:4|max:16|regex:/[a-z_0-9]{4,16}/|unique:pengguna,username,'.$id,
            'password' => 'sometimes|min:6|confirmed',
            'jenis_kelamin' => 'required|boolean',
            'mahasiswa_ipb' => 'required|boolean',
            'nomor_identitas' => 'required|min:9|max:255|unique:pengguna,nomor_identitas,'.$id,
            'nomor_hp' => 'required|min:8|max:13|regex:/08[0-9]{6,11}/|unique:pengguna,nomor_hp,'.$id,
            'nomor_wa' => 'nullable|min:8|max:13',
        ]);
    }

    /**
     * Memproses penambahan akun dari admin
     */
    public function tambah()
    {
        //
    }

    /**
     * Menampilkan halaman edit akun kepada member
     */
    public function edit()
    {
        $data['member'] = auth()->user();
        return view('member.akun', $data);
    }

    /**
     * Memproses pengeditan akun dari member dan admin
     */
    public function simpan()
    {
      $member = (auth()->user()->hasRole('admin')) ? Pengguna::find(Input::get('id_anggota')) : auth()->user();

      $input = Input::only([
        'nama_lengkap', 'email', 'username', 'jenis_kelamin',
        'mahasiswa_ipb', 'nomor_identitas', 'nomor_hp', 'nomor_wa'
      ]);

      $validator = $this->validator($input, $member->id);

      if($validator->passes()) {
          if($member->fill($input)->update()) return redirect('dasbor/akun')->with('success', 'Perubahan akun berhasil disimpan.');
          else return redirect('dasbor/akun')->with('success', 'Perubahan akun gagal disimpan.');
      }

      else return redirect('dasbor/akun')->withErrors($validator);
        //
        //if(Auth::user()->hasRole('admin'));
        //else;
    }

    /**
     * Memproses penghapusan akun dari admin
     */
    public function hapus()
    {
        //
    }
}

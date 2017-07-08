<?php

namespace App\Http\Controllers\Auth;

use App\Pengguna;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dasbor';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|email|max:255|unique:pengguna',
            'username' => 'required|min:4|max:16|regex:/[a-z_0-9]{4,16}/|unique:pengguna',
            'password' => 'required|min:6|confirmed',
            'jenis_kelamin' => 'required|boolean',
            'mahasiswa_ipb' => 'required|boolean',
            'nomor_identitas' => 'required|min:9|max:255|unique:pengguna',
            'nomor_hp' => 'required|min:8|max:13|regex:/08[0-9]{6,11}/|unique:pengguna',
            'nomor_wa' => 'nullable|min:8|max:13|regex:/08[0-9]{6,11}/',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $pengguna = Pengguna::create([
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'jenis_kelamin' => $data['jenis_kelamin'],
            'mahasiswa_ipb' => $data['mahasiswa_ipb'],
            'nomor_identitas' => $data['nomor_identitas'],
            'nomor_hp' => $data['nomor_hp'],
            'nomor_wa' => $data['nomor_wa']
        ]);
        $memberRole = Role::where('name', 'member')->first();
        $pengguna->attachRole($memberRole);
        return $pengguna;
    }
}

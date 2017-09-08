@extends('layouts.default')

@section('content')
<div class="container">
  <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pendaftaran</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nama_lengkap') ? ' has-error' : '' }}">
                            <label for="nama_lengkap" class="col-md-4 control-label">Nama Lengkap</label>

                            <div class="col-md-6">
                                <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>

                                @if ($errors->has('nama_lengkap'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_lengkap') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Alamat Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <small class="form-text text-muted">Pastikan alamat email aktif.</small>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                            <label for="jenis_kelamin" class="col-md-4 control-label">Jenis Kelamin</label>

                            <div class="col-md-6">
                                <select id="jenis_kelamin" class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" required>
                                    <option value="1" @if(old('jenis_kelamin') === "1") selected @endif>Laki-Laki</option>
                                    <option value="0" @if(old('jenis_kelamin') === "0") selected @endif>Perempuan</option>
                                </select>

                                @if ($errors->has('jenis_kelamin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mahasiswa_ipb') ? ' has-error' : '' }}">
                            <label for="mahasiswa_ipb" class="col-md-4 control-label">Mahasiswa IPB?</label>

                            <div class="col-md-6">
                                <select id="mahasiswa_ipb" class="form-control" name="mahasiswa_ipb" value="{{ old('mahasiswa_ipb') }}" required>
                                    <option value="0" @if(old('mahasiswa_ipb') === "0") selected @endif>Bukan (Umum)</option>
                                    <option value="1" @if(old('mahasiswa_ipb') === "1") selected @endif>Ya (Diploma/Sarjana)</option>
                                    <option value="2" @if(old('mahasiswa_ipb') === "2") selected @endif>Ya (Pascasarjana)</option>
                                </select>

                                @if ($errors->has('mahasiswa_ipb'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mahasiswa_ipb') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nomor_identitas') ? ' has-error' : '' }}">
                            <label for="nomor_identitas" class="col-md-4 control-label">Nomor Identitas</label>

                            <div class="col-md-6">
                                <input id="nomor_identitas" type="text" class="form-control" name="nomor_identitas" value="{{ old('nomor_identitas') }}" required>
                                <small class="form-text text-muted">Mahasiswa: NIM; Umum: Nomor KTP/KK (NIK), SIM, atau Paspor.</small>

                                @if ($errors->has('nomor_identitas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nomor_identitas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nomor_hp') ? ' has-error' : '' }}">
                            <label for="nomor_hp" class="col-md-4 control-label">Nomor HP</label>

                            <div class="col-md-6">
                                <input id="nomor_hp" type="text" class="form-control" name="nomor_hp" value="{{ old('nomor_hp') }}" placeholder="08xxxxxxxx..." required>
                                <small class="form-text text-muted">Pastikan nomor dapat menerima SMS.<br /></small>

                                @if ($errors->has('nomor_hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nomor_hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nomor_wa') ? ' has-error' : '' }}">
                            <label for="nomor_wa" class="col-md-4 control-label">Nomor WA</label>

                            <div class="col-md-6">
                                <input id="nomor_wa" type="text" class="form-control" name="nomor_wa" value="{{ old('nomor_wa') }}" placeholder="08xxxxxxxx...">
                                <small class="form-text text-muted">Tidak wajib.<br /></small>

                                @if ($errors->has('nomor_wa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nomor_wa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                                <small class="form-text text-muted">Huruf kecil, angka, dan underscore (4-16 karakter).</small>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Ulangi Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4"><small>Pastikan data yang diisikan benar.</small></div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

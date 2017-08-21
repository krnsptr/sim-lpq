@extends('layouts.default')
@section('content')

  <!-- Full Width Column -->
  <div class="">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Akun
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
          <li>User</li>
          <li class="active">Akun</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div style="margin-top:10px">
          @if (session()->has('error') || $errors->any())
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
            {{ session()->get('error') }}
            @foreach ($errors->all() as $message)
              {{ $message }}<br />
            @endforeach
          </div>
          @endif
          @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            {{ session()->get('success') }}
          </div>
          @endif

          <div class="callout callout-info">
            <h4><i class="icon fa fa-info"></i>&emsp;Pengumuman</h4>
            {!! sistem('pengumuman') !!}
          </div>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
            	<h4>Edit Data</h4>
            </div>
      			<div class="box-body">
              <form action="{{ url('dasbor/akun/edit') }}" method="post">
                {{ csrf_field() }}
      					<div class="col-md-6">
                  <div class="row" style="margin:10px 10px 10px 10px">
      							<div class="form-group has-feedback">
      								<label class="control-group">Nama Lengkap</label>
      								<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap sesuai identitas" value="{{ $member->nama_lengkap }}" data-required-error="Nama lengkap wajib diisi."autocomplete="off" required>
      								<span class="glyphicon glyphicon-flower form-control-feedback"></span>
      								<div class="help-block with-errors"></div>
      							</div>
      						</div>
                  <div class="row" style="margin:10px 10px 10px 10px">
      							<div class="form-group has-feedback">
      								<label class="control-group">Jenis Kelamin</label>
      								<select name="jenis_kelamin" class="form-control"autocomplete="off" required>
      									<option value="1"@if ($member->jenis_kelamin == 1) selected @endif> Laki-laki </option>
      									<option value="0"@if ($member->jenis_kelamin == 0) selected @endif> Perempuan </option>
      								</select>
      								<div class="help-block with-errors"></div>
      							</div>
      						</div>
                  <div class="row" style="margin:10px 10px 10px 10px">
      							<div class="form-group has-feedback">
      								<label class="control-group">Mahasiswa IPB</label>
      								<select name="mahasiswa_ipb" class="form-control"autocomplete="off" required>
      									<option value="0"@if ($member->mahasiswa_ipb === 0) selected @endif> Bukan (Umum) </option>
      									<option value="1"@if ($member->mahasiswa_ipb === 1) selected @endif> Ya (Diploma/Sarjana) </option>
                        <option value="2"@if ($member->mahasiswa_ipb === 2) selected @endif> Ya (Pascasarjana) </option>
      								</select>
      								<div class="help-block with-errors"></div>
      							</div>
      						</div>
      						<div class="row" style="margin:10px 10px 10px 10px">
      							<div class="form-group has-feedback">
      								<label class="control-group">Nomor HP (SMS)</label>
      								<input type="text" name="nomor_hp" class="form-control" placeholder="08xxxxxxxxxx" value="{{ $member->nomor_hp }}" pattern="08[0-9]{8,11}" data-pattern-error="Format nomor HP salah. Contoh: 081234567890 (10-13 digit)." data-required-error="Nomor HP wajib diisi."autocomplete="off" required>
      								<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
      								<div class="help-block with-errors"></div>
      							</div>
      						</div>
      					</div>
      					<div class="col-md-6">
                  <div class="row" style="margin:10px 10px 10px 10px">
      							<div class="form-group has-feedback">
      								<label class="control-group">Username</label>
      								<input type="text" name="username" class="form-control" placeholder="Username" value="{{ $member->username }}" pattern="[a-z0-9_]{4,16}" data-pattern-error = "Username hanya boleh mengandung huruf kecil, angka, dan underscore (4-16 karakter)." data-required-error="Username wajib diisi."autocomplete="off" required>
      								<span class="glyphicon glyphicon-user form-control-feedback"></span>
      								<div class="help-block with-errors"></div>
      							</div>
      						</div>
      						<div class="row" style="margin:10px 10px 10px 10px">
      							<div class="form-group has-feedback">
      								<label class="control-group">Alamat Email</label>
      								<input type="email" name="email" class="form-control" placeholder="Email" value="{{ $member->email }}" data-error="Format email salah." data-required-error="Email wajib diisi."autocomplete="off" required>
      								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      								<div class="help-block with-errors"></div>
      							</div>
      						</div>
      						<div class="row" style="margin:10px 10px 10px 10px">
      							<div class="form-group has-feedback">
      								<label class="control-group">Nomor Identitas</label>
      								<input type="text" name="nomor_identitas" class="form-control" placeholder="NIM / NIP / KTP / SIM / KK / ..." value="{{ $member->nomor_identitas }}" data-required-error="Nomor Identitas wajib diisi."autocomplete="off" required>
      								<span class="glyphicon glyphicon- form-control-feedback"></span>
      								<div class="help-block with-errors"></div>
      							</div>
      						</div>
      						<div class="row" style="margin:10px 10px 10px 10px">
      							<div class="form-group has-feedback">
      								<label class="control-group">Nomor WA (tidak wajib)</label>
      								<input type="text" name="nomor_wa" class="form-control" placeholder="08xxxxxxxxxxx" value="{{ $member->nomor_wa }}" pattern="08[0-9]{8,11}" data-pattern-error="Format nomor HP salah. Contoh: 081234567890 (10-13 digit)." autocomplete="off">
      								<span class="glyphicon glyphicon form-control-feedback"></span>
      								<div class="help-block with-errors"></div>
      							</div>
      						</div>
      						<div class="row" style="margin:10px 10px 10px 10px">
      							<div class="col-md-4 pull-right">
      							  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
      							</div>
      						</div>
      					</div>
              </form>
      			</div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
              <div class="box box-default">
                  <div class="box-header with-border">
                  	<h4>Ganti Password</h4>
                  </div>
      			<div class="box-body">
              <form action="{{ url('dasbor/akun/password') }}" method="post">
                {{ csrf_field() }}
      					<div class="col-md-3">
      						<div class="form-group has-feedback">
      							<label class="control-group">Password Lama</label>
      							<input type="password" name="password_lama" class="form-control" placeholder="Password" data-minlength="6" data-error="Password minimum 6 karakter." data-required-error="Password wajib diisi."autocomplete="off" required>
      							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
      							<div class="help-block with-errors"></div>
      						</div>
      					</div>
      					<div class="col-md-3">
      						<div class="form-group has-feedback">
      							<label class="control-group">Password Baru</label>
      							<input type="password" name="password" class="form-control" placeholder="Password" data-minlength="6" data-error="Password minimum 6 karakter." data-required-error="Password wajib diisi."autocomplete="off" required>
      							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
      							<div class="help-block with-errors"></div>
      						</div>
      					</div>
                <div class="col-md-3">
                  <div class="form-group has-feedback">
    								<label class="control-group">Ulangi Password</label>
    								<input type="password" name="password_confirmation" class="form-control" placeholder="Password" data-minlength="6" data-match="#password" data-error="Password minimum 6 karakter." data-required-error="Password wajib diulangi." data-match-error="Password tidak sama." required>
    								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
    								<div class="help-block with-errors"></div>
    							</div>
      					</div>
      					<div class="col-md-2">
      						<div class="row" style="margin:15px 10px 10px 10px"></div>
      					 	<button type="submit" class="btn btn-primary btn-block btn-flat">Ganti</button>
      					</div>
              </form>
      			</div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
              <!--div class="box box-default">
                  <div class="box-header with-border">
                  	<h4>Hapus Akun</h4>
                  </div>
      			<div class="box-body">
      				Fitur ini belum tersedia. Silakan coba kembali nanti.
      			</div-->
                <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>


@stop

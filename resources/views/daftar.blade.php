@extends('layouts.default')
@section('content')
  <div class="container">
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
                                  <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autofocus>

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
                                  <select id="jenis_kelamin" class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" required autofocus>
                                      <option value="0">Laki-Laki</option>
                                      <option value="1">Perempuan</option>
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
                                  <select id="mahasiswa_ipb" class="form-control" name="mahasiswa_ipb" value="{{ old('mahasiswa_ipb') }}" required autofocus>
                                      <option value="0">Bukan</option>
                                      <option value="1">Ya</option>
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
                                  <input id="nomor_identitas" type="text" class="form-control" name="nomor_identitas" value="{{ old('nomor_identitas') }}" required autofocus>

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
                                  <input id="nomor_hp" type="text" class="form-control" name="nomor_hp" value="{{ old('nomor_hp') }}" required autofocus>

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
                                  <input id="nomor_wa" type="text" class="form-control" name="nomor_wa" value="{{ old('nomor_wa') }}" autofocus>

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
                                  <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

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
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      Register
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@stop
@section('content-backup')
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dasbor
        </h1>
        <ol class="breadcrumb">
          <li><a href="front-end/"><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
          <li class="active">Dasbor</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-ban"></i> Alert!</h4>
			Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire
			soul, like these sweet mornings of spring which I enjoy with my whole heart.
		</div>
		<div class="alert alert-info alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-info"></i> Alert!</h4>
			Success alert preview. This alert is dismissable.
		</div>
        <div class="box box-default">
          <div class="box-header with-border">
				  <!-- /.login-logo -->
			  <div class="login-box-body">
				<h3 class="login-box-msg">Form Pendaftaran</h3>

			  </div>
			  <!-- /.login-box-body -->
          </div>
          <div class="box-body">
				<form action="#" method="post">
					<div class="col-md-6">
						<div class="row" style="margin:10px 10px 10px 10px">
							<div class="form-group has-feedback">
								<label class="control-group">Username</label>
								<input type="text" class="form-control" placeholder="Username" required>
								<span class="glyphicon glyphicon-user form-control-feedback"></span>
							</div>
						</div>
						<div class="row" style="margin:10px 10px 10px 10px" required>
							<div class="form-group has-feedback">
								<label class="control-group">Password</label>
								<input type="password" class="form-control" placeholder="Password">
								<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							</div>
						</div>
						<div class="row" style="margin:10px 10px 10px 10px" required>
							<div class="form-group has-feedback">
								<label class="control-group">Alamat Email</label>
								<input type="email" class="form-control" placeholder="Email">
								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
							</div>
						</div>
						<div class="row" style="margin:10px 10px 10px 10px" required>
							<div class="form-group has-feedback">
								<label class="control-group">Nomor HP (SMS)</label>
								<input type="text" class="form-control" placeholder="08xx xxxx xxxx">
								<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row" style="margin:10px 10px 10px 10px">
							<div class="form-group has-feedback">
								<label class="control-group">Nama Lengkap</label>
								<input type="text" class="form-control" placeholder="Nama lengkap sesuai identitas" required>
								<span class="glyphicon glyphicon-flower form-control-feedback"></span>
							</div>
						</div>
						<div class="row" style="margin:10px 10px 10px 10px" required>
							<div class="form-group has-feedback">
								<label class="control-group">Nomor Identitas</label>
								<input type="text" class="form-control" placeholder="NIM / NIP / KTP / SIM / KK / ...">
								<span class="glyphicon glyphicon- form-control-feedback"></span>
							</div>
						</div>
						<div class="row" style="margin:10px 10px 10px 10px" required>
							<div class="form-group has-feedback">
								<label class="control-group">Jenis Kelamin</label>
								<select class="form-control">
									<option> Laki-laki </option>
									<option> Perempuan </option>
								</select>
							</div>
						</div>
						<div class="row" style="margin:10px 10px 10px 10px">
							<div class="form-group has-feedback">
								<label class="control-group">Nomor WA (tidak wajib)</label>
								<input type="text" class="form-control" placeholder="08xxx xxxx xxxx">
								<span class="glyphicon glyphicon form-control-feedback"></span>
							</div>
						</div>
					</div>
					<div>
						<div class="col-md-8">
							Pastikan semua data terisi benar.<br>
							Nomor identitas akan sebagai pengidentifikasi anggota saat publikais hasil ujian.
						</div>
							<!-- /.col -->
						<div class="col-md-2">
						  <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
						</div>
							<!-- /.col -->
					</div>
				</form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      </div>
   </div>
@stop

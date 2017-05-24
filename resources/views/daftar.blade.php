@extends('layouts.default')
@section('content')
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
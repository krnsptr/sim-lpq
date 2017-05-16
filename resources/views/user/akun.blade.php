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
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
			</div>

			<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
			</div>

            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            </div>

            <div class="callout callout-info">
                <h4><i class="icon fa fa-info"></i>&emsp;Pengumuman</h4>
            </div>
		</div>
        <div class="box box-default">
            <div class="box-header with-border">
            	<h4>Edit Data</h4>
            </div>
			<div class="box-body">
					<div class="col-md-6">
						<div class="row" style="margin:10px 10px 10px 10px">
							<div class="form-group has-feedback">
								<label class="control-group">Username</label>
								<input type="text" name="username" class="form-control" placeholder="Username" value="" pattern="[a-z0-9_]{4,16}" data-pattern-error = "Username hanya boleh mengandung huruf kecil, angka, dan underscore (4-16 karakter)." data-required-error="Username wajib diisi." required>
								<span class="glyphicon glyphicon-user form-control-feedback"></span>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="row" style="margin:10px 10px 10px 10px">
							<div class="form-group has-feedback">
								<label class="control-group">Alamat Email</label>
								<input type="email" name="email" class="form-control" placeholder="Email" value="" data-error="Format email salah." data-required-error="Email wajib diisi." required>
								<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="row" style="margin:10px 10px 10px 10px">
							<div class="form-group has-feedback">
								<label class="control-group">Nomor HP (SMS)</label>
								<input type="text" name="nomor_hp" class="form-control" placeholder="08xxxxxxxxxx" value="" pattern="08[0-9]{8,11}" data-pattern-error="Format nomor HP salah. Contoh: 081234567890 (10-13 digit)." data-required-error="Nomor HP wajib diisi." required>
								<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="row" style="margin:10px 10px 10px 10px">
							<div class="form-group has-feedback">
								<label class="control-group">Nomor WA (tidak wajib)</label>
								<input type="text" name="nomor_wa" class="form-control" placeholder="08xxxxxxxxxxx" value="" pattern="08[0-9]{8,11}" data-pattern-error="Format nomor HP salah. Contoh: 081234567890 (10-13 digit).">
								<span class="glyphicon glyphicon form-control-feedback"></span>
								<div class="help-block with-errors"></div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row" style="margin:10px 10px 10px 10px">
							<div class="form-group has-feedback">
								<label class="control-group">Nama Lengkap</label>
								<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap sesuai identitas" value="" data-required-error="Nama lengkap wajib diisi." required>
								<span class="glyphicon glyphicon-flower form-control-feedback"></span>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="row" style="margin:10px 10px 10px 10px">
							<div class="form-group has-feedback">
								<label class="control-group">Nomor Identitas</label>
								<input type="text" name="nomor_id" class="form-control" placeholder="NIM / NIP / KTP / SIM / KK / ..." value="" data-required-error="Nomor Identitas wajib diisi." required>
								<span class="glyphicon glyphicon- form-control-feedback"></span>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="row" style="margin:10px 10px 10px 10px">
							<div class="form-group has-feedback">
								<label class="control-group">Jenis Kelamin</label>
								<select name="jenis_kelamin" class="form-control" required>
									<option value="0"> Laki-laki </option>
									<option value="1"> Perempuan </option>
								</select>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="row" style="margin:25px 10px 10px 20px">
						</div>
						<div class="row" style="margin:10px 10px 10px 10px">
							<div class="col-md-4 pull-right">
							  <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
							</div>
						</div>
					</div>
				
			</div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <div class="box box-default">
            <div class="box-header with-border">
            	<h4>Ganti Password</h4>
            </div>
			<div class="box-body">
					<div class="col-md-5">
						<div class="form-group has-feedback">
							<label class="control-group">Password Lama</label>
							<input type="password" name="password_lama" class="form-control" placeholder="Password" data-minlength="6" data-error="Password minimum 6 karakter." data-required-error="Password wajib diisi." required>
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group has-feedback">
							<label class="control-group">Password Baru</label>
							<input type="password" name="password_baru" class="form-control" placeholder="Password" data-minlength="6" data-error="Password minimum 6 karakter." data-required-error="Password wajib diisi." required>
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="row" style="margin:15px 10px 10px 10px"></div>
					 	<button type="submit" class="btn btn-primary btn-block btn-flat">Ganti</button>
					</div>
				
			</div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <div class="box box-default">
            <div class="box-header with-border">
            	<h4>Hapus Akun</h4>
            </div>
			<div class="box-body">
				Fitur ini belum tersedia. Silakan coba kembali nanti.
			</div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>


@stop
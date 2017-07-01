@extends('layouts.default')
@section('content')

  <!-- Full Width Column -->
  <div class="">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit Program
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
          <li>User</li>
          <li>Program</li>
          <li class="active">Edit</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div style="margin-top:10px">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
			</div>
            <div class="callout callout-info">
                <h4><i class="icon fa fa-info"></i>&emsp;Pengumuman</h4>
            </div>
        </div>
       
         <div class="box box-default">
            <div class="box-header with-border">
				<h4>Instruktur Tahsin</h4>
            </div>
			<div class="box-body">
					<div class="form-group col-md-12">
						<div class="col-md-5">
							<label class="control-group">Memenuhi syarat</label>
							<div class="form-group has-feedback">
								<input type="checkbox" name="memenuhi_syarat[]" value="1"> Lulus Tahsin 2<br />
								<input type="checkbox" name="memenuhi_syarat[]" value="1"> Lulus Dauroh Syahadah<br />
								<input type="checkbox" name="memenuhi_syarat[]" value="1"> Berkompetensi mengajar<br />
							</div>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-5">
							<label class="control-group">Pendaftaran</label>
							<div class="form-group has-feedback">
								<select class="form-control" name="pendaftaran">
									<option value="0">Pendaftaran baru</option>
									<option value="1">Pendaftaran ulang</option>
								</select><br />
								Pendaftaran ulang khusus Instruktur Tahsin lama yang sudah pernah mengikuti wawancara.<br />
							</div>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-5">
							<label class="control-group">Alasan mendaftar</label>
							<div class="form-group has-feedback">
								<input type="text" class="form-control" name="alasan_mendaftar">
							</div>
						</div>
					</div>
					
					<div class="form-group col-md-12">
						<div class="col-md-5">
							<label class="control-group">Enrollment Key</label>
							<div class="form-group has-feedback">
								<input type="text" class="form-control" name="enrollment_key"><br />
								Rekrutmen tertutup khusus untuk yang telah menerima enrollment key.<br />
							</div>
						</div>
					</div>
					
						<div class="col-md-2">						
							<button type="submit" class="btn btn-info btn-flat">Edit</button>
							<a href="" class="btn btn-default btn-flat">Batal</a>
						</div>
				
			</div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
    </div>
    <!-- /.container -->
  </div>

@stop
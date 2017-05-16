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
		
        <div class="box box-default">
            <div class="box-header with-border">
				<h4></h4>
            </div>
			<div class="box-body">
				
					<div class="form-group col-md-12">
						<div class="col-md-5">
							<label class="control-group">Sudah pernah ikut KBM di LPQ?</label>
							<div class="form-group has-feedback">
								<select class="form-control" name="sudah_lulus">
									
								</select>
							</div>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-5">
							<label class="control-group">Terakhir KBM tahun</label>
							<div class="form-group has-feedback">
								<select class="form-control" name="kbm_tahun">
									
								</select>
							</div>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-5">
							<label class="control-group">Terakhir KBM semester</label>
							<div class="form-group has-feedback">
								<select class="form-control" name="kbm_semester">
									
									<option value="1">Ganjil (September&ndash;Januari)</option>
									<option value="2">Genap (Februari&ndash;Juni)</option>
								</select>
							</div>
						</div>
					</div>
						<div class="col-md-2">						
							<button type="submit" class="btn btn-primary btn-flat">Simpan</button>
							<a href="" class="btn btn-default btn-flat">Kembali</a>
						</div>

			</div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        
         <div class="box box-default">
            <div class="box-header with-border">
				<h4></h4>
            </div>
			<div class="box-body">
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
							<label class="control-group">Alasan mendaftar</label>
							<div class="form-group has-feedback">
								<input type="text" class="form-control" name="alasan_mendaftar" value=""><br />
							</div>
						</div>
					</div>

					<div class="form-group col-md-12">
						Tidak ada data yang bisa diubah.
					</div>
						<div class="col-md-2">						
							<button type="submit" class="btn btn-primary btn-flat">Simpan</button>
							<a href="" class="btn btn-default btn-flat">Kembali</a>
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
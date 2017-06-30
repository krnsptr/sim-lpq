@extends('layouts.default')
@section('content')

  <!-- Full Width Column -->
  <div class="">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Tambah Program
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
          <li>User</li>
          <li>Program</li>
          <li class="active">Tambah</li>
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
							<button type="submit" class="btn btn-success btn-flat">Tambah</button>
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
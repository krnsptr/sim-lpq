@extends('layouts.default')
@section('content')

  <!-- Full Width Column -->
  <div class="">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Hapus Jadwal
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
          <li>User</li>
          <li>Penjadwalan</li>
          <li class="active">Hapus</li>
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
						Hapus jadwal?
					</div>
						<div class="col-md-2">						
							<button type="submit" class="btn btn-danger btn-flat">Hapus</button>
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
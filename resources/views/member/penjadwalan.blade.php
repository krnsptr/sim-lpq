@extends('layouts.default')
@section('content')

  <!-- Full Width Column -->
  <div class="">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Penjadwalan
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
          <li>User</li>
          <li class="active">Penjadwalan</li>
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
            	<h4>Nama Program</h4>
            </div>
            	<div class="box-body table-condensed">Penjadwalan pengajar sudah ditutup.</div>
			<div class="box-body table-condensed">
					<div class="form-group col-md-4">
						<label class="control-group col-md-12"> Jumlah kelompok yang siap dibina</label>
						<div class="col-md-6">
							<div class="form-group has-feedback">
								<input type="number" class="form-control" name="jumlah_kelompok" value="">
							</div>
						</div>
						<div class="col-md-2">						
							<button type="submit" class="btn btn-primary btn-flat">Ubah</button>
						</div>
					</div>
					<div class="form-group col-md-8">
						<label class="control-group col-md-12"> Tambah alternatif (durasi 2 jam)</label>
						<div class="col-md-10">
							<div class="form-group has-feedback">
							  <div class="col-md-6">
								<select name="hari" class="form-control">
								</select>
							  </div>
							  <div class="col-md-6">
								<input type="text" name="waktu" class="form-control" value="00:00">
							  </div>
							</div>
						</div>
						<div class="col-md-2">						
							<button type="submit" class="btn btn-success btn-flat">Tambah</button>
						</div>
					</div>
				<table class="table">
					<thead>
						<tr>
							<th>Alternatif (Jadwal kosong)</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="col-md-3">
									<select name="hari" class="form-control"></select>
								</div>
								<div class="col-md-3">
									<input type="text" name="waktu" class="form-control" value="">
								</div>
							</td>
							<td>
								<input type="submit" class="btn btn-primary btn-flat" value="Ubah">
								<a href="" class="btn btn-danger btn-flat">Hapus</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
          	<!-- /.box-body -->
          	<div class="box-footer">
          		Jumlah alternatif disarankan lebih dari jumlah kelompok yang siap dibina.<br />
				Pengajar <strong>bertanggung jawab penuh</strong> atas jadwal yang dipilih.<br />
				Departemen Administrasi akan menentukan jadwal mana yang akan digunakan untuk KBM.<br />
          	</div>
        </div>
        <!-- /.box -->
		
        <div class="box box-default">
            <div class="box-header with-border">
            	<h4>Santri Takhossus/ Tahfidz</h4>
            </div>
			<div class="box-body table-condensed">
				<table class="table">
					<tbody>
						<tr>
							<td width="20%">Jenjang</td>
							<td>: Takhossus</td>
						</tr>
						<tr>
							<td>Jadwal</td>
							<td>: (Belum dipilih)</td>
						</tr>
						<tr>
							<td>Ganti Jadwal</td>
							<td>
								<div class="form-group col-md-12">
									<div class="col-md-4">	
										<div class="form-group has-feedback">
											<select name="hari" class="form-control">
											</select>
										</div>
									</div>	
									<div class="col-md-4">						
										<button type="submit" class="btn btn-primary btn-flat">Ubah</button>
										<a href="" class="btn btn-danger btn-flat">Hapus</a>
									</div>
								</div>								
							</td>
						</tr>
					</tbody>
				</table>
			</div>
          	<!-- /.box-body -->
          	<div class="box-footer">
          	</div>
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
@stop
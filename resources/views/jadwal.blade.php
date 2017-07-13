@extends('layouts.default')
@section('content')

  <!-- Full Width Column -->
  <div class="">
    <div class="container">

      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
            	<h4>Jadwal Program</h4>
            </div>
			<div class="box-body table-condensed">
				<div class="form-group col-md-5">

				</div>
				<table class="table">
					<thead>
						<tr>
							<th>Program</th>
							<th>Jenjang</th>
							<th>Hari</th>
							<th>Waktu</th>
							<th>Nama Santri</th>
							<th>Nomor Identitas</th>
							<th>Nama Instruktur</th>
							<th>Nomor HP/ WA</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($santri as $santri)
						<tr>
							<td>{{$santri->jenjang->jenis_program->nama}}</td>
							<td>{{$santri->jenjang->nama}}</td>
							<td>{{$hari[$santri->kelompok->jadwal->hari]}}</td>
							<td>{{$santri->kelompok->jadwal->waktu}}</td>
							<td>{{$santri->pengguna->nama_lengkap}}</td>
							<td>{{$santri->pengguna->nomor_identitas}}</td>
							<td>{{$santri->kelompok->jadwal->pengajar->pengguna->nama_lengkap}}</td>
							<td>{{$santri->pengguna->nomor_hp}}</td>
						</tr>
						@endforeach
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

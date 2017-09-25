@extends('layouts.default')
@section('content')

  <!-- Full Width Column -->
  <div class="">
    <div class="container">

      <!-- Main content -->
      <section class="content">
        <div class="box box-default ">
            <div class="box-header with-border">
              <h3 class="box-title" style="vertical-align: middle">Jadwal KBM</h3>
              <a href="{{ url('jadwal.pdf') }}" class="btn btn-danger pull-right">
                <i class="fa fa-download"></i>&ensp;
                Download PDF
              </a>
            </div>
      			<div class="box-body table-responsive">
      				<div class="form-group col-md-5">

      				</div>
              @foreach ($daftar_kelompok as $kelompok)
      				<table class="table table-bordered">
      					<thead>
      						<tr style="background: #eee;">
      							<th width="10%">Kelompok</th>
                    <th>Jenjang</th>
                    <th>Jadwal</th>
                    <th>Nama Pengajar</th>
                    <th>Nomor HP</th>
                    <th>Nomor WA</th>
      						</tr>
      					</thead>
      					<tbody>
      						<tr>
      							<td width="10%">{{ $kelompok->id }}</td>
                    <td>{{ $kelompok->jenjang->nama }}</td>
                    <td>{{ $hari[$kelompok->jadwal->hari] }}, {{ $kelompok->jadwal->waktu }}</td>
                    <td>{{ $kelompok->jadwal->pengajar->pengguna->nama_lengkap }}</td>
                    <td>{{ $kelompok->jadwal->pengajar->pengguna->nomor_hp }}</td>
                    <td>{{ $kelompok->jadwal->pengajar->pengguna->nomor_wa }}</td>
      						</tr>
      					</tbody>
      				</table>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="10%">No. </th>
                    <th>Nama Santri</th>
                    <th>Nomor Identitas</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kelompok->daftar_santri as $santri)
                  <tr>
                    <td width="10%">{{ $loop->iteration }}</td>
                    <td>{{ $santri->pengguna->nama_lengkap }}</td>
                    <td>{{ $santri->pengguna->nomor_identitas }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <br /><br />
              @endforeach
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

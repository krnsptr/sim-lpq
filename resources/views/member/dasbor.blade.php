@extends('layouts.default')
@section('content')

  <!-- Full Width Column -->
  <div class="">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dasbor
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
          <li>User</li>
          <li class="active">Dasbor</li>
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
		<!--Untuk mengubah data atau menghapus akun, silahkan menuju <a href="#">Akun</a>-->
        <div class="box box-default">
            <div class="box-header with-border">
            	<h4>Program</h4>
            </div>
      			<div class="box-body table-condensed">
              <form action="{{ action('ControllerMember@program_baru') }}" method="post">
        				<div class="form-group col-md-12">
        					<label class="control-group col-md-12"> Tambah program </label>
        					<div class="col-md-5">
        						<div class="form-group has-feedback">
        							<select class="form-control" name="tambah">
                        @if ($pendaftaran_pengajar)
                          @foreach ($daftar_jenis_program as $jenis_program)
                          <option value="1{{ $jenis_program->id }}">Pengajar {{ $jenis_program->nama }}</option>
                          @endforeach
                        @endif
                        @if ($pendaftaran_santri)
                          @foreach ($daftar_jenis_program as $jenis_program)
                            <option value="2{{ $jenis_program->id }}">Santri {{ $jenis_program->nama }}</option>
                          @endforeach
                        @endif
        							</select>
        						</div>
        					</div>
        					<div class="col-md-2">
        						<button type="submit" class="btn btn-success btn-flat">Tambah</button>
        					</div>
        				</div>
              </form>

      				<table class="table">
      					<thead>
      						<tr>
      							<th>Program</th>
      							<th>Aksi</th>
      						</tr>
      					</thead>
      					<tbody>
                  @foreach ($daftar_pengajar as $pengajar)
      						<tr>
      							<td>Pengajar {{ $pengajar->jenjang->jenis_program->nama }}</td>
      							<td>
                      <a href="{{ url('dasbor/program/edit/pengajar/'.$pengajar->id) }}" class="btn btn-primary flat">Edit</a>
      								<a href="{{ url('dasbor/program/hapus/pengajar/'.$pengajar->id) }}" class="btn btn-danger flat">Hapus</a>
      							</td>
      						</tr>
                  @endforeach
                  @foreach ($daftar_santri as $santri)
      						<tr>
      							<td>Santri {{ $santri->jenjang->jenis_program->nama }}</td>
      							<td>
      								<a href="{{ url('dasbor/program/edit/santri/'.$santri->id) }}" class="btn btn-primary flat">Edit</a>
      								<a href="{{ url('dasbor/program/hapus/santri/'.$santri->id) }}" class="btn btn-danger flat">Hapus</a>
      							</td>
      						</tr>
                  @endforeach
      					</tbody>
      				</table>
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

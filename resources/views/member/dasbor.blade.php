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
          @if (session()->has('error'))
    			<div class="alert alert-danger alert-dismissible">
    				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    				<h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
            {{ session()->get('error') }}
    			</div>
          @endif
          @if (session()->has('warning'))
    			<div class="alert alert-warning alert-dismissible">
    				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    				<h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
            {{ session()->get('warning') }}
    			</div>
          @endif
          @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            {{ session()->get('success') }}
          </div>
          @endif

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
                {{ csrf_field() }}
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
                      <form action="{{ url('dasbor/program/edit') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="keanggotaan" value="1" />
                        <input type="hidden" name="id" value="{{ $pengajar->id }}" />
                        <button class="btn btn-primary flat">Edit</button>
                      </form>
                      <form action="{{ url('dasbor/program/hapus') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="keanggotaan" value="1" />
                        <input type="hidden" name="id" value="{{ $pengajar->id }}" />
                        <button class="btn btn-danger flat">Hapus</button>
                      </form>
      							</td>
      						</tr>
                  @endforeach
                  @foreach ($daftar_santri as $santri)
      						<tr>
      							<td>Santri {{ $santri->jenjang->jenis_program->nama }}</td>
      							<td>
                      <form action="{{ url('dasbor/program/edit') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="keanggotaan" value="2" />
                        <input type="hidden" name="id" value="{{ $santri->id }}" />
                        <button class="btn btn-primary flat">Edit</button>
                      </form>
                      <form action="{{ url('dasbor/program/hapus') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="keanggotaan" value="2" />
                        <input type="hidden" name="id" value="{{ $santri->id }}" />
                        <button class="btn btn-danger flat">Hapus</button>
                      </form>
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

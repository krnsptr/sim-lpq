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
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
          {{ session()->get('error') }}
        </div>
        @endif
        @if (isset($warning))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
          {!! $warning !!}
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
          {!! sistem('pengumuman') !!}
        </div>
        @foreach ($daftar_pengajar as $pengajar)
        <div class="box box-default">
            <div class="box-header with-border">
            	<h4>Pengajar {{ $pengajar->jenjang->jenis_program->nama }}</h4>
            </div>
        			<div class="box-body table-condensed">
        					<div class="form-group col-md-4">
                    <form action="{{ url('dasbor/penjadwalan/kapasitas-membina') }}" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="id_pengajar" value="{{ $pengajar->id }}" />
          						<label class="control-group col-md-12"> Jumlah kelompok yang siap dibina</label>
          						<div class="col-md-6">
          							<div class="form-group has-feedback">
          								<input type="number" class="form-control" name="kapasitas_membina" value="{{ $pengajar->kapasitas_membina }}" autocomplete="off">
          							</div>
          						</div>
          						<div class="col-md-2">
          							<button type="submit" class="btn btn-primary btn-flat">Ubah</button>
          						</div>
                    </form>
        					</div>
                  @if (!$penjadwalan_pengajar)
                	<div class="form-group col-md-8"><br />Penjadwalan pengajar sudah ditutup.</div>
                  @else
        					<div class="form-group col-md-8">
                    <form action="{{ url('dasbor/penjadwalan/tambah') }}" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="id_pengajar" value="{{ $pengajar->id }}" />
          						<label class="control-group col-md-12"> Tambah alternatif (durasi 2 jam)</label>
          						<div class="col-md-10">
          							<div class="form-group has-feedback">
          							  <div class="col-md-6">
          								<select name="hari" class="form-control">
                            <option value="1">Ahad</option>
                            <option value="2">Senin</option>
                            <option value="3">Selasa</option>
                            <option value="4">Rabu</option>
                            <option value="5">Kamis</option>
                            <option value="6">Jumat</option>
                            <option value="7">Sabtu</option>
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
                    </form>
        					</div>
                  @endif
          				<table class="table">
          					<thead>
          						<tr>
          							<th>Alternatif (Jadwal kosong)</th>
          							<th>Aksi</th>
          						</tr>
          					</thead>
          					<tbody>
                      @foreach ($pengajar->daftar_jadwal as $jadwal)
          						<tr>
                        <form action="{{ url('dasbor/penjadwalan/edit') }}" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" name="id_jadwal" value="{{ $jadwal->id }}" />
            							<td>
            								<div class="col-md-3">
            									<select name="hari" class="form-control" autocomplete="off">
                                <option value="1"@if ($jadwal->hari == 1) selected @endif>Ahad</option>
                                <option value="2"@if ($jadwal->hari == 2) selected @endif>Senin</option>
                                <option value="3"@if ($jadwal->hari == 3) selected @endif>Selasa</option>
                                <option value="4"@if ($jadwal->hari == 4) selected @endif>Rabu</option>
                                <option value="5"@if ($jadwal->hari == 5) selected @endif>Kamis</option>
                                <option value="6"@if ($jadwal->hari == 6) selected @endif>Jumat</option>
                                <option value="7"@if ($jadwal->hari == 7) selected @endif>Sabtu</option>
                              </select>
            								</div>
            								<div class="col-md-3">
            									<input type="text" name="waktu" class="form-control" value="{{ $jadwal->waktu }}" autocomplete="off">
            								</div>
            							</td>
            							<td>
                            @if ($penjadwalan_pengajar)
            								 <input type="submit" class="btn btn-primary btn-flat" value="Ubah">
            								 <a href="{{ url('dasbor/penjadwalan/hapus?id_jadwal='.$jadwal->id) }}" class="btn btn-danger btn-flat">Hapus</a>
                            @else
                              Penjadwalan pengajar sudah ditutup.
                            @endif
            							</td>
                        </form>
          						</tr>
                      @endforeach
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
          @endforeach
          @foreach ($daftar_santri as $santri)
          <div class="box box-default">
              <div class="box-header with-border">
              	<h4>Santri {{ $santri->jenjang->jenis_program->nama }}</h4>
              </div>
        			<div class="box-body table-condensed">
        				<table class="table">
        					<tbody>
        						<tr>
        							<td width="20%">Jenjang</td>
        							<td>: {{ $santri->jenjang->nama }}</td>
        						</tr>
        						<tr>
        							<td>Jadwal</td>
        							<td>: @if (is_null($santri->kelompok)) Belum dipilih
                            @else
                              <?php $kelompok = $santri->kelompok; ?>
                              {{$hari[$kelompok->jadwal->hari]}}, {{date('H:i', strtotime($kelompok->jadwal->waktu))}}, Kelompok {{$kelompok->id}}
                            @endif
                      </td>
        						</tr>
        						<tr>
                    @if(!$penjadwalan_santri) Penjadwalan telah ditutup
                    @else
        							<td>Ganti Jadwal</td>
        							<td>
                              @if ($santri->jenjang->id === 1 || $santri->jenjang->id === 5 || $santri->jenjang->id === 8) Anda belum mengikuti placement test.
                              @else
                      		<div class="form-group col-md-12">
                            <form action="{{ url('dasbor/penjadwalan/ganti') }}" method="post">
                              {{ csrf_field() }}
                              <input type="hidden" name="id_santri" value="{{ $santri->id }}" />
            									<div class="col-md-6">
            										<div class="form-group has-feedback">
                                  <select name="id_kelompok" class="form-control" autocomplete="off">
                                    <option value="">Belum dipilih</option>
                                    <?php $id_santri = $santri->id; ?>
                                    @foreach($daftar_kelompok[$id_santri] as $kelompok)
                                      <option value="{{$kelompok->id_k}}"@if ($santri->kelompok && $kelompok->id_k == $santri->kelompok->id) selected  @endif> {{$hari[$kelompok->hari]}}, {{date('H:i', strtotime($kelompok->waktu))}}, Kelompok {{$kelompok->id_k}}: {{$kelompok->nama_lengkap}} (sisa {{$kelompok->sisa}})</option>
                                    @endforeach
            											</select>
            										</div>
            									</div>
            									<div class="col-md-4">
            										<button type="submit" class="btn btn-primary btn-flat">Ubah</button>
            									</div>
                            </form>
        								  </div>
                                @endif
        							</td>
                      @endif
        						</tr>
        					</tbody>
        				</table>
        			</div>
          	<!-- /.box-body -->
          	<div class="box-footer">
          	</div>
        </div>
        <!-- /.box -->
        @endforeach
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
@stop

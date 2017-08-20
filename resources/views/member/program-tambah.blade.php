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
          @if (session()->has('error'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
            {!! session()->get('error') !!}
          </div>
          @endif

          <div class="callout callout-info">
            <h4><i class="icon fa fa-info"></i>&emsp;Pengumuman</h4>
          </div>
        </div>
        @if ($keanggotaan === 1)
        <div class="box box-default">
            <div class="box-header with-border">
				          <h4>Pengajar {{ $jenis_program->nama }}</h4>
            </div>
    			<div class="box-body">
    				<form action="{{ url('dasbor/program/tambah/pengajar') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="jenis_program" value="{{ $jenis_program->id }}" />
    					<?php //if($program == 1) { ?>
    					<!--div class="form-group col-md-12">
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
    					</div-->
    					<div class="form-group col-md-12">
    						<div class="col-md-5">
    							<label class="control-group">Motivasi mengajar</label>
    							<div class="form-group has-feedback">
    								<input type="text" class="form-control" name="motivasi_mengajar" autocomplete="off"><br />
    							</div>
    						</div>
    					</div>
    					<?php //} else { ?>
              @if (!is_null($jenis_program->enrollment_pengajar))
    					<div class="form-group col-md-12">
    						<div class="col-md-5">
    							<label class="control-group">Enrollment Key</label>
    							<div class="form-group has-feedback">
    								<input type="text" class="form-control" name="enrollment_key" autocomplete="off"><br />
    								Rekrutmen tertutup khusus untuk yang telah menerima enrollment key.<br />
    							</div>
    						</div>
    					</div>
              @endif
    					<?php
    						//}
    					?>
    						<div class="col-md-2">
    							<button type="submit" class="btn btn-success btn-flat">Tambah</button>
    							<a href="{{ url('dasbor') }}" class="btn btn-default btn-flat">Batal</a>
    						</div>
    				</form>
    			</div>
        </div>
      @elseif ($keanggotaan === 2)
        <div class="box box-default">
            <div class="box-header with-border">
				       <h4>Santri {{ $jenis_program->nama }}</h4>
            </div>
    			<div class="box-body">
            <form action="{{ url('dasbor/program/tambah/santri') }}" method="post">
              {{ csrf_field() }}
    					<div class="form-group col-md-12">
    						<div class="col-md-5">
    							<label class="control-group">Sudah pernah ikut KBM di LPQ?</label>
    							<div class="form-group has-feedback">
    								<select class="form-control" name="sudah_lulus" autocomplete="off">
                      <?php $lulus = NULL; ?>
                        @foreach ($jenis_program->daftar_jenjang as $jenjang)
                          <option value="{{ $jenjang->id }}">
                            @if ($loop->first)
                              Belum pernah KBM {{ $jenis_program->nama }} di LPQ
                            @elseif ($loop->index == 1)
                              Belum lulus {{ $jenjang->nama }}
                            @else
                              Lulus {{ $lulus }} atau belum lulus {{ $jenjang->nama }}
                            @endif
                          </option>
                          <?php $lulus = $jenjang->nama ?>
                        @endforeach
    								</select>
    							</div>
    						</div>
    					</div>
    					<div class="form-group col-md-12">
    						<div class="col-md-5">
    							<label class="control-group">Terakhir KBM tahun</label>
    							<div class="form-group has-feedback">
    								<select class="form-control" name="tahun_kbm_terakhir" autocomplete="off">
                      <option value="">Belum pernah KBM {{ $jenis_program->nama }} di LPQ</option>
                      @for ($i=intval(date('Y')); $i>=2011; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                      @endfor
    								</select>
    							</div>
    						</div>
    					</div>
    					<div class="form-group col-md-12">
    						<div class="col-md-5">
    							<label class="control-group">Terakhir KBM semester</label>
    							<div class="form-group has-feedback">
    								<select class="form-control" name="semester_kbm_terakhir" autocomplete="off">
                      <option value="">Belum pernah KBM {{ $jenis_program->nama }} di LPQ</option>
    									<option value="1">Ganjil (September&ndash;Januari)</option>
    									<option value="0">Genap (Februari&ndash;Juni)</option>
    								</select>
    							</div>
    						</div>
    					</div>
    					<div class="col-md-2">
    						<button type="submit" class="btn btn-success btn-flat">Tambah</button>
    						<a href="{{ url('dasbor') }}" class="btn btn-default btn-flat">Batal</a>
    					</div>
            </form>
    			</div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      @endif

      </section>
    </div>
    <!-- /.container -->
  </div>

@stop

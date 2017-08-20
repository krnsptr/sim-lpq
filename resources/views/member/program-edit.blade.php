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
        <div style="margin-top:10px">
          <div class="callout callout-info">
            <h4><i class="icon fa fa-info"></i>&emsp;Pengumuman</h4>
            {!! sistem('pengumuman') !!}
          </div>
        </div>

        @if ($keanggotaan === 1)
        <div class="box box-default">
            <div class="box-header with-border">
                 <h4>Pengajar {{ $jenis_program->nama }}</h4>
            </div>
         <div class="box-body">
           <form action="{{ url('dasbor/program/edit/pengajar') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="id_pengajar" value="{{ $pengajar->id }}" />
              <div class="form-group col-md-12">
                <div class="col-md-5">
                  <label class="control-group">Pendaftaran</label>
                  <div class="form-group has-feedback">
                    <select class="form-control" name="pendaftaran">
                      <option value="0"@if ($pengajar->pendaftaran === 0) selected @endif>Pendaftaran baru</option>
                      <option value="1"@if ($pengajar->pendaftaran === 1) selected @endif>Pendaftaran ulang</option>
                    </select><br />
                    <small id="passwordHelpBlock" class="form-text text-muted">Pendaftaran ulang khusus yang pernah mengajar {{ $jenis_program->nama }} di LPQ.</small>
                  </div>
                </div>
              </div>
              @if ($jenis_program->id == 1)
              <div class="form-group col-md-12">
                <div class="col-md-5">
                  <label class="control-group">Memenuhi syarat</label>
                  <div class="form-group has-feedback">
                    <input type="checkbox" name="memenuhi_syarat[0]" value="1"@if ($pengajar->memenuhi_syarat[0]) checked @endif> Lulus Tahsin 2<br />
                    <input type="checkbox" name="memenuhi_syarat[1]" value="1"@if ($pengajar->memenuhi_syarat[1]) checked @endif> Lulus Dauroh Syahadah<br />
                    <input type="checkbox" name="memenuhi_syarat[2]" value="1"@if ($pengajar->memenuhi_syarat[2]) checked @endif> Berkompetensi mengajar<br />
                  </div>
                </div>
              </div>
              @endif
              <div class="form-group col-md-12">
               <div class="col-md-5">
                 <label class="control-group">Motivasi mengajar</label>
                 <div class="form-group has-feedback">
                   <input type="text" class="form-control" name="motivasi_mengajar" value="{{ $pengajar->motivasi_mengajar }}"><br />
                 </div>
               </div>
              </div>
              <div class="col-md-2">
                 <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
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
            <form action="{{ url('dasbor/program/edit/santri') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="id_santri" value="{{ $santri->id }}" />
             <div class="form-group col-md-12">
               <div class="col-md-5">
                 <label class="control-group">Sudah pernah ikut KBM di LPQ?</label>
                 <div class="form-group has-feedback">
                   <select class="form-control" name="sudah_lulus"  autocomplete="off">
                      <?php $lulus = NULL; ?>
                        @foreach ($jenis_program->daftar_jenjang as $jenjang)
                          <option value="{{ $jenjang->id }}"@if ($santri->sudah_lulus == $jenjang) selected @endif>
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
                   <select class="form-control" name="tahun_kbm_terakhir"  autocomplete="off">
                     <option value=""@if (is_null($santri->tahun_kbm_terakhir)) selected @endif>Belum pernah KBM {{ $jenis_program->nama }} di LPQ</option>
                      @for ($i=intval(date('Y')); $i>=2011; $i--)
                        <option value="{{ $i }}"@if ($santri->tahun_kbm_terakhir == $i) selected @endif>{{ $i }}</option>
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
                     <option value=""@if (is_null($santri->tahun_kbm_terakhir)) selected @endif>Belum pernah KBM {{ $jenis_program->nama }} di LPQ</option>
                     <option value="1"@if ($santri->semester_kbm_terakhir == 1) selected @endif>Ganjil (September&ndash;Januari)</option>
                     <option value="0"@if ($santri->semester_kbm_terakhir == 0) selected @endif>Genap (Februari&ndash;Juni)</option>
                   </select>
                 </div>
               </div>
             </div>
             <div class="col-md-2">
               <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
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

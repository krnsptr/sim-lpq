@extends('layouts.default')
@section('content')

  <!-- Full Width Column -->
  <div class="">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Hapus Program
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
          <li>User</li>
          <li>Program</li>
          <li class="active">Hapus</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div style="margin-top:10px">
          <div class="callout callout-info">
            <h4><i class="icon fa fa-info"></i>&emsp;Pengumuman</h4>
            {{ sistem('pengumuman') }}
          </div>
        </div>
      @if ($keanggotaan === 1)
         <div class="box box-default">
            <div class="box-header with-border">
				          <h4>Pengajar {{ $jenis_program->nama }}</h4>
            </div>
      			<div class="box-body">

      					<div class="form-group col-md-12">
      						Hapus program?
      					</div>
      						<div class="col-md-2">
                    <form action="{{ url('dasbor/program/hapus/pengajar') }}" method="post" />
                      {{ csrf_field() }}
                      <input type="hidden" name="id_pengajar" value="{{ $pengajar->id }}" />
        							<button type="submit" class="btn btn-danger btn-flat">Hapus</button>
        							<a href="{{ url('dasbor') }}" class="btn btn-default btn-flat">Batal</a>
                    </form>
      						</div>
      			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      @elseif ($keanggotaan === 2)
        <div class="box box-default">
           <div class="box-header with-border">
                 <h4>Santri {{ $jenis_program->nama }}</h4>
           </div>
           <div class="box-body">

               <div class="form-group col-md-12">
                 Hapus program?
               </div>
                 <div class="col-md-2">
                   <form action="{{ url('dasbor/program/hapus/santri') }}" method="post" />
                     {{ csrf_field() }}
                     <input type="hidden" name="id_santri" value="{{ $santri->id }}" />
                     <button type="submit" class="btn btn-danger btn-flat">Hapus</button>
                     <a href="{{ url('dasbor') }}" class="btn btn-default btn-flat">Batal</a>
                   </form>
                 </div>
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

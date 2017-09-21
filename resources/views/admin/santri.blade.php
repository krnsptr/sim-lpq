@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class= "content">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Santri
      <small>Pengelolaan program dan jadwal santri</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
      <li><a href="">Admin</a></li>
      <li class="active">Santri</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Santri</h3>
        <div class="pull-right">
          <a href="#modal-tambah" data-toggle="modal" class="btn btn-default">
            <i class="fa fa-plus"></i>&ensp;
            Tambah Program
          </a>
          <a href="{{ url('admin/santri/ekspor/excel') }}" class="btn btn-success">
            <i class="fa fa-download"></i>&ensp;
            Download Excel
          </a>
        </div>
      </div>
      <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="dataTable" style="white-space: nowrap;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Lengkap</th>
              <th>Nomor Identitas</th>
              <th>Jenis Kelamin</th>
              <th>Program</th>
              <th>Jenjang</th>
              <th>Kelompok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>Jenis Kelamin</td>
              <td>Program</td>
              <td>Jenjang</td>
              <td>Kelompok</td>
              <td></td>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($daftar_santri as $santri)
            <tr data-id-santri="{{ $santri->id }}" data-program="{{ $santri->jenjang->jenis_program->id }}">
              <td>{{$loop->iteration}}</td>
              <td>{{$santri->pengguna->nama_lengkap}}</td>
              <td>{{$santri->pengguna->nomor_identitas}}</td>
              <td>@if($santri->pengguna->jenis_kelamin) Laki-laki @else Perempuan @endif</td>
              <td data-order="{{$santri->jenjang->jenis_program->id}}">{{ $santri->jenjang->jenis_program->nama}}</td>
              <td data-order="{{$santri->jenjang->id}}">{{ $santri->jenjang->nama}}</td>
              <td>@if ($santri->kelompok) {{$santri->kelompok->id}} @endif</td>
              <td>
                <button class="btn btn-sm btn-primary edit" onclick="edit(this);">Edit Data</button>
                <!--button class="btn btn-sm btn-danger hapus" onclick="hapus(this)">Hapus</button-->
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

  <div class="modal fade" id="modal-edit" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Program</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group col-md-12 santri"></div>
                  <input type="hidden" id="id_santri" value="" />
                  <div class="form-group col-md-12">
                    <label class="control-group">Sudah lulus</label>
                    <select class="form-control" id="sudah_lulus">

                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label class="control-group">Terakhir KBM tahun</label>
                      <select class="form-control" id="tahun_kbm_terakhir" autocomplete="off">
                        <option value="">Belum pernah KBM di LPQ</option>
                        @for ($i=intval(date('Y')); $i>=2011; $i--)
                          <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                      </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label class="control-group">Terakhir KBM semester</label>
                    <select class="form-control" id="semester_kbm_terakhir" autocomplete="off">
                      <option value="">Belum pernah KBM di LPQ</option>
    									<option value="1">Ganjil (September&ndash;Januari)</option>
    									<option value="0">Genap (Februari&ndash;Juni)</option>
    								</select>
                  </div>
                  <div class="form-group col-md-12">
                    <label class="control-group">Jenjang</label>
                    <select class="form-control" id="jenjang">

                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label class="control-group">Kelompok</label>
                    <select class="form-control" id="id_kelompok">

                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="simpan();">Simpan</button>
              </div>
            </div>

          </div>
  </div>
  <div class="modal fade" id="modal-tambah" role="dialog">
          <div class="modal-dialog">
            <form action="{{ url('admin/santri/tambah') }}" method="post">
              {{ csrf_field() }}
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Tambah Program</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                      <label class="control-group">Username Anggota</label>
                        <input type="text" class="form-control" name="username" />
                    </div>
                    <div class="form-group col-md-12">
                      <label class="control-group">Sudah lulus</label>
                      <select class="form-control" name="sudah_lulus">
                        @foreach ($daftar_jenjang as $jenjang)
                          <option value="{{ $jenjang->id }}">{{ $jenjang->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="control-group">Terakhir KBM tahun</label>
                        <select class="form-control" name="tahun_kbm_terakhir" autocomplete="off">
                          <option value="">Belum pernah KBM di LPQ</option>
                          @for ($i=intval(date('Y')); $i>=2011; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="control-group">Terakhir KBM semester</label>
                      <select class="form-control" name="semester_kbm_terakhir" autocomplete="off">
                        <option value="">Belum pernah KBM di LPQ</option>
      									<option value="1">Ganjil (September&ndash;Januari)</option>
      									<option value="0">Genap (Februari&ndash;Juni)</option>
      								</select>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="control-group">Jenjang</label>
                      <select class="form-control" name="jenjang">
                        @foreach ($daftar_jenjang as $jenjang)
                          <option value="{{ $jenjang->id }}">{{ $jenjang->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-success">Tambah</button>
                </div>
              </div>
          </form>
          </div>
  </div>
  @foreach ($daftar_jenis_program as $jenis_program)
        <select id="sl{{ $jenis_program->id }}">
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
        <select id="jj{{ $jenis_program->id}}">
          @foreach ($jenis_program->daftar_jenjang as $jenjang)
            <option value="{{ $jenjang->id }}">{{ $jenjang->nama }}</option>
          @endforeach
        </select>
    @endforeach

  <script>
    $.ajaxSetup({
        type:"post",
        cache:false,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $(document).ajaxStart(function ()
    {
        $('html, body, button').css("cursor", "wait");
    }).ajaxComplete(function () {
        $('html, body').css("cursor", "auto");
        $('button').css("cursor", "pointer");
    });

    $.fn.dataTable.Api.register( 'column().title()', function () {
        var colheader = this.header();
        return $(colheader).text().trim();
    } );

      var myTable = $('#dataTable').DataTable({
        "columnDefs": [
          {
             "searchable": false,
             "orderable": false,
             "targets": [0,-1]
          }],
        "order": [[3, 'asc'], [4, 'asc'], [5, 'asc'], [ 1, 'asc' ]],
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "language": {
         "sProcessing":   "Sedang proses...",
         "sLengthMenu":   "_MENU_ entri per halaman",
         "sZeroRecords":  "Data tidak ditemukan",
         "sInfo":         "Menampilkan _START_&ndash;_END_ dari _TOTAL_ entri",
         "sInfoEmpty":    "Menampilkan 0&ndash;0 dari 0 entri",
         "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
         "sInfoPostFix":  "",
         "sSearch":       "Cari:",
         "sUrl":          "",
         "oPaginate": {
             "sFirst":    "&laquo;",
             "sPrevious": "&lt;",
             "sNext":     "&gt;",
             "sLast":     "&raquo;"
         },
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
        "drawCallback": function () {
            this.api().columns([3,4,5,6]).every( function () {
                var column = this;
                var select = $('<select><option value="">'+column.title()+'</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
                column.data().unique().sort().each( function ( d, j ) {
                    if(column.search() === '^'+$.fn.dataTable.util.escapeRegex(d)+'$'){
                        select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                    } else {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    }
                } );
                var exists = false;
                $('option', select).each(function(){
                    if ('^'+$.fn.dataTable.util.escapeRegex(this.value)+'$' == column.search() || column.search() == '') {
                        exists = true;
                        return false;
                    }
                });
                if(!exists) column.search('').draw();
            } );
        }
      });
      myTable.on( 'order.dt search.dt', function () {
          myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw();

    $('[id^=sl], [id^=kt], [id^=jj]').hide();
    $('#modal-edit').on('hidden.bs.modal', function () {
      $('#sudah_lulus > option').remove();
      //$('#tahun_kbm_terakhir > option').remove();
      $('#jenjang > option').remove();
      $('#id_kelompok > option').remove();
      $('#id_santri').val('');
    });
    var id_santri, program;
    var hari = [null, 'Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    function edit(pointer) {
      tr = $(pointer).parent().parent();
      id_santri = tr.attr('data-id-santri');
      program = tr.attr('data-program');
      nama = $('td', tr).eq(1).text();
      nomor_identitas = $('td', tr).eq(2).text();
      $.ajax({
            data: {'id_santri': id_santri},
            dataType: 'json',
            url: '{{ url('admin/santri/santri') }}',
            success: function(data){
              $('#modal-edit .santri').text(nama+' '+nomor_identitas);
              $('#sl'+program+' > option').clone().appendTo('#sudah_lulus');
              //$('#kt'+program+' > option').clone().appendTo('#tahun_kbm_terakhir');
              $('#jj'+program+' > option').clone().appendTo('#jenjang');
              $('#id_kelompok').append('<option value="">Belum ditentukan</option>');
              for(var i in data['jadwal']) {
                $('#id_kelompok').append('<option value="'+data['jadwal'][i]['id_k']+'"'+((data['id_kelompok'] == data['jadwal'][i]['id_k']) ? ' selected' : '')+'>'+hari[data['jadwal'][i]['hari']]+' '+data['jadwal'][i]['waktu'].slice(0,-3)+' -- Kelompok '+data['jadwal'][i]['id_k']+': '+data['jadwal'][i]['nama_lengkap']+' (sisa '+(data['jadwal'][i]['sisa'])+')</option>');
              }
              $('#id_santri').val(id_santri);
              if(data['id_jenjang_lulus']) $('#sudah_lulus').val(data['id_jenjang_lulus']).change();
              $('#tahun_kbm_terakhir').val(data['tahun_kbm_terakhir']).change();
              $('#semester_kbm_terakhir').val(data['semester_kbm_terakhir']).change();
              $('#jenjang').val(data['id_jenjang']).change();
              /*$('#jenjang').on('change', function(){
                $('#id_kelompok > option').not(':first-child').remove();
              });*/
              $('#modal-edit').modal('show');
            },
            error: function(data){
              alert('error');
            }
      });
    }

    /*function kelompok() {
      $.ajax({
          data: {
            id_santri: $('#id_santri').val(),
          },
          url: '{{ url('admin/santri/kelompok') }}',
          success: function(data){
              $('option', '#id_kelompok').remove();
              $('#id_kelompok').append('<option value="">Belum ditentukan</option>');
              console.log(data['jadwal']);
              for(var i in data['jadwal']) {
                $('#id_kelompok').append('<option value="'+data['jadwal'][i]['id_k']+'"'+((data['id_k'] == data['jadwal'][i]['id_k']) ? ' selected' : '')+'>'+hari[data['jadwal'][i]['hari']]+' '+data['jadwal'][i]['waktu'].slice(0,-3)+' -- Kelompok '+data['jadwal'][i]['id_k']+': '+data['jadwal'][i]['nama_lengkap']+' (sisa '+(data['jadwal'][i]['sisa'])+')</option>');
              }
          },
          error: function() {
            alert('gagal');
            $('#modal-edit').modal('hide');
          }
        });
    }*/

    function simpan() {
      $.ajax({
          data: {
            id_santri: $('#id_santri').val(),
            sudah_lulus: $('#sudah_lulus').val(),
            tahun_kbm_terakhir: $('#tahun_kbm_terakhir').val(),
            semester_kbm_terakhir: $('#semester_kbm_terakhir').val(),
            jenjang: $('#jenjang').val(),
            id_kelompok: $('#id_kelompok').val()
          },
          url: '{{ url('admin/santri/edit') }}',
          success: function(){
            alert('berhasil');
            $('td', tr).eq(5).html($('#jenjang > option:selected').text());
            $('td', tr).eq(6).html($('#id_kelompok').val());
            myTable.row(tr).invalidate().draw(false);
            $('#modal-edit').modal('hide');
          },
          error: function() {
            alert('gagal');
          }
        });
    }

  </script>

@stop

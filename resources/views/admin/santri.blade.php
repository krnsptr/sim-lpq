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
      </div>
      <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="dataTable" style="white-space: nowrap;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Lengkap</th>
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
              <td>Jenis Kelamin</td>
              <td>Program</td>
              <td>Jenjang</td>
              <td>Kelompok</td>
              <td></td>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($daftar_santri as $santri)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$santri->pengguna->nama_lengkap}}</td>
              <td>@if($santri->pengguna->jenis_kelamin){{"laki-laki"}}
                @else {{"perempuan"}}
                @endif </td>
              <td>{{$santri->jenjang->Jenis_program->nama}}</td>
              <td>{{$santri->jenjang->nama}}</td>
              <td></td>
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

  <div class="modal fade" id="modal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Program</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id_santri" value="" />
                  <div class="form-group col-md-12">
                    <label class="control-group">Sudah lulus</label>
                    <select class="form-control" id="sudah_lulus">

                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label class="control-group">Terakhir KBM tahun</label>
                    <select class="form-control" id="kbm_tahun">

                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label class="control-group">Terakhir KBM semester</label>
                    <select class="form-control" id="kbm_semester">
                      <option value="0">Belum pernah KBM di LPQ</option>
                      <option value="1">Ganjil (September&ndash;Januari)</option>
                      <option value="2">Genap (Februari&ndash;Juni)</option>
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


  <script>
    /**$.ajaxSetup({
        type:"post",
        cache:false,
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
        "order": [[2, 'asc'], [3, 'desc'], [ 1, 'asc' ]],
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
            this.api().columns([2,3,4, 5]).every( function () {
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
    $('#modal').on('hidden.bs.modal', function () {
      $('#sudah_lulus > option').remove();
      $('#kbm_tahun > option').remove();
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
      $.ajax({
            data: {'id_santri': id_santri},
            dataType: 'json',
            url: '',
            success: function(data){
              $('#sl'+program+' > option').clone().appendTo('#sudah_lulus');
              $('#kt'+program+' > option').clone().appendTo('#kbm_tahun');
              $('#jj'+program+' > option').clone().appendTo('#jenjang');
              $('#id_kelompok').append('<option value="">Belum ditentukan</option>');
              for(var i in data['jadwal']) {
                $('#id_kelompok').append('<option value="'+data['jadwal'][i]['id_kelompok']+'"'+((data['id_kelompok'] == data['jadwal'][i]['id_kelompok']) ? ' selected' : '')+'>'+hari[data['jadwal'][i]['hari']]+' '+data['jadwal'][i]['waktu'].slice(0,-3)+' -- Kelompok '+data['jadwal'][i]['id_kelompok']+': '+data['jadwal'][i]['nama_lengkap']+' (sisa '+(10-data['jadwal'][i]['jumlah_santri'])+')</option>');
              }
              $('#id_santri').val(id_santri);
              $('#sudah_lulus').val(data['sudah_lulus']).change();
              $('#kbm_tahun').val(data['kbm_tahun']).change();
              $('#kbm_semester').val(data['kbm_semester']).change();
              $('#jenjang').val(data['jenjang']).change();
              $('#modal').modal('show');
            },
            error: function(data){
              alert('error');
            }
      });
    }

    function simpan() {
      $.ajax({
          data: {
            id_santri: $('#id_santri').val(),
            sudah_lulus: $('#sudah_lulus').val(),
            kbm_tahun: $('#kbm_tahun').val(),
            kbm_semester: $('#kbm_semester').val(),
            jenjang: $('#jenjang').val(),
            id_kelompok: $('#id_kelompok').val()
          },
          url: '',
          success: function(){
            alert('berhasil');
            $('td', tr).eq(4).html($('#jenjang > option:selected').text());
            $('td', tr).eq(5).html($('#id_kelompok').val());
            myTable.row(tr).invalidate().draw(false);
            $('#modal').modal('hide');
          },
          error: function() {
            alert('gagal');
          }
        });
    }

  </script>

@stop

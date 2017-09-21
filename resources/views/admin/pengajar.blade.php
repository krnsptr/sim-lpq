@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengajar
      <small>Pengelolaan program dan jadwal pengajar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
      <li><a href="">Admin</a></li>
      <li class="active">Pengajar</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Pengajar</h3>
        <a href="{{ url('admin/pengajar.xlsx') }}" class="btn btn-success pull-right">
          <i class="fa fa-download"></i>&ensp;
          Download Excel
        </a>
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
              <td></td>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($daftar_pengajar as $pengajar)
            <tr data-id-pengajar="{{ $pengajar->id }}" data-program="{{ $pengajar->jenjang->jenis_program->id }}">
              <td>{{$loop->iteration}}</td>
              <td>{{ $pengajar->pengguna->nama_lengkap}}</td>
              <td>{{$pengajar->pengguna->nomor_identitas}}</td>
              <td>@if($pengajar->pengguna->jenis_kelamin) Laki-laki @else Perempuan @endif</td>
              <td>{{ $pengajar->jenjang->jenis_program->nama}}</td>
              <td>{{ $pengajar->jenjang->nama}}</td>
              <td>
                <button class="btn btn-sm btn-primary edit" onclick="edit_program(this);">Edit Program</button>
                <button class="btn btn-sm btn-primary edit" onclick="edit_jadwal(this);">Edit Jadwal</button>
                <!--button class="btn btn-sm btn-danger hapus" onclick="hapus_program(this)">Hapus Program</button-->
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

  <div class="modal fade" id="modal-program" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Program</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group col-md-12 pengajar"></div>
                  <input type="hidden" id="id_pengajar" value="" />
                  <div class="form-group col-md-12">
                    <label class="control-group">Pendaftaran</label>
                    <select class="form-control" id="pendaftaran">
    									<option value="0">Pendaftaran baru</option>
    									<option value="1">Pendaftaran ulang</option>
    								</select><br />
                  </div>
                  <div class="form-group col-md-12 hidden" id="memenuhi_syarat">
                    <label class="control-group">Memenuhi Syarat</label><br />
                    <input type="checkbox" id="memenuhi_syarat0" value="1"> Lulus Tahsin 2<br />
    								<input type="checkbox" id="memenuhi_syarat1" value="1"> Lulus Dauroh Syahadah<br />
    								<input type="checkbox" id="memenuhi_syarat2" value="1"> Berkompetensi mengajar<br />
                  </div>
                  <div class="form-group col-md-12">
                    <label class="control-group">Motivasi mengajar</label>
                    <textarea class="form-control" id="motivasi_mengajar"></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label class="control-group">Jenjang</label>
                    <select class="form-control" id="jenjang">

                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="simpan_program();">Simpan</button>
              </div>
            </div>

          </div>
  </div>
  <div class="modal fade" id="modal-jadwal" role="dialog">
          <div class="modal-dialog" style="width:70%">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Jadwal</h4>
              </div>
              <div class="modal-body table-condensed">
                <div class="form-group col-md-12 pengajar"></div>
                <input type="hidden" id="id_pengajar">
                <input type="hidden" id="jenjang">
                <div class="form-group col-md-4">
                  <label class="control-group col-md-12"> Jumlah kelompok yang siap dibina</label>
                  <div class="col-md-6">
                    <div class="form-group has-feedback">
                      <input type="number" class="form-control" id="kapasitas_membina" value="">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <a onclick="kapasitas_membina()" class="btn btn-primary btn-flat">Ubah</a>
                  </div>
                </div>
                <div class="form-group col-md-8">
                  <label class="control-group col-md-12"> Tambah alternatif (durasi 2 jam)</label>
                  <div class="col-md-8">
                    <div class="form-group has-feedback">
                      <div class="col-md-6">
                      <select id="hari" class="form-control" autocomplete="off">
                        @for ($i=1; $i<=7; $i++)
                          <option value="{{ $i }}">{{ $hari[$i] }}</option>
                        @endfor
                      </select>
                      </div>
                      <div class="col-md-6">
                      <input type="text" id="waktu" class="form-control" value="00:00" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <a onclick="tambah_jadwal()" class="btn btn-success btn-flat">Tambah</a>
                  </div>
                </div>
                <table class="table" id="tabel-jadwal">

                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              </div>
            </div>

          </div>
  </div>

  @foreach ($daftar_jenis_program as $jenis_program)
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
        "order": [[3, 'asc'], [4, 'desc'], [ 1, 'asc' ]],
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
            this.api().columns([3,4,5]).every( function () {
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

    $('[id^=jj]').hide();
    $('#modal-program').on('hidden.bs.modal', function () {
      $('#jenjang > option').remove();
      $('#id_pengajar').val('');
      $('#memenuhi_syarat').addClass('hidden');
      $('#memenuhi_syarat > input').prop('checked', false);
    });
    $('#modal-jadwal').on('hidden.bs.modal', function () {
      $('#id_pengajar').val('');
      $('#kapasitas_membina').val('');
      $('#program').val('');
      $('#jenjang').val('');
      $('#tabel-jadwal tr').remove();
    });

    var tr, id_pengajar, program;

    function edit_program(pointer) {
      tr = $(pointer).parent().parent();
      id_pengajar = tr.attr('data-id-pengajar');
      program = tr.attr('data-program');
      nama = $('td', tr).eq(1).text();
      nomor_identitas = $('td', tr).eq(2).text();
      if(program == 1) $('#memenuhi_syarat').removeClass('hidden');
      $('#jj'+program+' > option').clone().appendTo('#jenjang');
      $.ajax({
            data: {'id_pengajar': id_pengajar},
            dataType: 'json',
            url: '{{ url('admin/pengajar/pengajar') }}',
            success: function(data){
              $('#modal-program .pengajar').text(nama+' '+nomor_identitas);
              $('#id_pengajar').val(id_pengajar);
              $('#pendaftaran').val(data['pendaftaran']).change();
              for(i=0; i<3; i++) {
                if(data['memenuhi_syarat'][i] == 1) $('#memenuhi_syarat'+i).prop('checked', true);
              }
              $('#motivasi_mengajar').val(data['motivasi_mengajar']);
              $('#jenjang').val(data['id_jenjang']).change();
              $('#modal-program').modal('show');
            },
            error: function(data){
              alert('error');
            }
      });
    }

    function simpan_program() {
      $.ajax({
          data: {
            id_pengajar: $('#id_pengajar').val(),
            jenjang: $('#jenjang').val(),
            pendaftaran: $('#pendaftaran').val(),
            memenuhi_syarat: [
              $('#memenuhi_syarat0').prop('checked') ? 1 : null,
              $('#memenuhi_syarat1').prop('checked') ? 1 : null,
              $('#memenuhi_syarat2').prop('checked') ? 1 : null
            ],
            motivasi_mengajar: $('#motivasi_mengajar').val()
          },
          url: '{{ url('admin/pengajar/edit') }}',
          success: function(){
            alert('berhasil');
            $('td', tr).eq(5).html($('#jenjang > option:selected').text());
            myTable.row(tr).invalidate().draw(false);
            $('#modal-program').modal('hide');
          },
          error: function() {
            alert('gagal');
          }
        });
    }

    function hapus_program(pointer){
      var tr = $(pointer).parent().parent();
      var button = pointer;
      if(confirm('Anda yakin?')) {
        $.ajax({
            data: {id_pengajar: tr.attr('data-id-pengajar')},
            url: '{{ url('admin/pengajar/hapus') }}',
            success: function(){
              alert('berhasil');
              myTable.row(tr).remove().draw();
            },
            error: function(){
              alert('gagal');
            }
          });
        }
    }

    function edit_jadwal(pointer) {
      tr = $(pointer).parent().parent();
      id_pengajar = tr.attr('data-id-pengajar');
      jenjang = tr.attr('data-id-jenjang');
      program = tr.attr('data-program');
      nama = $('td', tr).eq(1).text();
      nomor_identitas = $('td', tr).eq(2).text();
      $.ajax({
            data: {'id_pengajar': id_pengajar},
            dataType: 'json',
            url: '{{ url('admin/kelompok/jadwal') }}',
            success: function(data){
              $('#modal-jadwal .pengajar').text(nama+' '+nomor_identitas);
              $('#id_pengajar').val(id_pengajar);
              $('#program').val(program);
              $('#jenjang').val(jenjang);
              $('#kapasitas_membina').val(data['kapasitas_membina'])
              $('#tabel-jadwal').append('<tr><th>Alternatif (Jadwal kosong)</th><th>Aksi</th></tr>');
              for(var i in data['daftar_jadwal']) {
                $('#tabel-jadwal').append('<tr data-id-jadwal="'+data['daftar_jadwal'][i]['id']+'" data-id-kelompok="'+data['daftar_jadwal'][i]['kelompok']+'"><td></td><td><button class="btn btn-sm btn-success tambah-kelompok" onclick="tambah_kelompok(this);">Tambah ke Kelompok</button> <button class="btn btn-sm btn-warning hapus-kelompok hidden" onclick="hapus_kelompok(this);">Hapus dari Kelompok</button> <button class="btn btn-sm btn-primary" onclick="ubah_jadwal(this);">Ubah</button> <button class="btn btn-sm btn-danger" onclick="hapus_jadwal(this);">Hapus</button></td></tr>');
                var tr = $('#tabel-jadwal tr:last');
                $('#hari').clone().removeAttr('id').attr('class', 'hari').val(data['daftar_jadwal'][i]['hari']).appendTo('#tabel-jadwal tr:last td:first');
                $('#waktu').clone().removeAttr('id').attr('class', 'waktu').val(data['daftar_jadwal'][i]['waktu']).change().appendTo('#tabel-jadwal tr:last td:first');
                $('#jj'+program).clone().removeAttr('id').show().attr('class', 'jenjang-kelompok').appendTo('#tabel-jadwal tr:last td:first');
                if(data['daftar_jadwal'][i]['kelompok'] !== null) {
                  $('.tambah-kelompok, .hapus-kelompok', tr).toggleClass('hidden');
                  $('.jenjang-kelompok', tr).val(data['daftar_jadwal'][i]['kelompok']['id_jenjang']).change();
                  $('.jenjang-kelompok', tr).attr('disabled', 'disabled');
                }
                else {
                  $('.jenjang-kelompok', tr).val(data['id_jenjang']).change();
                }
              }
              $('#modal-jadwal').modal('show');
            },
            error: function(){
              alert('error');
            }
      });
    }

    function kapasitas_membina() {
      var kapasitas_membina = $('#kapasitas_membina').val();
      $.ajax({
            data: {'id_pengajar': id_pengajar, 'kapasitas_membina' : kapasitas_membina},
            url: '{{ url('admin/kelompok/jadwal/kapasitas-membina') }}',
            success: function(){
              alert('berhasil');
            },
            error: function(){
              alert('error');
              $('#modal-jadwal').modal('hide');
            }
      });
    }

    function tambah_jadwal(pointer) {
      var hari = $('#hari').val();
      var waktu = $('#waktu').val();
      $.ajax({
            data: {'id_pengajar': id_pengajar, 'hari': hari, 'waktu': waktu},
            url: '{{ url('admin/kelompok/jadwal/tambah') }}',
            success: function(){
              alert('berhasil');
              $('#modal-jadwal').modal('hide');
            },
            error: function(){
              alert('error');
            }
      });
    }

    function ubah_jadwal(pointer) {
      var tr = $(pointer).parent().parent();
      var id_jadwal = tr.attr('data-id-jadwal');
      var hari = $('.hari', tr).val();
      var waktu = $('.waktu', tr).val();
      $.ajax({
            data: {'id_jadwal' : id_jadwal, 'hari': hari, 'waktu': waktu},
            url: '{{ url('admin/kelompok/jadwal/edit') }}',
            success: function(){
              alert('berhasil');
            },
            error: function(){
              alert('error');
              $('#modal-jadwal').modal('hide');
            }
      });
    }

    function hapus_jadwal(pointer) {
      var tr = $(pointer).parent().parent();
      var id_jadwal = tr.attr('data-id-jadwal');
      if(confirm('Anda yakin?')) $.ajax({
            data: {'id_jadwal' : id_jadwal},
            url: '{{ url('admin/kelompok/jadwal/hapus') }}',
            success: function(){
              alert('berhasil');
              tr.remove();
            },
            error: function(){
              alert('error');
            }
      });
    }

    function tambah_kelompok(pointer) {
      var tr = $(pointer).parent().parent();
      var id_jadwal = tr.attr('data-id-jadwal');
      jenjang = $('.jenjang-kelompok', tr).val();
      $.ajax({
            data: {'id_jadwal' : id_jadwal, 'jenjang': jenjang},
            url: '{{ url('admin/kelompok/tambah') }}',
            success: function(){
              alert('berhasil');
              $('.tambah-kelompok, .hapus-kelompok', tr).toggleClass('hidden');
              $('.jenjang-kelompok', tr).attr('disabled', 'disabled');
            },
            error: function(){
              alert('error');
            }
      });
    }

    function hapus_kelompok(pointer) {
      var tr = $(pointer).parent().parent();
      var id_jadwal = tr.attr('data-id-jadwal');
      if(confirm('Anda yakin?')) $.ajax({
            data: {'id_jadwal' : id_jadwal},
            url: '{{ url('admin/kelompok/hapus') }}',
            success: function(){
              alert('berhasil');
              $('.tambah-kelompok, .hapus-kelompok', tr).toggleClass('hidden');
              $('.jenjang-kelompok', tr).removeAttr('disabled');
            },
            error: function(){
              alert('error');
            }
      });
    }
  </script>
</div>
@stop

@extends('user2.honor.base') @section('action-content')
<!-- Main content -->
@if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
      </div>
    @endif
    
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="box-title">Buat Laporan Honor dari Form</h3>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6"></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="#">
                            <input type="hidden" name="_method" value="POST">
                            {{ csrf_field() }} 

                            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label for="nama" class="col-md-2 control-label">Nama Kegiatan</label>

                                <div class="col-md-4">
                                    <input id="nama" type="text" class="form-control" name="nama" value="{{$lap_honors->kegiatan->nama_kegiatan}}" required readonly>
                                    @if ($errors->has('nama'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
                                <label for="tanggal" class="col-md-2 control-label">Tanggal Kegiatan</label>

                                <div class="col-md-4">
                                    <input id="tanggal" type="text" class="form-control" name="tanggal" value="{{ \Carbon\Carbon::parse($lap_honors->kegiatan->tgl_pelaksanaan)->format('d/m/Y')}}" required readonly> 
                                    @if ($errors->has('tanggal'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tanggal') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tempat') ? ' has-error' : '' }}">
                                <label for="tempat" class="col-md-2 control-label">Tempat Kegiatan</label>

                                <div class="col-md-4">
                                    <input id="tempat" type="text" class="form-control" name="tempat" value="{{$lap_honors->kegiatan->tempat}}" required readonly>
                                    @if ($errors->has('tempat'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tempat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                                <div class="form-group{{ $errors->has('creator') ? ' has-error' : '' }}">
                                        <label for="creator" class="col-md-2 control-label">Pembuat Laporan</label>
                                        <div class="col-md-4">
                                            <input id="creator" type="text" class="form-control" name="creator" value={{Auth::user()->fullname}} required readonly> 
                                            @if ($errors->has('creator'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('creator') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                            <h1 class="box-title">
                                    <strong>Daftar Panitia Kegiatan</strong>
                            </h1>
                     </div>
                </div>
            </div>
        </div>
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap" style="padding-right: 10px;margin-left: 10px">
            <div class="row">
                <div id="container-fluid" class="col-sm-12">    
                        <form  class="form-horizontal" id="formTambah" role="form" method="POST">
                            <input type="hidden" name="_method" value="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <table id="tablePanitia" class="table table-bordered table-striped table-hover" role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th width="2%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="no: activate to sort column ascending">
                                    <center>No</center>
                                </th>
                                <th width="18%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="nama: activate to sort column ascending">
                                    <center>Nama Panitia</center>
                                </th>
                                <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="jabatan: activate to sort column ascending">
                                    <center>Jabatan Kepanitian</center>
                                </th>
                                <th width="8%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="honor: activate to sort column ascending">
                                    <center>Honorium</center>
                                </th>
                                <th width="8%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="pajak: activate to sort column ascending">
                                    <center>Pajak</center>
                                </th>
                                <th width="8%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="total: activate to sort column ascending">
                                    <center>Total</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($list_jabatans as  $list_jabatan)

                                <tr role="row" class="odd">
                                    <td><center>{{++$number}}</center></td>
                                    <td>{{$list_jabatan->namaDosen() }}</td>
                                    <td><center>{{$list_jabatan->jabatan->nama_jabatan}}</center></td>
                                    <td>
                                        <div class="form-group{{ $errors->has('honor') ? ' has-error' : '' }}">
                                            <div class="col-md-6">
                                                <input id="honor" step="0.01" type="number" class="form-control honor" name="honor-{{$list_jabatan->id}}" value="{{ old('honor') }}" required >
                                                 @if ($errors->has('honor'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('honor') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group{{ $errors->has('pajak') ? ' has-error' : '' }}">
                                            <div class="col-md-6">
                                                <input id="pajak" step="0.01" type="number" class="form-control pajak" name="pajak-{{$list_jabatan->id}}" value="{{ old('pajak') }}" required>
                                                 @if ($errors->has('pajak'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('pajak') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                                            <div class="col-md-6">
                                                <input id="total" step="0.01" type="number" class="form-control total" name="total-{{$list_jabatan->id}}" value="{{ old('total') }}" required readonly> 
                                                @if ($errors->has('total'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('total') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>  
                                </tr>
                                @endforeach
                            </table> 
                            <!-- Pagination -->
                            <div class="row" style="padding-left: 5px">
                                <div class="col-sm-5">
                                     <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Menampilkan 1 sampai {{count($list_jabatans)}} dari {{count($list_jabatans)}} data yang ada</div>
                                </div>
                                <div class="col-sm-7">
                                     <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        {{ $list_jabatans->links() }}
                                     </div>
                                 </div>
                            </div>

                         <div class="row" style="padding-left: 5px">
                            <div class="form-group pull-right" style="margin-bottom: 10px">
                                <div class="col-md-10"></div>
                                    <div class="col-md-3">
                                        <a onclick="tambahHonor()" id="btnTambah" data-id="{{$lap_honors->id}}" class="btn btn-primary btn-md-5 btn-sm-5">
                                            Simpan
                                        </a>
                                    </div>
                                </div>
                         </div>
                        </form>   
                </div>
            </div>
        </div>             
    </div>  
</section>
@include('user2/honor/tambahisi')
@endsection



@push('js')
<script>
    $('.honor, .pajak').each(function() {
        $(this).on('keyup', function() {
            var tr = $(this).parent().closest('tr');
                var honor = tr.find('.honor');
                var pajak = tr.find('.pajak');
                var total = tr.find('.total');

            // total = honor - (honor * pajak)
            total.val( 
                honor.val() - (honor.val() * pajak.val())
            );
        });
    });

    function tambahHonor(){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var inputData = $('#formTambah').serialize();
        var dataId = $('#btnTambah').attr('data-id');
        var parent = $(this).parent();
        swal({
            title: 'Mengirim Laporan Honor',
            text: "Anda yakin laporan sudah benar?",
              type: 'question',
            showCancelButton: true,
            cancelButtonColor: '#FFA000',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: "Belum, Batalkan!",
        }).then(function () {
            $.ajax({
              url: '{{ url('/honor/honordosen') }}' + '/' + dataId + '/'+'store',
              type: 'POST',
              data: inputData,
                success : function(data) {
                    swal({
                        title: 'Sukses!',
                        text: 'Laporan Honor Tersimpan',
                        type: 'success',
                        timer: '15000'
                      
                    })
                    setTimeout(function(){
                        window.location="http://localhost/project/public/honor/honordosen"; 
                      }, 1800);
                },
                error : function () {
                    swal({
                        title: 'Oops...',
                        type: 'error',
                        timer: '1500'
                    })
                }
            });
        });
    }

</script>
@endpush





@extends('user2/honor/base') 
@section('action-content')
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="box-title">Perbaharui Laporan Honor</h3>
                </div>
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="#">
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
                                        <input id="creator" type="text" class="form-control" name="creator" value="{{$lap_honors->pembuat->fullname}}" required readonly> 
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
                                <h2 class="box-title">
                                    <strong>Daftar Panitia</strong>
                                </h2>
                             </div>
                    <div class="row">
                        <div class="col-md-6">
                        
                         @if(!$lap_honors->statuslaporan)
                         <div class="row">
                            <div class="col-sm-7 float-left">
                                <a class="btn btn-warning col-sm-3 col-xs-5 col-md-6 btn-margin pull-left" onclick="panitiaEdit({{$lap_honors->id}})">
                                    <i class="fa fa-pencil-square-o"></i> 
                                    Tambah Panitia</a>
                            </div>       
                        </div>
                        @endif
                        </div>
                            <div class="col-md-6">
                                 <?php if( $lap_honors->statuslaporan == '0') { ?>
                                    <a href="{{route('honor.complete',$lap_honors->id)}}" class="btn btn-success col-sm-6 col-xs-5 col-md-5 btn-margin pull-right" style="height: 35px;font-size: 17px;">
                                       <i class="fa fa-check"> Konfirmasi Laporan Lengkap</i></a>
                                 <?php }else{ ?>
                                    <a href="{{route('honor.pdf',$lap_honors->id)}}" class="btn btn-danger  col-sm-6 col-xs-5 col-md-5 btn-margin pull-right" style="height: 35px;font-size: 17px;">
                                        <i class="fa fa-download"> Unduh PDF</i></a>
                                    <?php } ?>
                            </div> 
                        </div>
                    </div>
             </div>
        

            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap" style="padding-right: 10px;margin-left: 10px">
                    <div class="row">
                      <div class="col-sm-12" >
                        <form class="form-horizontal" id="editHonor" role="form" method="post">
                            {{ method_field('PUT') }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <table class="table table-bordered table-striped table-hover dataTables" role="grid" aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th width="2%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="no: activate to sort column ascending"><center>No</center></th>
                                    <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="nama: activate to sort column ascending"><center>Nama Panitia</center></th>
                                    <th width="15%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="jabatan: activate to sort column ascending"><center>Jabatan Kepanitian</center></th>
                                    <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="honor: activate to sort column ascending"><center>Honorium</center></th>
                                    <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="pajak: activate to sort column ascending"><center>Pajak</center></th>
                                    <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="total: activate to sort column ascending"><center>Total</center></th>
                                @if(!$lap_honors->statuslaporan)
                                    <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="margin-left: 30px">Hapus</th>
                                @endif
                                </tr>
                            </thead>
                          <tbody>
                           
                            @foreach ($honors as $i => $honor)  
                                <tr role="row" class="odd">
                                    <td>
                                        {{ $i + 1 }}
                                        <input name="id[]" type="hidden" value="{{ $honor->id }}" />
                                    </td>

                                    <td>
                                        {{$honor->list_jabatan->namaDosen() }}
                                        <input name="list_jabatan_id[]" type="hidden" value="{{ $honor->list_jabatan->id }}" />
                                    </td>

                                    <td>
                                    {{$honor->list_jabatan->jabatan->nama_jabatan}}
                                    </td>
                                
                                    <td>
                                        <div class="form-group{{ $errors->has('honor') ? ' has-error' : '' }}">
                                          <div class="col-md-6">
                                              <input class="form-control honor" step="0.01" type="number" name="honor[]" value="{{$honor->honor}}" required>
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
                                                <input class="form-control pajak" id="pajak" step="0.01" type="number" name="pajak[]" value="{{$honor->pajak}}" required> 
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
                                                <input class="form-control total" id="total" readonly step="0.01" type="number" name="total[]" value="{{$honor->total}}" />
                                                 @if ($errors->has('total'))
                                                <span class="help-block">
                                                     <strong>{{ $errors->first('total') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                     </td>

                                     @if(!$lap_honors->statuslaporan)
                                     <td> 
                                        <!-- Delete-->
                                             <a class="btn btn-danger col-sm-7 col-xs-7 btn-margin" onclick="deleteHonor({{$honor->list_jabatan->id}})" role="button">
                                                <i class="fa fa-trash-o"></i>
                                             </a>
                                     </td>
                                     @endif
                                </tr>
                           @endforeach 
                        </table>
                                        <!-- Pagination -->
                                    <div class="row" style="padding-left: 5px">
                                        <div class="col-sm-5">
                                             <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Menampilkan 1 sampai {{count($honors)}} dari {{count($honors)}} data yang ada</div>
                                        </div>
                                        <div class="col-sm-7">
                                             <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                                {{ $honors->links() }}
                                             </div>
                                       </div>
                                    </div>
                                    @if(!$lap_honors->statuslaporan)
                                        <!-- Update -->
                                    <a id="editHonor" class="btn btn-primary col-md-1 col-sm-3 col-xs-5 btn-margin pull-right" onclick="editHonor({{$lap_honors->id}})">Simpan</a>
                                    @endif
                        </form> 
                      </div>
                    </div>
            </div>
                
</div>
</section>
@include('user2/honor/excel')
@include('user2/honor/tambahedit')
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

    function panitiaEdit(id){
        $('#modal-panitiaedit').modal('show');
        $('#modal-panitiaedit form')[0].reset();
    }

    function editHonor(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var inputData = $('#editHonor').serialize();
       // var dataId = $('#editHonor').attr('data-id');
        var parent = $(this).parent();
            $.ajax({
              url: '{{ url('/honor/honordosen') }}' + '/' + id,
              type: 'POST',
              data: inputData,
                success : function(data) {
                    swal({
                        title: 'Sukses!',
                        text: 'Data Panitia Diperbaharui',
                        type: 'success',
                        timer: '15000'  
                    })
                    setTimeout(function(){ location.reload(true); }, 1600);
                },
                error : function () {
                    swal({
                        title: 'Oops...',
                        text: 'Gagal Memperbaharui',
                        type: 'error',
                        timer: '1500'
                    })
                }
            });
    }
    function deleteHonor(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var parent = $(this).parent();
        swal({
            title: 'Anda Yakin Menghapus?',
            text: "Honor Panitia Akan Terhapus",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: "Tidak, Batalkan!",
        }).then(function () {
            $.ajax({
              url: '{{ url('/honor/honordosen') }}' + '/' + id + '/' + 'delete',
              type: 'GET',
              data : {'_method' : 'DELETE', '_token' : csrf_token},
                success : function(data) {
                    swal({
                        title: 'Sukses!',
                        text: 'Honor Terhapus',
                        type: 'success',
                        timer: '15000'
                    })
                    //table.reload();
                    //$('#tablePanitia').ajax.reload();
                    setTimeout(function(){ location.reload(true); }, 1600);
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
@extends('user2.honor.base') 
@section('action-content')
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
                    <h3 class="box-title">Buat Laporan Honor</h3>
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
                    <div class="col-sm-12">
                            <h2 class="box-title">
                                    <strong>Tambah Panitia</strong>
                            </h2>
                     </div><br>
                     <div class="row">
                        <div class="col-sm-6 ">
                            <a onclick="panitiaIsi({{$lap_honors->id}})" class="btn btn-warning col-sm-3 col-xs-5 col-md-4 btn-margin pull-left">
                                <i class="fa fa-pencil"></i> Tambah
                            </a>
                        </div>          
                    </div>
                    <center><h3><strong> Daftar Panitia Kegiatan</strong></h3></center>
                </div>
            </div>
        </div>
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap" style="padding-right: 10px;margin-left: 10px">
            <div class="row">
                <div class="col-sm-12">    
                        <form action="{{ url('honor/honordosen/'.$lap_honors->id.'/store') }}" class="form-horizontal" id="form_input" role="form" method="POST">
                            <input type="hidden" name="_method" value="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <center><table id="example2" class="table table-bordered table-striped table-hover dataTables" role="grid" style="width: 80%"aria-describedby="example2_info">
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
                                <th width="5%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"><center>Hapus</center></th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($list_jabatans as  $list_jabatan)

                                <tr role="row" class="odd">
                                    <td><center>{{++$number}}</center></td>
                                    <td>{{$list_jabatan->namaDosen() }}</td>
                                    <td><center>{{$list_jabatan->jabatan->nama_jabatan}}</center></td>
                                    <td> 
                                        <!-- Delete-->
                                        <a onclick="deleteDosen({{$list_jabatan->id}})" class="btn btn-danger col-md-5 col-sm-4 col-xs-6 btn-margin" style="margin-left: 30px">
                                            <i class="fa fa-trash-o"></i>    
                                        </a>

                                       
                                    </td>
                                </tr>
                                @endforeach
                            </table> </center>
                            <!-- Pagination -->
                            <center>
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
                            </center>
                        </form>   
                </div>
            </div>
        </div>     
           
        <div class="box-header">
            <div class="row">
                <center>
                     <div class="row">
                            <a class="btn btn-primary" onclick="isionline({{$lap_honors->id}})" style="width: 35%;height:45px;margin: 10px;font-size: 19px;">
                                <i class="fa fa-pencil-square-o"></i> 
                                    Isi Honor Online</a>  
                            <a class="btn btn-success" onclick="isioffline({{$lap_honors->id}})" style="width: 35%;height:45px;margin: 10px;font-size: 19px;">
                                <i class="fa fa-pencil-square-o"></i> 
                                    Isi Honor Offline Excel</a>
                        </div>
                 </center>
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

        function deleteDosen(id){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var parent = $(this).parent();
            swal({
                title: 'Anda yakin menghapus?',
                text: "Dosen akan terhapus dari panitia",
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: "Tidak, batalkan!",
            }).then(function () {
                $.ajax({
                  url: '{{ url('/honor/honordosen') }}' + '/' + id + '/' + 'delete',
                  type: 'GET',
                  data : {'_method' : 'DELETE', '_token' : csrf_token},
                    success : function(data) {
                        swal({
                            title: 'Sukses!',
                            text: 'Panitia Terhapus',
                            type: 'success',
                            timer: '15000'
                        })
                        //table.reload();
                        //$('#tablePanitia').ajax.reload();
                        setTimeout(function(){ location.reload(); }, 1600);
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

        function panitiaIsi(id){
            $('#modal-panitia').modal('show');
            $('#modal-panitia form')[0].reset();
        }

        function isionline(id){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var parent = $(this).parent();
            swal({
                title: 'Apakah Sudah Lengkap?',
                text: "Lengkapi Panitia sebelum mengisi Laporan Honor",
                type: 'question',
                showCancelButton: true,
                cancelButtonColor: '#F9A825',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Lengkap!',
                cancelButtonText: "Belum, Batalkan!",
            }).then(function () {
                window.location="http://localhost/project/public/honor/honordosen" + '/' + id + '/' + 'isionline'; 
            });
        }

        function isioffline(id){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var parent = $(this).parent();
            swal({
                title: 'Apakah Sudah Lengkap?',
                text: "Lengkapi panitia sebelum mengisi Laporan Honor dengan Excel",
                type: 'question',
                showCancelButton: true,
                cancelButtonColor: '#F9A825',
                confirmButtonColor: '#2E7D32',
                confirmButtonText: 'Ya, Lengkap!',
                cancelButtonText: "Belum, Batalkan!",
            }).then(function () {
                window.location="http://localhost/project/public/honor/honordosen" + '/' + id + '/' + 'isioffline'; 
            });
        }



</script>
@endpush





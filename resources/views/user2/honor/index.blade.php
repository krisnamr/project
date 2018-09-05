@extends('user2.honor.base')
@section('action-content')
@if (session('success'))
    <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        {{ session('success') }}
    </div>
@endif

<!-- Main content -->
<section class="content">
  <div class="box">
<div class="box-header">
<div class="row">
    <div class="col-sm-8">
      <h3 class="box-title">Daftar Laporan Honor</h3>
    </div>
</div>
</div>
<!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
  </div>

  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12" style="padding-right:20px;margin-right:13px;margin-left: 5px">
          <table id="example2" class="table table-bordered table-striped table-hover col-xs-5 dataTable" role="grid" aria-describedby="example2_info" style="padding-right:10px;margin-right:10px;margin-left: 10px;width:98%;">
            <thead>
              <tr role="row">
                <th width="2%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="no: activate to sort column ascending"><center>No</center></th>
                <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="nama: activate to sort column ascending"><center>Nama Kegiatan</center></th>
                <th width="5%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="tanggal: activate to sort column ascending"><center>Tanggal Kegiatan</center></th>
                <th width="5%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="tanggal: activate to sort column ascending"><center>Tempat Kegiatan</center></th>
                <th width="5%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending"><center>Status</center></th>
                <th width="2%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"><center>Isi/Lihat</center></th>
                <th width="2%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"><center>Hapus</center></th>
              </tr>
            </thead>
            <tbody>
                {{--  {{$kegiatans}}  --}}
                @foreach ($lap_honors as $lap_honor)
                    <tr role="row" class="odd">
                      <td><center>{{++$number}} </center></td>                  
                      <td><center>{{$lap_honor->kegiatan->nama_kegiatan}}</center></td>
                      <td><center>{{ \Carbon\Carbon::parse($lap_honor->kegiatan->tgl_pelaksanaan)->format('d/m/Y')}}</center></td>
                      <td><center>{{$lap_honor->kegiatan->tempat}}</center></td>
                      <td>
                        @if(!$lap_honor->statuslaporan)
                          <center>
                              <?php if( $lap_honor->statushonor == '0') { ?>
                                <label class="btn-primary btn-margin" style="font-family: Times New Roman">
                                  Belum Terisi
                                </label>
                            <?php }else{ ?>
                              <label class="btn-warning btn-margin" style="font-family: Times New Roman">
                                Terisi, Belum Selesai
                              </label>
                            <?php } ?>
                          </center>
                        @endif

                        <center>
                          <?php if( $lap_honor->statuslaporan == '0') { ?>
                            <label class="btn-warning btn-margin hide" style="font-family: Times New Roman">
                              Belum Selesai
                            </label>
                        <?php }else{ ?>
                          <label class="btn-success btn-margin" style="font-family: Times New Roman">
                            Selesai
                          </label>
                        <?php } ?>
                      </center>
                    </td>
                    <td>
                          @if(!$lap_honor->statuslaporan)
                          <center>
                              <?php if( $lap_honor->statushonor == '0') { ?>
                                <center> <a href="{{url('honor/honordosen/'.$lap_honor->id.'/create')}}" class="btn btn-primary  col-sm-6 col-xs-5 btn-margin">
                                  <i class="fa fa-pencil"></i>
                                </a></center>
                            <?php }else{ ?>
                              <center><a href="{{url('honor/honordosen/'.$lap_honor->id.'/edit')}}" class="btn btn-warning  col-sm-6 col-xs-5 btn-margin">
                                <i class="fa fa-pencil-square-o"></i>
                              </a></center>
                            <?php } ?>
                          </center>
                        @endif

                        <center>
                          <?php if( $lap_honor->statuslaporan == '0') { ?>
                            <center> <a class="btn btn-primary hide">
                              <i class="fa fa-pencil"></i>
                            </a></center>
                        <?php }else{ ?>
                          <center><a href="{{url('honor/honordosen/'.$lap_honor->id.'/edit')}}" class="btn btn-success  col-sm-6 col-xs-5 btn-margin">
                            <i class="fa fa-eye"></i>
                          </a></center>
                        <?php } ?>
                      </center>
                    </td>
    
                      <td>
                      <form class="row" id="formDeleteHonor" method="POST" style="padding-left: 2px;margin-left: 10px" >
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">         
                            <a class="btn btn-danger col-sm-5 col-xs-5 col-md-5 btn-margin" onclick="deleteHonor({{$lap_honor->id}})">
                                <i class="fa fa-trash-o"></i>
                            </a>
                          </form>
                     </td>
                  </tr>
                  @endforeach
                </tbody>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
  </div>
  </div>
</section>
@endsection

<script type="text/javascript">

  function deleteHonor(id){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var inputData = $('#formDeleteHonor').serialize();
    var parent = $(this).parent();
    swal({
        title: 'Anda yakin menghapus?',
        text: "Laporan Honor akan terhapus",
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: "Tidak, batalkan!",
    }).then(function () {
        $.ajax({
          url: '{{ url('/honor/honordosen') }}' + '/' + id,
          type: 'POST',
          data: inputData,
            success : function(data) {
                swal({
                    title: 'Sukses!',
                    text: 'Laporan Honor Terhapus',
                    type: 'success',
                    timer: '15000'
                })
               // $('#example2').DataTable().ajax.reload();
                setTimeout(function(){ location.reload(); }, 1800);
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

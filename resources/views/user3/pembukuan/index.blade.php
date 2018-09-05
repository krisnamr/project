@extends('user2.honor.base')
@section('action-content')

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
                <th width="5%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending"><center>Lihat</center></th>
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
                        <center>
                          <center><a href="#" class="btn btn-success  col-sm-6 col-xs-5 btn-margin">
                            <i class="fa fa-eye"></i>
                          </a></center>
                      </center>
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
{{--  {{url('honor/honordosen/'.$lap_honor->id.'/edit')}}  --}}



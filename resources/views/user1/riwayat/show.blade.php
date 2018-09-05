@extends('user1/riwayat/base')
@section('action-content')

    <section class="content">
      <div class="box"> 
            <form action="{{route('riwayat.search')}}" id="formPanitiaTambah" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="modal-header">
                         <h3 class="modal-title">Pencarian Riwayat Dosen</h3>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                                <label class="col-md-3 control-label" style="font-size: 18px">Cari Berdasarkan Nama: </label>
                            <div class="col-md-5">
                                <select class="form-control js-country select2" id="dosen" name="dosen_id" style="width: 420px;"></select>
                                <button id="btnPanitiaTambah" onclick="tambahPanitia()" class="btn btn-primary btn-save">Cari</button>
                            </div>
                        </div>
                    </div>
            </form>                     
        </div>

        <div class="box">
             <div class="box-body">
                    <div class="box-header">
                        <div class="panel panel-default">
                            <div class="panel-heading">      
                                <h4 style="font-style: italic">Hasil Pencarian Dosen:<strong> {{$namadosen->namaDosen()}} </strong></h4>   
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-striped table-hover" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr>
                                     <th width="2%" rowspan="1" colspan="1"><center>No</center></th> 
                                    <th width="20%" tabindex="0" rowspan="1" colspan="1"><center>Nama Kegiatan</center></th>
                                    <th width="15%" tabindex="0" rowspan="1" colspan="1"><center>Jabatan Kepanitiaan</center></th>
                                    <th width="10%" tabindex="0" rowspan="1" colspan="1"><center>Honorium</center></th>
                                    <th width="10%" tabindex="0"  rowspan="1" colspan="1"><center>Pajak</center></th>
                                    <th width="10%" rowspan="1" colspan="1"><center>Total</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riwayat->honor as $honor)
                                        <tr role="row" class="odd">
                                            <td><center>{{++$numbers}}</center></td>
                                            <td><center>{{$honor->nama_kegiatan}}</center></td>
                                            <td><center>{{$honor->jabatan}}</center></td>
                                            <td><center>{{$honor->honor}}</center></td>
                                            <td><center>{{$honor->pajak}}</center></td>
                                            <td><center>{{$honor->total,2,',','.'}}</center></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <table id="example2" class="table table-bordered table-striped table-hover" role="grid" aria-describedby="example2_info">
                                    <tr>
                                        <th width="30%" rowspan="1" colspan="3" style="font-size: 17px;">Total Pendapatan Bersih Pertahun</th>
                                        <th rowspan="1" colspan="3" style="font-size: 18px;"><center>Rp {{ $riwayat->getHonorTotalInRp() }}</center></th>  
                                    </tr>
                                    <tr>
                                        <th width="30%" rowspan="1" colspan="3" style="font-size: 17px;">Total Pajak yang dibayarkan Pertahun</th>
                                        <th rowspan="1" colspan="3" style="font-size: 18px;"><center>Rp {{ $riwayat->getPajakTotalInRp() }}</center></th>
                                    </tr>
                            </table>
                            <div class="col-md-6">
                                <a href="{{route('riwayat.pdf',$riwayat->dosen_id)}}" class="btn btn-danger  col-sm-6 col-xs-5 col-md-5 btn-margin" style="height: 35px;font-size: 17px;">
                                    <i class="fa fa-download"> Unduh PDF</i></a>
                            </div> 
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
      
        $(document).ready(function() {
            $('#dosen').select2({
            placeholder: 'Pilih nama dosen..',
            minimumInputLength: 2,  
            // tags: true,
            ajax: {
              type: 'GET',
              url: 'http://localhost:3001/api/showdata',
              dataType: 'json',
              delay: 250,
              processResults: function (res) {
                    console.log($('#dosen').val());
      
                return {
                  results:  $.map(res, function (item) {
                        return {
                            id: item.ID,
                            text: item.Nama
                        }
                    })
                };
              },
              cache: true
            }
          });
        });
</script>
@endpush

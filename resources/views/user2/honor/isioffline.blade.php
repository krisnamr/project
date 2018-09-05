@extends('user2.honor.base') @section('action-content')
@include('layouts_user/flash')
@include('flash::message')
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
                    <h3 class="box-title">Buat Laporan Honor dengan Excel</h3>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST">
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

                            {{--  <div class="form-group">
                                <button class="btn btn-submit" type="submit">Download to Excel</button>
                            </div>  --}}
                        </form>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                <div class="panel-body">
            <div>
            <div class="box-header">
                    <div class="row">
                       <div>
                           <h3>
                              <center> <strong>Pengisian Laporan Honor Panitia</strong></center>
                           </h3>
                         <center>  <h4>Langkah Pengisian Laporan Honor Panitia dengan Excel</h4> </center>
                       </div>
                   </div>
               </div>
            </div>

            <div class="box-header" style="margin:20px;">
            <div id="app">
                <template>
                        <center><form-wizard @on-complete="onComplete"
                                                color="#4527a0">
                           <tab-content title="Unduh Laporan Excel"
                                        icon="ti-import">
                            <form action="{{ route('honor.honor.export-excel', $lap_honors->id) }}" class="form-horizontal" role="form" method="POST">
                                <input type="hidden" name="_method" value="POST">
                                    {{ csrf_field() }} 
                                        <label>Unduh Laporan Honor disini</label>
                                            <div class="col-sm-12">
                                                 <button class="btn btn-success" type="submit" style="height: 40px;width: 20%;font-size:20px;">
                                                     <i class="ti ti-export"> Unduh Excel</i></button>
                                             </div>
                            </form>
                           </tab-content>

                           <tab-content title="Lengkapi Laporan"
                                        icon="ti-pencil-alt">
                            <center><h3 style="margin-left:30;height: 30;width: 50%"> Isi Excel pada bagain kolom <strong> Pajak  </strong> dan <strong> Honor </strong> saja!</h3> </center>
                           </tab-content>

                           <tab-content title="Unggah Laporan Excel"
                                        icon="ti-export">
                                        <label>Unggah Laporan Honor yang sudah diisi disini</label>
                                        <div class="col-sm-12">
                                            <a class="btn btn-success" onclick="eximForm()" style="height:40px;width: 20%;font-size:20px ">
                                                <i class="ti ti-import"></i> Unggah Excel
                                            </a>                        
                                        </div> 
                           </tab-content>
                       </form-wizard></center>
                      
                      </template>
                </div>
            </div>
                </div>
            </div>
            </div>
         
            {{--  <div class="row">
                <div class="col-sm-12">
                    <a class="btn btn-success col-md-4 col-sm-6 col-xs-6 btn-margin pull-right" style="height:6%;font-size:17px ">
                        <i class="fa fa-download"></i> 
                        Unduh Excel
                    </a>
                                           
                </div>          
            </div>  --}}
            
            {{--  <div class="row">
                <div class="col-sm-12">
                    <a class="btn btn-warning col-md-4 col-sm-6 col-xs-6 btn-margin pull-right" onclick="eximForm()" style="height:6%;font-size:17px ">
                        <i class="fa fa-download"></i> 
                        Unggah Excel
                    </a>                        
                </div>          
            </div>  --}}
        </div>            
    </div>  
</section>
@include('user2/honor/excel')
@include('user2/honor/tambahisi')
@endsection


@push('js')
<script>

    function eximForm(){
             $('#modal-exim').modal('show');
             $('#modal-exim form')[0].reset();
      }

      Vue.use(VueFormWizard)
        new Vue({
        el: '#app',
        methods: {
            onComplete: function(){
                alert('Yay. Done!');
                }
            }
        })
</script>
@endpush



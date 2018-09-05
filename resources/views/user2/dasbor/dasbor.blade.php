
@extends('user2.dasbor.base')
@section('action-content')
    <section class="content">
        <div class="box no-border">
            <div class="box-header">
              <div class="row">
                  <div class="col-sm-8">
                    <h4>Dasbor</h4>
                  </div>  
              </div>
            </div>
        </div>

        <div class="box no-border">
            <div class="box-header">
                <div class="box-body">
                    <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>{{$kegiatans}}</h3>
                                        <p>Jumlah Kegiatan</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-paper"></i>
                                    </div>
                                    <div class="small-box-footer">
                                        Laporan Honorium
                                    </div>
                                </div>
                             </div>
           
                            <div class="col-lg-3 col-xs-6">
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>{{$jumlahPanitia}}</h3>
                                        <p>Jumlah Panitia</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-person"></i>
                                    </div>
                                    <div class="small-box-footer">
                                        Laporan Honorium
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-xs-6">
                                    <div class="small-box bg-blue">
                                        <div class="inner">
                                            <h3>{{$laporanLengkap}}</h3>
                                            <p>Laporan Honor Lengkap</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-ios-paper-outline"></i>
                                        </div>
                                        <div class="small-box-footer">
                                            Laporan Honorium
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-xs-6">
                                        <div class="small-box bg-red">
                                            <div class="inner">
                                                <h3>{{$honorLengkap}}</h3>
                                                <p>Laporan Honor Belum Lengkap</p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-ios-plus-empty"></i>
                                            </div>
                                            <div class="small-box-footer">
                                                Laporan Honorium
                                            </div>
                                        </div>
                                    </div>
                        </div>
                </div>
            </div>
        </div>
</section>
@endsection
    
@section('das-foot')
    <div class="row">
        <footer id="dashboard-footer" class="clearfix">
            <div class="pull-right">
                Copyright &copy;2018 Universitas Gunadarma
            </div> 
        </footer>
    </div>
@endsection
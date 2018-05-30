@extends('admin.navbar')

@section('dasbor')
<section class="content-header dashbor">
    <h1 style="padding-bottom: 10px">
        Dashbor
        <small>Admin</small>
    </h1>
</section>


<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>150</h3>

                    <p>Jumlah Pengguna</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people"></i>
                </div>
                <a href="#" class="small-box-footer">Info Lengkap
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53
                       
                    </h3>

                    <p>Jumlah Laporan Kegiatan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-paper"></i>
                </div>
                <a href="#" class="small-box-footer">Info Lengkap
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>

                    <p>Jumlah Laporan Honor</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-calculator"></i>
                </div>
                <a href="#" class="small-box-footer">Info Lengkap
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>

                    <p>Jumlah Dosen</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-person"></i>
                </div>
                <a href="#" class="small-box-footer">Info Lengkap
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</section>
@endsection

@section('das-foot')
<div class="row">
    <footer id="dashboard-footer" class="clearfix">
        <div class="pull-right">
            Copyright &copy;2018 Universitas Gunadarma</div>
        
    </footer>
</div>
@endsection
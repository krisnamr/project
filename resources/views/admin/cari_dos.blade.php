@extends('admin.navbar')

@section('navbar')
<ul>
        <li class="link">
            <a href="{{route('admin.dasbor')}}">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                <span class="hidden-xs hidden-sm">Dasbor</span>
            </a>
        </li>

        <li class="link">
            <a href="">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <span class="hidden-xs hidden-sm">Daftar Pengguna</span>
                <span class="label label-success pull-right hidden-sm hidden-xs">10</span>
            </a>
        </li>

        <li class="link active">
            <a href="{{route('admin.dosen')}}">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                <span class="hidden-xs hidden-sm">Cari Dosen</span>
            </a>
        </li>

        <li class="link">
            <a href="{{route('admin.laporan')}}">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                <span class="hidden-xs hidden-sm">Daftar Laporan</span>
            </a>
        </li>
    </ul>
@endsection

@section('cari_dosen')

<section class="content-header dashbor">
        <h1 style="padding-bottom: 10px">
           Cari Dosen
            <small>Admin</small>
        </h1>
    </section>

<div id="content">
    <div class="content-inner">
            <div class="row search-row">
                <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" class="form-control search-field" id="Search" placeholder="Search">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-ok go">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
          
                    <div style="padding-bottom: 10px">
                       <table>
                        <tr>
                            <th style="font-size: 18px">Nama Dosen:&nbsp </th>
                            <td style="font-size: 17px">Budi Budiman</td>
                        </tr>
                       </table>
                    </div>
                    <hr>
               
    </div>
        <div class="content-inner">
            <div class="row comments-row">
                <div class="col-sm-2 col-md-1">
                        <img src="{{asset('assets/image/bunga.jpg')}}" class="image hidden-xs">
                   
                </div>

                <div class="col-sm-10 col-md-11">
                    <div class="row">
                        <div class="col-xs-9 col-sm-10 col-md-9 article-title">
                            <b>Nama Kegiatan</b>Tempat Kegiatan

                            <br>
                            <small>Today 2:11 pm-Waktu Kegiatan</small>
                        </div>

                        <div class="col-xs-3 col-sm-2 col-md-3 article-title">
                            <div class="clearfix">
                                <div class="pull-right comments-age">2 days ago</div>
                            </div>
                        </div>
                    </div>
                    <div class="well well-sm comments-well article-title">
                        Penjelasan mengenai kegiatan
                    </div>

                    <div class="clearfix">
                        <div class="pull-right">
                            <a class="btn btn-xs btn-default" href="{{route('admin.dosen.detail')}}" role="button">
                                <span class="glyphicon glyphicon- glyphicon-eye-open" aria-hidden="true"></span>
                                More Detail
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class=" col-md-12">
                        <nav>
                            <ul class="pagination">
                                <li><a href="#">&laquo;</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>
                            
                        </nav>
                    </div>
                </div>

        </div>
        
       
    </div>
    @endsection
@extends('admin.navbar')

@section('lap_kegiatan')

<section class="content-header dashbor">
        <h1 style="padding-bottom: 10px">
           Laporan Kegiatan dan Honor
            <small>Admin</small>
        </h1>
    </section>

<div id="content">
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
                            <a class="btn btn-xs btn-default" href="{{route('admin.laporan.detail')}}" role="button">
                                <span class="glyphicon glyphicon- glyphicon-eye-open" aria-hidden="true"></span>
                                More Detail
                            </a>

                            <a class="btn btn-xs btn-default" href="{{route('admin.laporan.detail')}}" role="button">
                                    <span class="glyphicon glyphicon- glyphicon-download" aria-hidden="true"></span>
                                    Download
                                </a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection
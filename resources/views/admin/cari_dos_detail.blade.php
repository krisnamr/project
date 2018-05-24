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
            <a href="#">
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
            Detail Dosen
            <small>Admin</small>
        </h1>
    </section>
    
    

            <div class="content-inner">
              
              <table class="table table-striped" border="4" style="border-color: aliceblue">
                  
                      <tr>
                          <th style="width: 40%">Nama Dosen</th>
                          <td>Krisna</td>
                       
                      </tr>
    
                      <tr>
                          <th>Kode Dosen</th>
                          <td>55414920</td>
                      </tr>
    
                      <tr>
                        <th>Nama Kegiatan</th>
                        <td>Seminar</td>
                    </tr>
    
                    <tr>
                        <th>Tanggal Kegiatan</th>
                        <td>20 Mei 2018 </td>
                    </tr>
    
                    <tr>
                        <th>Tempat Kegiatan</th>
                        <td>Depok</td>
                    </tr>
    
                    <tr>
                        <th>Jabatan Kepanitiaan</th>
                        <td>Bendahara</td>
                    </tr>
    
                    <tr>
                        <th>Total Honor</th>
                        <td>00.0000</td>
                    </tr>
                  
                  
                
              </table>
                
            </div>
        
    @endsection
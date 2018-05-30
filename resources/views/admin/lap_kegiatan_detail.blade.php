@extends('admin.navbar')

@section('lap_kegiatan')

<section class="content-header dashbor">
        <h1 style="padding-bottom: 10px">
            Detail Laporan Kegaiatan dan Honor
            <small>Admin</small>
        </h1>
    </section>
    
    

            <div class="content-inner">

                {{-- Detail Kegiatan --}}
                
                <h3 style="border-bottom: 2px solid #969FAA">Detail Kegiatan</h3>
                </br > 
               
              <table class="table table-striped" border="4" style="border-color: aliceblue">
                
                    <tr >
                        <th style="width: 40%">Nama Kegiatan</th>
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
                        <th>Deskripsi</th>
                        <td>Gambar.jpg</td>
                    </tr>
              </table>

            
            {{-- Laporan Keuangan --}}

            <h3 style="border-bottom: 2px solid #969FAA">Detail Kegiatan</h3>
        </br > 
       
      <table class="table table-striped" border="4" style="border-color: aliceblue">
        
            <tr>
                <th style="width: 40%">Jenis Pengeluaran</th>
                <th>Unit</th>
                <th>Biaya</th>

             
            </tr>

            <tr>
                <td>Konsumsi</td>
                <td>100</td>
                <td>300.000</td>
            </tr>

            <tr>
                <td>Acara</td>
                <td>10</td>
                <td>3000.000</td>
                
            </tr>
            
            <tr>
                    <th>Total</th>
                    <td>-</td>
                    <td>3.300.000</td>

            </tr>
          
        
      </table>

      {{--Daftar Panitia --}}

      <h3 style="border-bottom: 2px solid #969FAA">Detail Kegiatan</h3>
    </br > 
   
  <table class="table table-striped" border="4" style="border-color: aliceblue">
    

        <tr>
            <th>Nama Dosen</th>
            <th>Jabatan</th>
            <th>Jabatan</th>
            <th>Pajak</th>
            <td>Total</td>
        </tr>

        <tr>
            <td>Budi Budiman</td>
            <td>Ketua</td>
            <td>3000.000</td>
            <td>300.000</td>
            <td>2.700.000</td>
        </tr>
      
        <tr>
                <td>Susi Budiman</td>
                <td> Wakil Ketua</td>
                <td>2000.000</td>
                <td>200.000</td>
                <td>1.800.000</td>
            </tr>
    
  </table>
                
            </div>
      
        
    @endsection
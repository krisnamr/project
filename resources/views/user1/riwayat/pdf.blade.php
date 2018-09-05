<html>
    <head>
        <title>Cetak Honor</title>
    </head>
    <body>
    <style type="text/css">
        table{
            width: 100%;
        }
        table, td {
           /*  border: 1px solid black;   */
          
        }
        th, td {
            padding: 5px;
            text-align: left;
            vertical-align: middle;
            border-bottom: 1px solid #ddd;
            font-size: 15px;
        }       
        th {
            border-top: 1px solid #ddd;
            height: 20px;
            background-color: #ddd;
            text-align : center;
        }
    </style>


<center>
<h1>Laporan Riwayat Honorium Dosen
</h1>
<hr>
<br>
</center>
                
<h3><strong>Nama Dosen: {{$namadosen->namaDosen()}}</h3>


<center>
    <table class="table table-bordered">
        <thead>
              <tr>
                   <th>No</th>
                   <th>Nama Panitia</th>
                   <th>Jabatan</th>
                   <th>Honorium</th>
                   <th>Pajak</th>
                   <th>Total</th>
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
    </table><br>
    <table id="example2" class="table table-bordered table-striped table-hover" role="grid" aria-describedby="example2_info">
            <tr>
                <th width="50%" rowspan="1" colspan="3" style="font-size: 14px;">Total Pendapatan Bersih Pertahun</th>
                <th rowspan="1" colspan="3" style="font-size: 14px;"><center>Rp {{ $riwayat->getHonorTotalInRp() }}</center></th>  
            </tr>
            <tr>
                <th width="50%" rowspan="1" colspan="3" style="font-size: 14px;">Total Pajak yang dibayarkan Pertahun</th>
                <th rowspan="1" colspan="3" style="font-size: 14px;"><center>Rp {{ $riwayat->getPajakTotalInRp() }}</center></th>
            </tr>
    </table>
</center><br><br>
            <p align=right>
            <font size="4">Jakarta, {{date('d-m-Y')}} <br><br><br><br>
            <font size="3">_________________ <br></p></font></font>
    </body>
</html>
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
<h1>Laporan Honorium Kegiatan Dosen <br>
</h1>
<hr>
<br>
</center>
                
<h4><strong>Nama Kegiatan: {{$lap_honors->kegiatan->nama_kegiatan}}</h4>
<h4><strong>Tanggal Kegiatan: {{$lap_honors->kegiatan->tgl_pelaksanaan}}</h4>
<h4<strong>Tempat Kegiatan: {{$lap_honors->kegiatan->tempat}}</h4>
<h4><strong>Pencatat Laporan: {{$lap_honors->pembuat->fullname}}</h4><br>

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
         @foreach ($honors as $honor)
              <tr>
                    <td><center>{{++$number}}</center></td>
                    <td><center>{{$honor->list_jabatan->namaDosen()}}</center></td>
                    <td> <center> {{$honor->list_jabatan->jabatan->nama_jabatan}}</center></td>
                    <td> <center>{{$honor->honor}}</center></td>
                    <td> <center>{{$honor->pajak}}</center></td>
                    <td> <center>{{$honor->total}}</center></td>
            </tr>
         @endforeach
        </tbody>
    </table>
</center><br><br>
            <p align=right>
            <font size="4">Jakarta, {{date('d-m-Y')}} <br><br><br><br>
            <font size="3">_________________ <br></p></font></font>
    </body>
</html>
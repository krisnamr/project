<table>
    <thead>
        <tr>
            <th>no</th>
            <th>list_jabatan_id</th>
            <th>lap_honor_id</th>
            <th>nama panitia</th>
            <th>jabatan</th>
            <th>honor</th>
            <th>pajak</th>      
        </tr>
    </thead>
    <tbody>
        @foreach ($listJabatans as $i => $listJabatan)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{$listJabatan->id}}</td>
                <td>{{$listJabatan->kegiatan_id}}</td>
                <td>{{$listJabatan->namaDosen()}}</td>
                <td>{{$listJabatan->jabatan->nama_jabatan}}</td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>
@extends('admins.akun.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h4>Daftar Akun Admin</h4>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{route('akunadmin.create')}}">Tambah Akun Admin</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-striped table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="3%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="no: activate to sort column ascending"><center>No</center></th>
                <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="nama: activate to sort column ascending"><center>Nama Lengkap</center></th>
                <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="tanggal: activate to sort column ascending"><center>Alamat E-mail</center></th>
                <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="tanggal: activate to sort column ascending"><center>Jabatan</center></th>
                <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="tanggal: activate to sort column ascending"><center>Role</center></th>
                <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="status: activate to sort column ascending"><center>Created</center></th>

                <th width="13%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($admins as $admin)
              <tr role="row" class="odd">
                <td><center> {{++$number}}</center></td>                  
                <td><center>{{ $admin->fullname }}</center></td>
                <td><center>{{ $admin->email }}</center></td>
                <td><center>{{ $admin->jabatan}}</center></td>
                <td><center>Admin</center></td>
                <td>{{$admin->created_at}}</td>
                <td><center>
                  <div class="box-button">
                      <a href="{{ route('akunadmin.edit',['id'=>$admin->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 col-md-3 btn-margin">
                          <i class="fa fa-pencil-square-o"></i> 
                          Edit
                          </a>
                  </div>
                  <div class="box-btn">
                    <form class="row" method="POST" action="{{ route('akunadmin.destroy',['id'=>$admin->id]) }}" onsubmit = "return confirm('Are you sure?')" style="padding-left: 2px">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                           
                        <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 col-md-3 btn-margin">
                            <i class="fa fa-trash-o"></i>
                          Hapus
                        </button>
                    </form>
                  </div>
                </center>

                  
                  </td>
          @endforeach
           
            </tbody>
          </table>
        </div>
     
        
      </div>
      <div class="row">
        
        <div class="col-sm-7">
          
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  
</div>
@endsection

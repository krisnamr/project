@extends('admin.navbar')

@section('pengguna_list')

<section class="content-header dashbor">
        <h1 style="padding-bottom: 10px">
            List Pengguna
            <small>Admin</small>
        </h1>
    </section>
<div class="row">
        <div class="col-md-12">
            <div class="dashboard-content-con clearfix">
                
                <table class="table table-border table-striped">
                    <thead>
                        <tr>
                         
                            <th>Nama Lengkap</th>
                            <th>Alamat Email</th>
                            <th>Jabatan</th>
                            <th>Role</th>
                            <th>Created</th>
                            <th colspan='2' align='center'>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                            @foreach ($users as $user)
                            <tr>
                                
                                <td>{{$user->fullname}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->jabatan}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{$user->created_at}}</td>
                
                            
                    <td>
                            <div class="box-button">
                                
                                <a href="{{ route('admin.pengguna.edit',['id'=>$user->id]) }}" class="btn btn-warning " role="button" >
                                    Edit</a>              
                            </div>
                    
                     <div class="box-button">  
                        
                    <form action="{{route('admin.pengguna.delete',['id'=>$user->id])}}" method="POST" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" class="btn btn-danger " role="button" value="Hapus"></a>
                    </form>
                    </div>
                </td>
                   
                    
                
                       
                        </tr>
                            @endforeach
                    </tbody>
                </table>

                <div class="table-nav">
                        <div class="jumlah-data">
                          <h3<strong>Jumlah Pengguna: {{$jumlah}}</h3>
                        </div>
            
                        <div class="paging">
                                {{$users->links()}}
                            </div>
                </div>

                        <div class="tombol-nav">
                                <a href="{{route('admin.pengguna.buat')}}" class="btn btn-success">Tambah Siswa</a>  
                        </div>
                       
                    </div>
                  
                </div>
                  
                    
                </div>
                
            </div>
        </div>

    </div>
    @endsection
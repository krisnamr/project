@extends('admin.navbar')

@section('pengguna_buat')
<section class="content-header dashbor">
        <h1 style="padding-bottom: 10px">
            Buat Pengguna
            <small>Admin</small>
        </h1>
    </section>

<div class="content-inner">
    <div class="col md-6-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{route('admin.pengguna.store')}}">
                        <input type="hidden" name="_method" value="POST">
                        <!-- {{ csrf_field() }} -->

                                <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                                    <label for="fullname" class="col-md-4 control-label">Name Lengkap</label>
        
                                    <div class="col-md-6">
                                        <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required>
        
                                        @if ($errors->has('fullname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fullname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">Alamat Email</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                                    <label for="jabatan" class="col-md-4 control-label">jabatan</label>
        
                                    <div class="col-md-6">
                                        <input id="jabatan" type="text" class="form-control" name="jabatan" value="{{ old('jabatan') }}" required>
        
                                        @if ($errors->has('jabatan'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('jabatan') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>
        
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Konfirmasi Password</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="role" class="col-md-4 control-label">Jenis Role</label>
                                    <div class="col-md-4 radio">
                                        <label><input name="role" type="radio" value="user1" id="role">
                                            Pengisi Laporan Kegiatan</label><br>
                                            <label><input name="role" type="radio" value="user2" id="role">
                                                Pengisi Laporan Honor</label>
                                                <br>
                                           
                                                @if ($errors->has('role'))
                                                <span class="help-block">{{$errors->first('role')}}</span>
                                                @endif
                                            </div>
                                </div>
                                
        
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Buat
                                           {{csrf_field()}}
                                        </button>
                                    </div>
                                </div>

                    </form>
            </div>
        </div>
    </div>
</div>

    @endsection
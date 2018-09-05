@extends('admins.adminbuat.base')

@section('action-content')
  <section class="content">
  <div class="box">
    <div class="box-header">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Buat Akun Admin</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('akunadmin.store')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                            <label for="fullname" class="col-md-2 control-label">Nama Lengkap</label>
  
                            <div class="col-md-8">
                                <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required>
  
                                @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-2 control-label">Alamat Email</label>
    
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                      <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                          <label for="jabatan" class="col-md-2 control-label">Jabatan</label>

                          <div class="col-md-8">
                              <input id="jabatan" type="text" class="form-control" name="jabatan" value="{{ old('jabatan') }}" required>

                              @if ($errors->has('jabatan'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('jabatan') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-2 control-label">Password</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-2 control-label">Konfirmasi Password</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Buat
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

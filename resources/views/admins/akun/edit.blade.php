@extends('admins.akun.base')

@section('action-content')
  <section class="content">
  <div class="box">
    <div class="box-header">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Akun Pengguna Keuangan</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{url('admin/akunhonor/'.$user2->id.'/update')}}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                            <label for="fullname" class="col-md-2 control-label">Name Lengkap</label>

                            <div class="col-md-8">
                                <input id="fullname" type="text" class="form-control" name="fullname" value="{{ $user2->fullname }}" required autofocus>

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
                                    <input id="email" type="email" class="form-control" name="email" value="{{$user2->email}}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-2 control-label">Password</label>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control" name="password" value="">
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                            <label for="jabatan" class="col-md-2 control-label">jabatan</label>

                            <div class="col-md-8">
                                <input id="jabatan" type="text" class="form-control" name="jabatan" value="{{ $user2->jabatan }}" required>

                                @if ($errors->has('jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Edit
                                       {{csrf_field()}}
                                    </button>
                                </div>
                            </div>

                    </form>
                </div>
                <div class="form-group pull-right">
                        <div >
                            <h5><strong>*Note:</strong> Pengeditan Field yang dilakukan, harus disertai dengan <i> Password</i> pengguna</h5>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

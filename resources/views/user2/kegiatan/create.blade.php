@extends('user2/dasbor/base')

@section('action-content')
  <section class="content">
  <div class="box">
    <div class="box-header">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Kegiatan Baru</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('store.kegiatan') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="POST">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('nama_kegiatan') ? ' has-error' : '' }}">
                            <label for="nama_kegiatan" class="col-md-2 control-label">Nama Kegiatan</label>

                            <div class="col-md-8">
                                <input id="nama_kegiatan" type="text" class="form-control" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}" required autofocus>

                                @if ($errors->has('nama_kegiatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_kegiatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tempat') ? ' has-error' : '' }}">
                            <label for="tempat" class="col-md-2 control-label">Tempat Kegiatan</label>

                            <div class="col-md-8">
                                <input id="tempat" type="text" class="form-control" name="tempat" value="{{ old('tempat') }}" required>

                                @if ($errors->has('tempat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group">
                            <label class="col-md-2 control-label">Tanggal Kegiatan</label>
                            <div class="col-md-8">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ old('tgl_pelaksanaan') }}" name="tgl_pelaksanaan" class="form-control pull-right" id="hiredDate" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
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


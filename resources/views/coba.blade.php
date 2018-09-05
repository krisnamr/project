@extends('user2.honor.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title"><strong> Pencarian Riwayat Dosen</strong></h3>
        </div>
        <div class="col-sm-4">
         
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="#">
         {{ csrf_field() }}
         @component('layouts_user.search', ['title' => 'Search'])
          @component('layouts_user.two-cols-search-row', ['items' => ['Nama Dosen'],
          'oldVals' => [isset($searchingVals) ? $searchingVals['nama_kegiatan'] : '']])
          @endcomponent
        @endcomponent
      </form>
        <div class="col-sm-12">
  </div>
  <!-- /.box-body -->
</div>

</div>
    </section>
    <!-- /.content -->
@endsection

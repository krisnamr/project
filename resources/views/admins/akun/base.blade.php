@extends('layouts_user.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kelola Akun Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Kelola Akun</a></li>
       
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection
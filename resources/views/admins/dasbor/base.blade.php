@extends('layouts_user.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat Datang, Admin!
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dasbor Admin</a></li>
       
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection
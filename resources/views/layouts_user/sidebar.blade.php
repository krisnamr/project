  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/user8-128x128.jpg") }}" class="img-circle" alt="User Image">
        </div>
       
        <div class="pull-left info">
          <p>{{ Auth::user()->fullname}}</p>
          <!-- Status -->
          <h4><i class="fa fa-circle text-success"></i></h4>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
           
          {{--  <input type="text" name="q" class="form-control" placeholder="Search...">  --}}
              <span class="input-group-btn">
                {{--  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>  --}}
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu Admin-->
      @if(Auth::guard('admin')->user())
      <ul class="sidebar-menu">
        <li class="active"><a href="{{route('admin.home')}}"><i class="fa fa-home"></i> <span>Dasbor</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-user"></i> <span>Kelola Pengguna</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('akunhonor.index')}}">Daftar Pengguna</a></li>
            <li><a href="{{route('akunkegiatan.create')}}">Buat Akun Pajak</a></li>
            <li><a href="{{route('akunhonor.create')}}">Buat Akun Bendahara</a></li>
            <li><a href="{{route('akunpembukuan.create')}}">Buat Akun Pembukuan</a></li>
          </ul>
        </li>

        <li class="treeview satu">
            <a href="#"><i class="fa fa-user-md"></i> <span>Kelola Admin</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu satu">
              <li><a href="{{route('akunadmin.index')}}">Daftar Akun Admin</a></li>
              <li><a href="{{route('akunadmin.create')}}">Buat Akun Admin</a></li>
            </ul>
          </li>
      </ul>
      @endif

      <!-- Sidebar Menu Honor -->
      
      <ul class="sidebar-menu">
      @if(Auth::guard('honor')->user())
        <li class="active"><a href="{{route('honor.home')}}"><i class="fa fa-home "></i> <span>Dasbor</span></a></li>
        <li><a href="{{route('regis.kegiatan')}}"><i class="fa fa-pencil-square-o"></i> <span>Registrasi Kegiatan</span></a></li>
      
        <li class="treeview disabled" >
          <a><i class="fa fa-pencil-square-o" style="pointer-events: none;cursor: default;"></i> <span>Isi Laporan Kegiatan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="pointer-events: none;cursor: default;">
              <li class="disabled"><a>Daftar Panitia</a></li>
            <li class="disabled"><a>Laporan Kegiatan</a></li>
            <li class="disabled"><a>Laporan Keuangan</a></li>
          </ul>
        </li>
        <li class="disabled" id="lihat" style="pointer-events: none;cursor: default;"><a><i class="fa fa-eye"></i> <span>Lihat Laporan Kegiatan</span></a></li>
        <li><a href="{{url('honor/honordosen')}}"><i class="fa fa-pencil-square-o"></i> <span>Isi Laporan Honor</span></a></li>
      </ul>
      @endif

      <!-- Sidebar Menu Kegiatan-->
      @if(Auth::guard('kegiatan')->user())
      <ul class="sidebar-menu">
          <li class="active"><a href="{{route('pajak.home')}}"><i class="fa fa-home"></i> <span>Dasbor</span></a></li>
          <li><a href="{{route('riwayat.index')}}"><i class="fa fa-user"></i> <span>Rekapitulasi Pajak</span></a></li>
      </ul>
      @endif

      <!-- Sidebar Menu Pembukuan-->
      @if(Auth::guard('pembukuan')->user())
      <ul class="sidebar-menu">
          <li class="active"><a href="{{route('pembukuan.home')}}"><i class="fa fa-home"></i> <span>Dasbor</span></a></li>
          <li><a href="{{route('pembukuan.index')}}"><i class="fa fa-user"></i> <span>Rekapitulasi Laporan</span></a></li>
      </ul>
      @endif
  
    </section>
  </aside>


<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>E</b>M</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg" style="font-size: 16px;">Laporan Hnorium</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="{{ asset("/bower_components/AdminLTE/dist/img/user8-128x128.jpg") }}" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">{{ Auth::user()->fullname }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="{{ asset("/bower_components/AdminLTE/dist/img/user8-128x128.jpg") }}" class="img-circle" alt="User Image">

              <p>
                Selamat Datang, {{ Auth::user()->fullname }}!
              </p>
            </li>
            <!-- Menu Footer-->
            @if(Auth::guard('admin')->user())
            <li class="user-footer">
               <div class="pull-left">
                  <a href="{{route('admin.home')}}" class="btn btn-default btn-flat">Dasbor</a>
                </div>
               <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{route('admin.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  Logout
                  </a>
               </div>
            </li>
            @endif

            @if(Auth::guard('honor')->user())
            <li class="user-footer">
               <div class="pull-left">
                  <a href="{{route('honor.home')}}" class="btn btn-default btn-flat">Dasbor</a>
                </div>
               <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{route('honor.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  Logout
                  </a>
               </div>
            </li>
            @endif

            @if(Auth::guard('kegiatan')->user())
            <li class="user-footer">
               <div class="pull-left">
                  <a href="{{route('pajak.home')}}" class="btn btn-default btn-flat">Dasbor</a>
                </div>
               <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{route('pajak.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  Logout
                  </a>
               </div>
            </li>
            @endif

            @if(Auth::guard('pembukuan')->user())
            <li class="user-footer">
               <div class="pull-left">
                  <a href="{{route('pembukuan.home')}}" class="btn btn-default btn-flat">Dasbor</a>
                </div>
               <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{route('pembukuan.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  Logout
                  </a>
               </div>
            </li>
            @endif
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

@if(Auth::guard('admin')->user())
 <form id="logout-form" action="{{route('admin.logout')}}" method="POST" style="display: none;">
    {{ csrf_field() }}
 </form>
 @endif

 @if(Auth::guard('honor')->user())
 <form id="logout-form" action="{{route('honor.logout')}}" method="POST" style="display: none;">
    {{ csrf_field() }}
 </form>
 @endif

 @if(Auth::guard('kegiatan')->user())
 <form id="logout-form" action="{{route('pajak.logout')}}" method="POST" style="display: none;">
    {{ csrf_field() }}
 </form>
 @endif

 @if(Auth::guard('pembukuan')->user())
 <form id="logout-form" action="{{route('pembukuan.logout')}}" method="POST" style="display: none;">
    {{ csrf_field() }}
 </form>
 @endif

 
 
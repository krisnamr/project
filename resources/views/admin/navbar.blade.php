<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/bootstrap')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--Default-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/navbar.css')}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!--Admin LTE-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/Admin.css')}}">

   
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements
        and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">

                <div class="theme2 hidden-sm hidden-xs">
                    <p class="text-open pull-right hidden-xs hidden-sm" style="color: #fff">Laporan Kegiatan Dosen</p>
                </div>

                <div class="theme">
                    <img src="{{asset('assets/image/u.png')}}" class="image hidden-xs">
                    <img src="{{asset('assets/image/u.png')}}" class="image-small hidden-lg hidden-md">
                    <span class="text-admin hidden-xs hidden-sm">Admin</span>
                    <span class="hidden-xs hidden-sm" style="color: #fff">Staff</span>
                </div>

                {{--  ===========Navbar=============  --}}
               <div id="menu">
                <ul class="current_page_itemm">
                 
                        <ul>
                                <li class="link active">
                                    <a href="{{route('admin.dasbor')}}">
                                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                        <span class="hidden-xs hidden-sm">Dasbor</span>
                                    </a>
                                </li>
                                    </li>
                            </ul>
                    <li class="link current_page_item"><a href="#collapse-pengguna" data-toggle="collapse" aria-controls="collapse-pengguna">
                        <span class="glyphicon glyphicon-user" aria-hidden="true">
                            </span><span class="hidden-xs hidden-sm">Daftar Pengguna</span></a>

                            <ul class="collapse collapseable" id="collapse-pengguna">
                                <li><a href="{{route('admin.pengguna.list')}}"><span class="glyphicon glyphicon-list-alt" aria-hidden="true">
                                    </span>List Pengguna </a></li>
                                    
                                    <li><a href="{{route('admin.pengguna.buat')}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true">
                                        </span>Buat Pengguna </a>
                                    </li>
                                </ul>
                            </li>
            
                    <li class="link">
                        <a href="{{route('admin.dosen')}}">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            <span class="hidden-xs hidden-sm">Cari Dosen</span>
                        </a>
                    </li>
            
                    <li class="link">
                        <a href="#collapse-laporan" data-toggle="collapse" aria-controls="collapse-laporan">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            <span class="hidden-xs hidden-sm">Daftar Laporan</span>
                            
                        </a>
            
                        <ul class="collapse collapseable" id="collapse-laporan">
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                                    Laporan Kegiatan
                                    
                                </a>
                                
                            </li>
            
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>Laporan Honor
                                   
                                </a>
                            </li>
                        </ul>
                        </li>
                </ul>
                </li>
                </ul>
            </div>
            </div>

            <!-- main content area -->
            <!-- Top Bar -->
            <div class="col-md-10  col-sm-11 display-table-cell valign-top">
                <div class="row">
                    <header id="nav-header" class="clearfix">
                        <div class="col-md-5 col-xs-2">
                            <nav class="navbar-default pull-left navbar-color">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </nav>
                        </div>
                        <div class="col-md-7">
                                <div class="col-md-8">
     
                                </div>
                                    <div class="col-md-4">
                                       
                                            
                                        <ul class="pull-right" id="logout" >
                                                <li class="glyphicon glyphicon-log-out"></li>
                                                <li>
                                                        <a style="color: #fff"
                                                        class="logout"
                                                        href="{{ route('admin.logout') }}"
                                                            onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                            Logout
                                                        </a>
                                            
                                         <li><form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input type="submit">Logout
                                        </form></li>
                                        </ul>
                                    </div> 
     
                               
                             </div>
     
                    </header>
                </div>
                <!--   ISI Blog -->
                @yield('dasbor')
                @yield('pengguna_list')
                @yield('pengguna_buat')
                @yield('pengguna_edit')

                @yield('cari_dosen')
                @yield('cari_dosen_detail')
                @yield('lap_kegiatan')
                @yield('lap_honor')

                <!-- Bottom Bar -->
               @yield('footer')
               @yield('das-foot')
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {{-- Include all compiled plugins (below), or include individual files as needed --}}
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/default.js')}}"> </script>
    <script>
            $(document).ready(function () {
                    $('#menu ul li a').click(function (ev) {
                        $('#menu ul li').removeClass('selected');
                        $(ev.currentTarget).parent('li').addClass('selected');
                    });
                });</script>
</body>


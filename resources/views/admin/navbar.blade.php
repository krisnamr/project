<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--Default-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/default.css')}}">
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

                @yield('navbar')
                </li>
                </ul>
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

                @yield('cari_dosen')
              @yield('dasbor')
              @yield('pengguna')
              
              @yield('lap_kegiatan')
              
              
              

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
</body>


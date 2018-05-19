
<html lang="en">

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

                <ul>
                    <li class="link active">
                        <a href="#">
                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            <span class="hidden-xs hidden-sm">Dasbor</span>
                        </a>
                    </li>

                    <li class="link">
                        <a href="#">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <span class="hidden-xs hidden-sm">Daftar Pengguna</span>
                            <span class="label label-success pull-right hidden-sm hidden-xs">10</span>
                        </a>
                    </li>

                    <li class="link">
                        <a href="#">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            <span class="hidden-xs hidden-sm">Cari Dosen</span>
                        </a>
                    </li>

                    <li class="link">
                        <a href="#">
                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                            <span class="hidden-xs hidden-sm">Rangkuman Laporan</span>
                            <span class="label label-success pull-right hidden-sm hidden-xs">20</span>
                        </a>
                    </li>
                    <li class="link">
                        <a href="#collapse-post" data-toggle="collapse" aria-controls="collapse-post">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                            <span class="hidden-xs hidden-sm">Daftar Laporan</span>
                            <span class="glyphicon glyphicon-menu-left pull-right hidden-sm hidden-xs"></span>
                        </a>
                        

                        <ul class="collapse collapseable" id="collapse-post">
                            <li>
                                 <a href="#">
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                    Laporan Kegiatan
                                    <span class="label label-warning pull-right">10</span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                    Laporan Honor
                                    <span class="label label-success pull-right">10</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                </li>
                </ul>
            </div>

            <!-- main content area -->
            <!-- Top Bar -->
            <div class="col-md-10  col-sm-11 display-table-cell valign-top">
                <div class="row">
                    <header id="nav-header" class="clearfix">
                        <div class="col-md-5">
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
                                                        <a href="{{ route('home.logout') }}"
                                                            onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                            Logout
                                                        </a>
                                            
                                         <li><form id="logout-form" action="{{ route('home.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                
                                        </form></li>
                                        </ul>
                                    </div> 
     
                               
                             </div>
     
                    </header>
                </div>
                <!--   ISI Blog -->
                <section class="content-header dashbor">
                    <h1 style="padding-bottom: 10px">
                        Selamat Datang
                        <small>Admin</small>
                    </h1>
                </section>


                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>150</h3>

                                    <p>Jumlah Pengguna</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-people"></i>
                                </div>
                                <a href="#" class="small-box-footer">Info Lengkap
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>53
                                       
                                    </h3>

                                    <p>Jumlah Laporan Kegiatan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-paper"></i>
                                </div>
                                <a href="#" class="small-box-footer">Info Lengkap
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>44</h3>

                                    <p>Jumlah Laporan Honor</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-calculator"></i>
                                </div>
                                <a href="#" class="small-box-footer">Info Lengkap
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>65</h3>

                                    <p>Jumlah Dosen</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-person"></i>
                                </div>
                                <a href="#" class="small-box-footer">Info Lengkap
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </section>
                <!-- Bottom Bar -->
                <div class="row">
                    <footer id="dashboard-footer" class="clearfix">
                        <div class="pull-right">
                            Copyright &copy;2018 Universitas Gunadarma</div>
                        
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {{-- Include all compiled plugins (below), or include individual files as needed --}}
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/default.js')}}"> </script>
</body>


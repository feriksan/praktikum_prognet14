<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- Bootstrap Styles-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <!-- FontAwesome Styles-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">
    <!-- Morris Chart Styles-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/moris/moris-0.4.3.min.css')}}">
    <!--<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" /> -->
    <!-- Custom Styles-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom-styles.css')}}">
    <!--<link href="assets/css/custom-styles.css" rel="stylesheet" />-->
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">LOCAL KETS</a>
            </div>
            @php
                $user = Auth::guard('admin')->user();
                $notif = Auth::guard('admin')->user()->unreadNotifications;
                $count = 0;
            @endphp
              
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        @foreach (Auth::guard('admin')->user()->unreadNotifications as $notif)
                        @if ($notif->data != null)
                        @if ($notif->type == 'App\Notifications\transaksi_baru')
                        <li>
                            <a href="#">
                                <div>
                                    <strong>{{$notif->data['user']}}</strong>
                                    <span class="pull-right text-muted">
                                        <em>{{ $notif->created_at->diffForHumans() }}</em>
                                    </span>
                                </div>
                                <div>Telah Membuat Pesanan Baru</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @elseif ($notif->type == 'App\Notifications\notif')
                        <li>
                            <a href="#">
                                <div>
                                    <strong>{{$notif->data['user']}}</strong>
                                    <span class="pull-right text-muted">
                                        <em>{{ $notif->created_at->diffForHumans() }}</em>
                                    </span>
                                </div>
                                <div>Berkata {{$notif->data['content']}}</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @elseif ($notif->type == 'App\Notifications\upload_bukti')
                        <li>
                            <a href="#">
                                <div>
                                    <strong>{{$notif->data['user']}}</strong>
                                    <span class="pull-right text-muted">
                                        <em>{{ $notif->created_at->diffForHumans() }}</em>
                                    </span>
                                </div>
                                <div>Telah Mengupload Bukti Pembayaran</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endif
                        @endif
                        @endforeach
                        <li>
                            <a class="text-center" href="/admin/markRead">
                                <strong>Read All Message</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">28% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                            <span class="sr-only">28% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">85% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                            <span class="sr-only">85% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{url('admin/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a class="active-menu" href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="/admin/produk"><i>Product</a>
                    </li> 
                    <li>
                        <a href="/admin/kategori"></i>Categories</a>
                    </li>
                    <li>
                        <a href="/admin/kurir"></i>Courier</a>
                    </li>
                    <li>
                        <a href="/admin/pembelian"><i> Lihat Pembelian</a>
                    </li>
                    </ul>                    
                    <ul class="nav" id="main-menu">
                    <li>
                        <a href="/admin/ulasan"><i>Lihat Ulasan</a>
                    </li>
                    </ul>
                    
                    <div class="col-md-4">
                        <div class="card">
                          <div class="card-header">
                            {{-- NOTIF --}}
                          </div>
                          <div class="card-body">
                            @php
                                $values = Auth::guard('admin')->user()->unreadNotifications;
                            @endphp
                            @if (is_array($values) || is_object($values))
                            @foreach ($values as $notif)
                            {{-- {{print_r($notif->data)}} --}}
                            @if ($notif->type == "App\Notifications\ulasan_admin")
                            {{-- {{print_r($notif->data)}} --}}
                                {{-- <h5>Status Barang: {{$notif->data['barang']}}, {{$notif->data['pesan']}}</h5> --}}
                            @endif
                              {{-- <h5>BARANG BARU BUNG: {{$notif->data['transaksi_baru']}}, {{$notif->data['total']}}</h5> --}}
                            @endforeach
                            @endif
                          </div>
                        </div>
                      </div>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small>Admin</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    
                
                </div>
                <!-- /. ROW  -->

                @yield('content')
                <!-- /. ROW  -->
        <footer><p>Local Kets Bali</a></p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    {{-- <script>
        var data = {!! json_encode($status_bulan['total']) !!}
        console.log(data);
    </script> --}}
  <script src="{{asset('assets/js/jquery-1.10.2.js')}}"></script> 
    <!-- Bootstrap Js -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Metis Menu Js -->
    <script src="{{asset('assets/js/jquery.metisMenu.js')}}"></script>
    <!-- Morris Chart Js -->
    <script src="{{asset('assets/js/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('assets/js/morris/morris.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('assets/js/custom-scripts.js')}}"></script> 


</body>

</html>
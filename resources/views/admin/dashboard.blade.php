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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
@php
    $values = Auth::guard('admin')->user()->unreadNotifications;
@endphp
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
                            <a class="dropdown-item" href="/admin/markRead">
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
{{-- 

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small>Admin</small>
                        </h1>
                    </div>
                </div> --}}
                <!-- /. ROW  -->
                <h2 class="page-header">
                    Dashboard <small>Total Penjualan Tahun Ini</small>
                </h2>
                {{-- <div class="card-header">
                    <select class="custom-select" name="bulan" id="bulan">
                      <option value="1" @if(date('m')==1) selected @endif>Januari</option>
                      <option value="2" @if(date('m')==2) selected @endif>Februari</option>
                      <option value="3" @if(date('m')==3) selected @endif>Maret</option>
                      <option value="4" @if(date('m')==4) selected @endif>April</option>
                      <option value="5" @if(date('m')==5) selected @endif>Mei</option>
                      <option value="6" @if(date('m')==6) selected @endif>Juni</option>
                      <option value="7" @if(date('m')==7) selected @endif>Juli</option>
                      <option value="8" @if(date('m')==8) selected @endif>Agustus</option>
                      <option value="9" @if(date('m')==9) selected @endif>September</option>
                      <option value="10" @if(date('m')==10) selected @endif>Oktober</option>
                      <option value="11" @if(date('m')==11) selected @endif>November</option>
                      <option value="12" @if(date('m')==12) selected @endif>Desember</option>
                    </select>
                  </div> --}}
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3>{{$status_tahun['total']}}</h3>
                            </div>
                            <script>
                                var trans = [];
                                var trans_gagal = [];
                                var pendapatan = [];
                            </script>
                            @foreach ($transaksi_total as $transaksi)
                                <script>
                                    var bulann = {!! json_encode($transaksi) !!}
                                    var gaji = {!! json_encode($pendapatan) !!}
                                    trans.push(bulann);
                                    pendapatan.push(gaji);
                                </script>                                
                            @endforeach
                            @foreach ($transaksi_penjualan_gagal as $transaksi_gagal)
                            {{-- <p>K</p> --}}
                            <script>
                                var bulannn = {!! json_encode($transaksi_gagal) !!}
                                console.log(bulannn);
                                trans_gagal.push(bulannn);
                            </script>                                
                        @endforeach
                            <script>
                                var berhasil = {!! json_encode($status_tahun['success']) !!}
                                var data = {!! json_encode($status_bulan['harga']) !!}
                                var barang_pertama = {!! json_encode($status_barang['pertama']) !!}
                                var barang_kedua = {!! json_encode($status_barang['kedua']) !!}
                                var barang_ketiga = {!! json_encode($status_barang['ketiga']) !!}
                                // console.log(pendapatan[0][5]);
                                // var berhasil = {!! json_encode($status_bulan['total']) !!}
                                // var data = {!! json_encode($status_bulan['total']) !!}
                                // console.log(data);
                            </script>
                            <div class="panel-footer back-footer-green">
                                Total Transaksi
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                <h3>{{$status_tahun['unverified']}}</h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Menunggu Persetujuan
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa fa-comments fa-5x"></i>
                                <h3>{{$status_tahun['expired']+$status_bulan['cancelled']}}</h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                Gagal Transaksi
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <h3>{{$status_tahun['success']}}</h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                                Berhasil Transaksi
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Penjualan Tahun Ini
                            </div>
                            <div class="panel-body">
                                {{-- <canvas id="myChart" width="400" height="400"></canvas> --}}
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Barang Paling Laku Bulan Ini
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tasks Panel
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    @foreach (Auth::guard('admin')->user()->unreadNotifications as $notif)
                                    @if ($notif->data != null)
                                    @if ($notif->type == 'App\Notifications\transaksi_baru')
                                    <a href="#" class="list-group-item">
                                        <span class="badge">{{ $notif->created_at->diffForHumans() }}</span>
                                        <i class="fa fa-fw fa-comment"></i>Ada Pesanan Baru Dari: {{print_r($notif->data['user'])}}
                                    </a>
                                    @endif
                                    @endif
                                    @endforeach
                                    {{-- @foreach ($values as $notif)
                                    <a href="#" class="list-group-item">
                                        <span class="badge">{{ $notif->created_at->diffForHumans() }}</span>
                                        <i class="fa fa-fw fa-comment"></i>Ada Pesanan Baru Dari: {{print_r($notif->data['user'])}}
                                    </a>
                                    @endforeach --}}
                                    {{-- <a href="#" class="list-group-item">
                                        <span class="badge">7 minutes ago</span>
                                        <i class="fa fa-fw fa-comment"></i> Commented on a post
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">16 minutes ago</span>
                                        <i class="fa fa-fw fa-truck"></i> Order 392 shipped
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">36 minutes ago</span>
                                        <i class="fa fa-fw fa-globe"></i> Invoice 653 has paid
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">1 hour ago</span>
                                        <i class="fa fa-fw fa-user"></i> A new user has been added
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">1.23 hour ago</span>
                                        <i class="fa fa-fw fa-user"></i> A new user has added
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">yesterday</span>
                                        <i class="fa fa-fw fa-globe"></i> Saved the world
                                    </a> --}}
                                </div>
                                <div class="text-right">
                                    <a href="#">More Tasks <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Pelanggan setia anda
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>S No.</th>
                                                <th>First Name</th>
                                                <th>Email ID.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($daftar_user as $user)
                                            <tr>
                                                <td>{{$user['id']}}</td>
                                                <td>{{$user['name']}}</td>
                                                <td>{{$user['email']}}</td>
                                            </tr>    
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script> --}}
    <script>                      
        // var ctx = document.getElementById('myChart').getContext('2d');
        // var myChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        //         datasets: [{
        //             label: '# of Votes',
        //             data: [12, 19, 3, 5, 2, 3],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255, 99, 132, 1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 }
        //             }]
        //         }
        //     }
        // });

        </script>


</body>

</html>
<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
        <style>
            @import url("//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
        
        .navbar-icon-top .navbar-nav .nav-link > .fa {
          position: relative;
          width: 36px;
          font-size: 24px;
        }
        
        .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
          font-size: 0.75rem;
          position: absolute;
          right: 0;
          font-family: sans-serif;
        }
        
        .navbar-icon-top .navbar-nav .nav-link > .fa {
          top: 3px;
          line-height: 12px;
        }
        
        .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
          top: -10px;
        }
        
        @media (min-width: 576px) {
          .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
          }
        
          .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
          }
        
          .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa > .badge {
            top: -7px;
          }
        }
        
        @media (min-width: 768px) {
          .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
          }
        
          .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
          }
        
          .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa > .badge {
            top: -7px;
          }
        }
        
        @media (min-width: 992px) {
          .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
          }
        
          .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
          }
        
          .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa > .badge {
            top: -7px;
          }
        }
        
        @media (min-width: 1200px) {
          .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link {
            text-align: center;
            display: table-cell;
            height: 70px;
            vertical-align: middle;
            padding-top: 0;
            padding-bottom: 0;
          }
        
          .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa {
            display: block;
            width: 48px;
            margin: 2px auto 4px auto;
            top: 0;
            line-height: 24px;
          }
        
          .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa > .badge {
            top: -7px;
          }
        }
        
        /*********************************************
    			Call Bootstrap
*********************************************/

@import url("bootstrap/bootstrap.min.css");
@import url("bootstrap-override.css");
@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");

/*********************************************
        		Theme Elements
*********************************************/

.gold{
	color: #FFBF00;
}

/*********************************************
					PRODUCTS
*********************************************/

.product{
	border: 1px solid #dddddd;
	height: 321px;
}

.product>img{
	max-width: 230px;
}

.product-rating{
	font-size: 20px;
	margin-bottom: 25px;
}

.product-title{
	font-size: 20px;
}

.product-desc{
	font-size: 14px;
}

.product-price{
	font-size: 22px;
}

.product-stock{
	color: #74DF00;
	font-size: 20px;
	margin-top: 10px;
}

.product-info{
		margin-top: 50px;
}

/*********************************************
					VIEW
*********************************************/

.content-wrapper {
	max-width: 1140px;
	background: #fff;
	margin: 0 auto;
	margin-top: 25px;
	margin-bottom: 10px;
	border: 0px;
	border-radius: 0px;
}

.container-fluid{
	max-width: 1140px;
	margin: 0 auto;
}

.view-wrapper {
	float: right;
	max-width: 70%;
	margin-top: 25px;
}

.container {
	padding-left: 0px;
	padding-right: 0px;
	max-width: 100%;
}

/*********************************************
				ITEM 
*********************************************/

.service1-items {
	padding: 0px 0 0px 0;
	float: left;
	position: relative;
	overflow: hidden;
	max-width: 100%;
	height: 321px;
	width: 130px;
}

.service1-item {
	height: 107px;
	width: 120px;
	display: block;
	float: left;
	position: relative;
	padding-right: 20px;
	border-right: 1px solid #DDD;
	border-top: 1px solid #DDD;
	border-bottom: 1px solid #DDD;
}

.service1-item > img {
	max-height: 110px;
	max-width: 110px;
	opacity: 0.6;
	transition: all .2s ease-in;
	-o-transition: all .2s ease-in;
	-moz-transition: all .2s ease-in;
	-webkit-transition: all .2s ease-in;
}

.service1-item > img:hover {
	cursor: pointer;
	opacity: 1;
}

.service-image-left {
	padding-right: 50px;
}

.service-image-right {
	padding-left: 50px;
}

.service-image-left > center > img,.service-image-right > center > img{
	max-height: 155px;
}

        </style>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <!------ Include the above in your HEAD tag ---------->
        
        <nav class="navbar navbar-icon-top navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="{{ Request::is('/user/beli') ? 'nav-item active' : 'nav-item active' }} ">
                <a class="nav-link" href="/user/beli">
                  <i class="fa fa-home"></i>
                  Home
                  <span class="sr-only">(current)</span>
                  </a>
              </li>
              <li class="{{ Request::is('/user/lihatcart') ? 'nav-item active' : 'nav-item active' }}">
                <a class="nav-link" href="/user/lihatcart">
                  <i class="fa fa-cart-arrow-down">
                  </i>
                  Cart
                </a>
              </li>
              <li class="{{ Request::is('/user/lihatbelanjaan') ? 'nav-item active' : 'nav-item active' }}">
                <a class="nav-link" href="/user/lihatbelanjaan">
                  <i class="fa fa-credit-card">
                  </i>
                  Pembelian
                </a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="/user/lihatalamat">
                  <i class="fa fa-bookmark">
                  </i>
                  Category
                </a>
              </li> --}}
              {{-- <li class="{{ Request::is('/user/alamat') ? 'nav-item active' : 'nav-item active' }}">
                <a class="nav-link" href="/user/alamat">
                  <i class="fa fa-truck">
                  </i>
                  Akun
                </a>
              </li> --}}
            </ul>
            @php
                $user = Auth::guard('user')->user();
                $notif = Auth::guard('user')->user()->notifications;
                $count = 0;
            @endphp
              @foreach (Auth::guard('user')->user()->unreadNotifications as $notif)
              @php
                if ($notif->data != null){
                  if ($notif->data['user'] == $user['id']){
                      $count++;
                  }
                else {
                  $count +=0;
                }
              }
              @endphp
              @endforeach
            <ul class="navbar-nav ">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                  <i class="fa fa-bell">
                    <span class="badge badge-info">{{$count}}</span>
                  </i>
                  Notifikasi
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach (Auth::guard('user')->user()->unreadNotifications as $notif)
                  @if ($notif->data != null)
                  @if ($notif->type == 'App\Notifications\respon_admin')
                      @if ($notif->data['user'] == $user['id'])
                      @if ($notif->data['status'] == 'success')
                        <a class="dropdown-item" href="#">Pesanan {{$notif->data['id']}} telah {{$notif->data['status']}} Silahkan Beri Komentar</a><span class="badge">{{ $notif->created_at->diffForHumans() }}</span>  
                      @endif
                        <a class="dropdown-item" href="#">Pesanan {{$notif->data['id']}} telah {{$notif->data['status']}}</a><span class="badge">{{ $notif->created_at->diffForHumans() }}</span>
                      @endif
                  @elseif($notif->type == 'App\Notifications\ulasan_admin')
                  @if ($notif->data['user'] == $user['id'])
                  <a class="dropdown-item" href="#">Admin Berkata {{$notif->data['ulasan']}}</a><span class="badge">{{ $notif->created_at->diffForHumans() }}</span>
                  @endif
                  @endif
                  @endif
                  @endforeach
                    <a class="dropdown-item" href="/user/markRead">
                        <strong>Read All Message</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                  <i class="fa fa-user">
                  </i>
                  Akun
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  {{-- <a class="dropdown-item" href="/user/alamat">Atur Alamat Pengiriman</a> --}}
                  <a class="dropdown-item" href="#">Review</a>
                  {{-- <a class="dropdown-item" href="/user/lihatbelanjaan">Upload Bukti Pembayaran</a> --}}
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/user/logout">Logout</a>
                </div>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
        {{-- <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              Notif
            </div>
            <div class="card-body">
              @foreach (Auth::guard('admin')->user()->notifications as $notif)
              {{print_r($notif->data)}}
              @if ($notif->type == "App\Notifications\respon_admin")
              
              {{-- <p>Pesanan anda dengan ID: {{$notif->data['id']}}</p>
              <br>
              <p>Telah: {{$notif->data['status']}}</p>
              <br>
              <p>Pada: {{$notif->data['created_at']}}</p> --}}
              {{-- @endif
              @endforeach
            </div>
          </div>
        </div> --}}
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
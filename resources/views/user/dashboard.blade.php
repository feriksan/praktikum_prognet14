<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('cssuser/dashboarduser.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    .box{
        width:600px;
        margin:0 auto;
        border:1px solid #ccc;
    }
  </style>

    <title>DASHBOARD USER</title>
</head>
<body>
<div id="dashboarduser">
        @include('flash-message')
        @yield('content')
</div>
<!-- AWAL CONTAINER -->
    <div class="container">
        <div class="spanduk">{{ Auth::guard('user')->user()->email_verified_at }}</div>
    </div>
<!-- AKHIR CONTAINER -->
<a href="{{ url('user/logout') }}">
        <button style="z-index:1;">LOGOUT</button>
        </a>
</body>
</html>

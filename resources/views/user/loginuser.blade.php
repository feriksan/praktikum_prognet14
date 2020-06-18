{{-- <!DOCTYPE html>
<html lang="en" dir="ltr" >
 <head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="{{asset('login.css')}}" type="text/css" rel="stylesheet">
    <title>َLogin User</title>


 </head>

 <body>
  <br />
  <div class="container box">
   <h3 align="center">Admin</h3><br />
   <form class="box" method="post" action="{{ url('user/login') }} ">
    {{ csrf_field() }}
    <h1>Login</h1><br />
    <div id="login">
        @include('flash-message')
        @yield('content')
    </div>
     <input type="email" name="email" placeholder="Email" />
     <input type="password" name="password" placeholder="Password" />
     <h6>Belum memiliki akun?
     <a class="up" href="/user/register">Registrasi</a></h6>
     <input type="submit" name="login" value="Login" />
   </form>
  </div>
 </body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login User</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{URL::asset('images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/main.css')}}">
<!--===============================================================================================-->
</head>
<?php
    if(isset($_GET['alert'])){
        $status = $_GET['alert'];

        if($status =="warning"){
            echo "<script>alert(\"SILAHKAN LOGIN TERLEBIH DAHULU\")</script>";
        }elseif($status =="wrong" ){
            echo "<script>alert(\"USERNAME ATAU PASSWORD SALAH!\")</script>";
        }
        elseif($status =="registrasi-sukses" ){
            echo "<script>alert(\"Registrasi Sukses, Silakan Login\")</script>";
        }
    }
    ?>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">--}}
          <form class="login100-form validate-form" method="post" action="{{ url('user/login') }}">
            <span class="login100-form-title p-b-43">
                Login to continue
            </span>
            @csrf
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="email" name="email" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
              <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
              <input type="checkbox" class="input-checkbox100" id="ckb1" name="checkbox1"/>
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
            <input class="login100-form-btn" type="submit" name="submit" value="SignIn"/>
          </div>
          <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
          <a class="up" href="/user/register">Registrasi</a></h6>
            </span>
          </div>
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('{{URL::asset('images/228529.jpg')}}');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="{{URL::asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{URL::asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{URL::asset('vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{URL::asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{URL::asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{URL::asset('vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{URL::asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{URL::asset('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{URL::asset('js/main.js')}}"></script>

</body>
</html>
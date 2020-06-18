{{-- <!DOCTYPE html>
<html lang="en">
<head>

  <title>Admin</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/bootstrap.min.css')}}">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/plugins/font-awesome.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/plugins/simple-line-icons.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/plugins/animate.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/plugins/icheck/skins/flat/aero.css')}}"/>
  <link href="{{asset('login.css')}}" type="text/css" rel="stylesheet">

    </head>

    <body id="mimin" class="dashboard form-signin-wrapper">

      <div class="container box">

        <form class="box" method="post" action="{{ url('admin/login') }}">
          @csrf
            <h3 align="center">Admin</h3><br />
                  <h1 class="atomic-symbol"></h1>
                  <p class="atomic-mass">LOCAL KETS</p>
                  <p class="element-name">ADMIN</p>

                <div id="login">
                    @include('flash-message')
                    @yield('content')
                </div>
                  <input type="text" name="username" placeholder="Username" required>
                  <input type="password" name="password" placeholder="Password" required>
                  <label class="pull-left">
                  <input type="checkbox" class="icheck pull-left" name="checkbox1"/> Remember me
                  </label>
                  <br>
                  <input type="submit" name="submit" value="SignIn"/>
                  <h6>Belum memiliki akun?
                    <a class="up" href="/admin/register">Registrasi</a></h6>
                  </form>
              </div>
              


      <!-- end: Content -->
      <!-- start: Javascript -->
      <script src="{{URL::asset('asset/js/jquery.min.js')}}"></script>
      <script src="{{URL::asset('asset/js/jquery.ui.min.js')}}"></script>
      <script src="{{URL::asset('asset/js/bootstrap.min.js')}}"></script>

      <script src="{{URL::asset('asset/js/plugins/moment.min.js')}}"></script>
      <script src="{{URL::asset('asset/js/plugins/icheck.min.js')}}"></script>

      <!-- custom -->
      <script src="{{URL::asset('asset/js/main.js')}}"></script>
      <script type="text/javascript">
       $(document).ready(function(){
         $('input').iCheck({
          checkboxClass: 'icheckbox_flat-aero',
          radioClass: 'iradio_flat-aero'
        });
       });
     </script>
     <!-- end: Javascript -->
   </body>
   </html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Admin</title>
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
			<div class="wrap-login100">
          <form class="login100-form validate-form" method="post" action="{{ url('admin/login') }}">
            <span class="login100-form-title p-b-43">
              Login to continue
            </span>
            @csrf
            <div id="login">
              @include('flash-message')
              @yield('content')
            </div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="username" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
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
          <a class="up" href="/admin/register">Registrasi</a></h6>
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
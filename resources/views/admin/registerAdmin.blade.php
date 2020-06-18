{{-- <!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/bootstrap.min.css')}}">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/plugins/font-awesome.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/plugins/simple-line-icons.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/plugins/animate.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('asset/css/plugins/icheck/skins/flat/aero.css')}}"/>
  <link href="{{URL::asset('asset/css/style.css')}}" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="{{URL::asset('asset/img/logomi.png')}}">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

    </head>

    <body id="mimin" class="dashboard form-signin-wrapper">

      <div class="container">

        <form class="form-signin" method="post" action="{{ url('admin/register') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="panel periodic-login">
              <span class="atomic-number">REGISTER</span>
              <div class="panel-body text-center">
                  <h1 class="atomic-symbol"></h1>
                  <p class="atomic-mass">LOCAL KETS</p>
                  <p class="element-name">ADMIN</p>

                  @include('flash-message')
                  @yield('content')

                  <i class="icons icon-arrow-down"></i>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" name="name" class="form-text" required>
                    <span class="bar"></span>
                    <label>Nama</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" name="username" class="form-text" required>
                    <span class="bar"></span>
                    <label>Username</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="password" name="password" pattern="(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password minimal 8 Karakter, terdiri dari huruf besar dan kecil" class="form-text" required>
                    <span class="bar"></span>
                    <label>Password</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="password" name="password_confirmation" class="form-text" required>
                    <span class="bar"></span>
                    <label>Ulang Password</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" name="phone" pattern="[0-9]{10,12}" title="Gunakan Hanya Nomor dan Nomor Telepon Harus Lebih dari 10 digit" maxlength="12" class="form-text" required>
                    <span class="bar"></span>
                    <label>No. HP</label>
                  </div>
                  <label>Foto Profile</label>
                    <center>
                      <input type="file" name="file" accept="image/*" required>
                    </center>
                  <div>
                  <input type="submit" name="submit" class="btn col-md-12" value="Daftar"/>
                  </div>
              </div>
                <div class="text-center" style="padding:5px;">
                    <h6>Sudah memiliki akun? <a href="/admin/login" >Login </a></h6>
                </div>
          </div>
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
   </html>
 --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Admin</title>
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
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
          <form class="login100-form validate-form" method="post" action="{{ url('admin/register') }}" enctype="multipart/form-data">
            <span class="login100-form-title p-b-43">
              Register Admin
            </span>
            @include('flash-message')
            @yield('content')
            @csrf
            <div id="login">
              @include('flash-message')
              @yield('content')
            </div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" name="name" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Nama</span>
          </div>
          
          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" name="username" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
          </div>
          
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password_confirmation" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Re-Enter Password</span>
          </div>
          
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="text" name="phone" pattern="[0-9]{10,12}" title="Gunakan Hanya Nomor dan Nomor Telepon Harus Lebih dari 10 digit" maxlength="12" required>
						<span class="focus-input100"></span>
						<span class="label-input100">No. Telepon</span>
          </div>
          
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="file" name="file" accept="image/*" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Foto Profile</span>
          </div>
          <div class="container-login100-form-btn">
            <input class="login100-form-btn" type="submit" name="submit" value="Daftar"/>
          </div>
						<div>
							<p class="txt1">
								Sudah Memiliki Akun? 
              </p>
              <a href="/admin/login">Login</a>
						</div>
          </div>
          
          {{-- <div class="text-center p-t-46 p-b-20">
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
					</div> --}}
				{{-- </form>

				<div class="login100-more" style="background-image: url('{{URL::asset('images/228529.jpg')}}');">
				</div>
			</div>
		</div>
	</div> --}}
	
	

	
	
{{-- <!--===============================================================================================-->
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
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Admin</title>
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

					
        <form class="login100-form validate-form" method="post" action="{{ url('admin/register') }}" enctype="multipart/form-data">
          <span class="login100-form-title p-b-43">
            Register Admin
          </span>
          @include('flash-message')
          @yield('content')
          @csrf
          <div id="login">
            @include('flash-message')
            @yield('content')
          </div>
        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
          <input class="input100" name="name" required>
          <span class="focus-input100"></span>
          <span class="label-input100">Nama</span>
        </div>
        
        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
          <input class="input100" name="username" required>
          <span class="focus-input100"></span>
          <span class="label-input100">Username</span>
        </div>
        
        <div class="wrap-input100 validate-input" data-validate="Password is required">
          <input class="input100" type="password" name="password" required>
          <span class="focus-input100"></span>
          <span class="label-input100">Password</span>
        </div>
        
        <div class="wrap-input100 validate-input" data-validate="Password is required">
          <input class="input100" type="password" name="password_confirmation" required>
          <span class="focus-input100"></span>
          <span class="label-input100">Re-Enter Password</span>
        </div>
        
        <div class="wrap-input100 validate-input" data-validate="Password is required">
          <input class="input100" type="text" name="phone" pattern="[0-9]{10,12}" title="Gunakan Hanya Nomor dan Nomor Telepon Harus Lebih dari 10 digit" maxlength="12" required>
          <span class="focus-input100"></span>
          <span class="label-input100">No. Telepon</span>
        </div>
        
        <div class="wrap-input100 validate-input" data-validate="Password is required">
          <input class="input100" type="file" name="file" accept="image/*" required>
          <span class="focus-input100"></span>
          <span class="label-input100">Foto Profile</span>
        </div>
        <div class="container-login100-form-btn">
          <input class="login100-form-btn" type="submit" name="submit" value="Daftar"/>
        </div>
          <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
          <a class="up" href="/admin/login">Sudah Memiliki Akun? Login Disini</a></h6>
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
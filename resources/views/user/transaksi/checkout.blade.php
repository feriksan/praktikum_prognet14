<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
         .wizard  .nav-tabs > li.active > a::after, .wizard .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: ##5a4080 none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 0px 0; }

.wizard .nav-tabs > li  {width:5%; text-align:center;}

/* check out */
.breadcrumb_checkout { 
  list-style: none; 
  overflow: hidden; 
  margin: 40px;
  padding: 0;
}
.breadcrumb_checkout li { 
  float: left; 
}
.breadcrumb_checkout li a {
  color: white;
  text-decoration: none; 
  padding: 8px 0 8px 55px;
  background: brown; /* fallback color */
  background-color: #60ab59;
  position: relative; 
  display: block;
  float: left;
}
@media (min-width: 768px) {
.breadcrumb_checkout li a:after { 
  content: " "; 
  display: block; 
  width: 0; 
  height: 0;
  border-top: 50px solid transparent;           /* Go big on the size, and let overflow hide */
  border-bottom: 50px solid transparent;
  border-left: 30px solid  #60ab5973;
  position: absolute;
  top: 50%;
  margin-top: -50px; 
  left: 100%;
  z-index: 2; 
}	
.breadcrumb_checkout li a:before { 
  content: " "; 
  display: block; 
  width: 0; 
  height: 0;
  border-top: 50px solid transparent;           /* Go big on the size, and let overflow hide */
  border-bottom: 50px solid transparent;
  border-left: 30px solid white;
  position: absolute;
  top: 50%;
  margin-top: -50px; 
  margin-left:0px;
  left: 100%;
  z-index: 1; 
}	
.breadcrumb_checkout li.active a:after 
	{
		content: " "; 
  display: block; 
  width: 0; 
  height: 0;
  border-top: 50px solid transparent;           /* Go big on the size, and let overflow hide */
  border-bottom: 50px solid transparent;
  border-left: 30px solid  #60ab59;
  position: absolute;
  top: 50%;
  margin-top: -50px; 
  left: 100%;
  z-index: 2; 
	}
}
.breadcrumb_checkout li:first-child a {
  padding-left: 10px;
}

.breadcrumb_checkout li.active
{
	background:        #60ab59;
	color: #fff;
}
.breadcrumb_checkout li a
{
	background:        #60ab5973;
	color: #fff;
}
.breadcrumb_checkout li a:hover
{
	background:        #60ab5973;
	color: #fff;
}
.breadcrumb_checkout li a:visited
{
	background:        #60ab5973;
	color: #fff;
}
.breadcrumb_checkout li a:focus
{
	background:        #60ab5973;
	color: #fff;
}
.breadcrumb_checkout>li.disabled>a:hover {
	background:        #60ab5973;
	color: #fff;
	}
	.breadcrumb_checkout>li.disabled>a:visited {
	background:        #60ab5973;
	color: #fff;
	}
	.breadcrumb_checkout>li.disabled>a:focus {
	background:        #60ab5973;
	color: #fff;
	}
    </style>
</head>


<div class="container">
<div class="row">
<section>
<div class="wizard">
<div class="wizard-inner">
<!-- <div class="connecting-line"></div> -->
<ul class="nav  breadcrumb_checkout" role="tablist">
<li role="presentation" class="active" onclick="location.href='/user/checkout'">
<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
<h3>Shipping</h3>
</a>
</li>
<li role="presentation" class="disabled" onclick="location.href='/user/checkout2'">
<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
<h3>Payment</h3>
</a>
</li>
<li role="presentation" class="disabled" onclick="location.href='/user/checkout3'">
<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
<h3>Confirmations</h3>
</a>
</li>
</ul>
</div>
<div class="tab-content">
<div class="tab-pane active" role="tabpanel" id="step1">
<div class="step1">
<!--  exiting customer end -->
<div class="row" style="">
<div class="checkout_details">
<div class="col-sm-6 col-sm-offset-3">
<dl class="dl-horizontal">
@foreach ($user as $u)
<dt>First Name:<span></span></dt>
<dd>{{$u->name}}</dd>
</dl>
<dl class="dl-horizontal">
<dt>Email:<span></span></dt>
<dd>{{$u->email}}</dd>
@endforeach
<div>
{{-- <a class="btn btn-primary next-step btn-theme" data-toggle="modal" data-target="#myModal">Edit</a> --}}
</div>
</div>
</div>
</div> 
<!-- exiting customer end-->
<!-- new customer start -->
<div class="row">
  <form method="GET" action="/user/checkout2">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>Alamat</label>
        <input type="text" class="form-control" name="nama_jalan" required>
      </div> <!-- form-group end.// -->
      <div class="form-group col-md-6">
        <label>Provinsi</label>
        <select id="inputState" class="form-control" name="provinsi">
          <option value="" holder>Pilih Provinsi Tujuan</option>
        {{$p=1}}
          @foreach ($provinsi as $provinsi)
            <option value="{{$p}}">{{$provinsi}}</option>
            {{$p++}}
          @endforeach
          {{$p=1}}
        </select>
          </div> <!-- form-group end.// -->
          <div class="form-group col-md-6">
              <label>Kota</label>
        <select id="inputState" class="form-control" name="kota">
          <option value="" holder>Pilih Kota Tujuan</option>
        </select>
            </div> <!-- form-group end.// -->
    </div> <!-- form-row.// -->
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Next</button>
      </div> <!-- form-group// -->      
  </form>
</div> 
<!-- new customer end -->
</div><!-- step 1 end div tag -->
<ul class="list-inline pull-right">
{{-- <li><button type="button" class="btn btn-primary next-step btn-theme" onclick="location.href='/user/checkout2'">Next</button></li> --}}
</ul>
</div>
<div class="tab-pane" role="tabpanel" id="complete">
<div class="step44">
<h5>Completed</h5>
</div>
</div>
<div class="clearfix"></div>
</div>
</form>
</div>
</section>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
      $('select[name="provinsi"]').on('change', function(){
          var cityId = $(this).val();
          if(cityId){
              $.ajax({
                  url: '/getCity/ajax/'+cityId,
                  type: "GET",
                  dataType: "json",
                  success: function(data){
                      $('select[name="kota"]').empty();
                      $.each(data, function(key, value){
                          $('select[name="kota"]').append(
                              '<option value="'+ key + '">'+value+'</option>');
                      }); 
                  }
              });
          }else{
              $('select[name="kota"]').empty();
          }
      });    
  });
</script>
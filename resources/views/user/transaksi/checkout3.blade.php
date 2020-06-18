
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
@php
            $total = 0;
            $count = 0;
        @endphp
        @foreach ($index as $item)
            @php
                $total += $item->sub;
                $count+=1;
                // echo $total;
            @endphp
        @endforeach
        @php
            $total_semua = $ongkir + $total;
        @endphp
<div class="wizard-inner">
  <!-- <div class="connecting-line"></div> -->
  <ul class="nav  breadcrumb_checkout" role="tablist">
  <li role="presentation" class="" onclick="location.href='/user/checkout'">
  <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
  <h3>Shipping</h3>
  </a>
  </li>
  <li role="presentation" class="" onclick="location.href='/user/checkout2'">
  <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
  <h3>Payment</h3>
  </a>
  </li>
  <li role="presentation" class="active" onclick="location.href='/user/checkout3'">
  <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
  <h3>Confirmations</h3>
  </a>
  </li>
  </ul>
  </div>
<div class="tab-pane" role="tabpanel" id="step3">
    <div class="col-sm-4">
    <h5><strong>Shipping address</strong></h5>
    @foreach ($user as $u)
    <dt>First Name:<span></span></dt>
    <dd>{{$u->name}}</dd>
    </dl>
    <dt>Email:<span></span></dt>
    <dd>{{$u->email}}</dd>
    @endforeach
    <br>
    <dt>Alamat:<span></span></dt>
    <dd> {{$nama_jalan}}</dd>
    <dd>{{$city['city_name']}}</dd>
    <dd> {{$pp['province']}}</dd>                     
    </div>
    <div class="col-sm-3">
    <h5><strong>Paket </strong></h5>
    <p>{{$paket}}</p>
    <h5><strong>Ongkir </strong></h5>
    <p>{{$ongkir}}</p>
    <h5><strong>Sub Total </strong></h5>
    <p>{{$total}}</p>
    <h5><strong>Kurir </strong></h5>
    <p>{{$nama_kurir}}</p>
    <h5><strong>Estimasi Waktu </strong></h5>
    <p>{{$durasi}}</p>
    </div>
    <div class="col-sm-5">
    <h5><strong>Place your order and pay</strong></h5>   
    <table class="table">
    <thead>
    <tr>
    <th>Product</th>
    <th>Banyak</th>
    <th>Harga</th>
    </tr>
    </thead>
    <tbody>
      <form method="get"action="/user/check">
        @foreach ($index as $test)
        <tr>
        <td>{{$test->product_name}}</td>
        <input type="hidden" value="{{$test->product_id}}" name="id[]">
        <input type="hidden" value="{{$test->qty}}" name="qty[]">
        <input type="hidden" value="{{$test->price}}" name="price[]">
        <input type="hidden" value="{{$test->discount}}" name="discount[]">
        <input type="hidden" value="{{$count}}" name="count">
        <td><i class="fa fa-usd" aria-hidden="true"></i>{{$test->qty}}</td>
        <td><i class="fa fa-usd" aria-hidden="true"></i>{{$test->discount}}</td>
        </tr>
        @endforeach
        <tr>
        <td>
          <input type="hidden" value="{{$total_semua}}" name="total">
          <input type="hidden" value="{{$ongkir}}" name="ongkir">
          <input type="hidden" value="{{$total}}" name="subtotal">
        Total: <i class="fa fa-usd" aria-hidden="true"> {{$total_semua}} Rp
        </i></td>
        </tr>
        </tbody>
        </table>
        </div>
        <div class="clearfix"></div>
        <ul class="list-inline pull-right">
        <li><button type="button" class="btn btn-default prev-step btn-theme">Previous</button></li>
        <li><button type="button" class="btn btn-default next-step btn-theme">Skip</button></li>
        <li><button type="Submit" class="btn btn-primary btn-info-full next-step btn-theme">Next</button></li>
        </ul>
      </form>

    </div>
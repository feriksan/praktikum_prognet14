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

<div class="wizard-inner">
    <!-- <div class="connecting-line"></div> -->
    <ul class="nav breadcrumb_checkout" role="tablist" >
    <li role="presentation" class="" onclick="location.href='/user/checkout'">
    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
    <h3>Shipping</h3>
    </a>
    </li>
    <li role="presentation" class="active" onclick="location.href='/user/checkout2'">
    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
    <h3>Payment</h3>
    </a>
    </li>
    <li role="presentation" class="disabled" onclick="location.href='/user/checkout2'">
    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
    <h3>Confirmations</h3>
    </a>
    </li>
    </ul>
    </div>
<div class="tab-pane" role="tabpanel" id="step2"> <!-- step 2 start -->
    <div class="step2">    
    <div class="col-sm-4">
      <form action="/user/checkout3">
    <label class="radio-inline">Pilih Kurir</label>
    <select id="inputState" class="form-control" name="kurir">
        @foreach ($kurir as $kurir)
          <option value="{{$kurir['id']}}">{{$kurir['courier']}}</option>
        @endforeach
      </select>
    <div class="name_of_card">
    <div class="form-group">
    <label for="exampleInputEmail1">Name on card</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name on card">
    </div>
    </div>
    <div class="name_of_card">
    <div class="form-group">
    <label for="exampleInputEmail1">Card number</label>
    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Card number">
    </div>
    </div>
    <p>Expiration date</p>
    <div class="expir_date col-sm-3 p_rm">                      
    <div class="form-group">                      
    <select class="form-control">
    <option>-- Select -- </option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    </select>
    </div>
    </div>
    <div class="expir_date col-sm-5 p_rm">
    <div class="form-group">
    <select class="form-control">
    <option>-- Year -- </option>
    <option>2006</option>
    <option>2006</option>
    <option>2007</option>
    <option>2008</option>
    </select>
    </div>
    </div>
    </div>
    <div class="col-sm-4"> 
    <label class="radio-inline"><input type="radio" name="optradio">Debit card</label>
    <div class="debit_card">
    <div class="form-group">
    <select class="form-control">
    <option>-- Debit card -- </option>
    <option>All Visa/MasterCard Debit Card</option>
    <option>All Rupay Debit Cards</option>
    <option>All SBI Maestro Debit Cards</option>
    </select>
    </div>
    </div>
    </div>
    <div class="col-sm-4"> 
    <label class="radio-inline"><input type="radio" name="optradio">Net Banking</label>
    <div class="net_banking">
    <div class="form-group">
    <select class="form-control">
    <option>-- Net Banking -- </option>
    <option>Allahabad Bank</option>
    <option>Andhra Bank</option>
    <option>Airtel Payments Bank</option>
    </select>
    </div>
    </div>
    </div>
    </div>
    <div class="clearfix"></div>
<ul class="list-inline pull-right">
<li><button type="button" class="btn btn-default prev-step btn-theme" onclick="location.href='/user/checkout'">Previous</button></li>
<li><button type="submit" class="btn btn-primary next-step btn-theme">Next</button></li>
</ul>
</div>
</form>
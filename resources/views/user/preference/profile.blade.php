<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="container">
<br>  <p class="text-center">More bootstrap 4 components on <a href="http://bootstrap-ecommerce.com/"> Bootstrap-ecommerce.com</a></p>
<hr>


<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header">
	<a href="" class="float-right btn btn-outline-primary mt-1">Log in</a>
	<h4 class="card-title mt-2">Sign up</h4>
</header>
<article class="card-body">
<form method="GET" action="/user/save_alamat">
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>Alamat</label>
		  <input type="text" class="form-control" name="nama_jalan">
		</div> <!-- form-group end.// -->
		<div class="form-group col-md-6">
		  <label>Provinsi</label>
		  <select id="inputState" class="form-control" name="provinsi">
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
				{{$i=1}}
				@foreach ($kot as $kota)
					<option value="{{$i}}">{{$kota}}</option>
					{{$i++}}	  
				@endforeach
				{{$i=1}}
			</select>
          </div> <!-- form-group end.// -->
	</div> <!-- form-row.// -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </div> <!-- form-group// -->      
</form>
</article> <!-- card-body end .// -->
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->

<br><br>
<article class="bg-secondary mb-3">  
<div class="card-body text-center">
    <h3 class="text-white mt-3">Bootstrap 4 UI KIT</h3>
<p class="h5 text-white">Components and templates  <br> for Ecommerce, marketplace, booking websites 
and product landing pages</p>   <br>
<p><a class="btn btn-warning" target="_blank" href="http://bootstrap-ecommerce.com/"> Bootstrap-ecommerce.com  
 <i class="fa fa-window-restore "></i></a></p>
</div>
<br><br>
</article>
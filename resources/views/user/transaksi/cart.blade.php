<head>
{{-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<!------ Include the above in your HEAD tag ---------->
{{-- <script>
    function gantiPaketOKE(a) {
        var x = Number(a);
            $.ajax({
               type:'GET',
               url:'/user/getoke',
               data:{"_token": "{{ csrf_token() }}",},
               success:function(data) {
                  $("#paket").html(data.paket);
                  $("#shipping").html(data.shipping);
                  $("#estimasi").html(data.estimasi);
                  $("#total").html(data.shipping+x);
               }
            });
         }
    function gantiPaketREG() {
    $.ajax({
        type:'GET',
        url:'/user/getreg',
        data:{"_token": "{{ csrf_token() }}",},
        success:function(data) {
            $("#paket").html(data.paket);
            $("#shipping").html(data.shipping);
            $("#estimasi").html(data.estimasi);
        }
    });
    }
    function gantiPaketSPS() {
            $.ajax({
               type:'GET',
               url:'/user/getsps',
               data:{"_token": "{{ csrf_token() }}",},
               success:function(data) {
                  $("#paket").html(data.paket);
                  $("#shipping").html(data.shipping);
                  $("#estimasi").html(data.estimasi);
               }
            });
         }
    function gantiPaketYES() {
    $.ajax({
        type:'GET',
        url:'/user/getyes',
        data:{"_token": "{{ csrf_token() }}",},
        success:function(data) {
            $("#paket").html(data.paket);
            $("#shipping").html(data.shipping);
            $("#estimasi").html(data.estimasi);
        }
    });
    }
 </script> --}}
 <style>
	span {cursor:pointer; }
    
		.minus, .plus{
			width:40px;
			height:40px;
			background:#f2f2f2;
			border-radius:4px;
			padding:8px 5px 8px 5px;
			border:1px solid #ddd;
      display: inline-block;
      vertical-align: middle;
      text-align: center;
		}
		input{
			height:34px;
      width: 100px;
      text-align: center;
      font-size: 26px;
			border:1px solid #ddd;
			border-radius:4px;
      display: inline-block;
      vertical-align: middle;
        }
 </style>
 </head>
@extends('user.template.navbar')

@section('title', 'Cart')

@section('sidebar')
    @parent
@endsection
@section('content')
 @php
 $total = 0;
@endphp
@foreach ($index as $item)
 @php
     $total += $item->sub;
     // echo $total;
 @endphp
@endforeach
{{-- @php
 $total_semua = $values['cost'][0]['value'] + $total;
@endphp --}}
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Discount</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($index as $test)
                    @if ($test['status'] == 'notyet')
                    <tr>
                        <form action="/user/checkout" method="get">
                        
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset('images/'.$test['image_name']) }}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">{{$test->product_name}}</a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td>
                            <center><span class="plus">+</span><input type="text" value="{{$test->qty}}" name="banyak[]"/><span class="minus">-</span></center>
                        </td>
                        <input type="hidden" value="{{$test->id}}" name="id[]">
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$test['price']}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$test->discount}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$test->sub}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                            <button type="button" class="btn btn-danger" onclick="location.href='/user/delete/{{$test->id}}'">
                                <span class="glyphicon glyphicon-remove"></span> Remove
                            </button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    {{-- <button type="submit" class="btn btn-danger" onclick="gantiPaketOKE('')">
                        <span class="glyphicon glyphicon-remove"></span> OKE
                    </button>
                    <button type="submit" class="btn btn-danger" onclick="gantiPaketREG('')">
                        <span class="glyphicon glyphicon-remove"></span> REG
                    </button>
                    <button type="submit" class="btn btn-danger" onclick="gantiPaketSPS('')">
                        <span class="glyphicon glyphicon-remove"></span> SPS
                    </button>
                    <button type="submit" class="btn btn-danger" onclick="gantiPaketYES('')">
                        <span class="glyphicon glyphicon-remove"></span> YES
                    </button> --}}

                    {{-- <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right" id="subtotal"><h5><strong>0</strong></h5></td>
                    </tr> --}}
                    {{-- <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Kurir</h5></td>
                        <td class="text-right"><h5><strong>{{$value['name']}}</strong></h5></td>
                    </tr> --}}
                    {{-- <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Paket</h5></td>
                        <td class="text-right" id = 'paket'><h5><strong> - </strong></h5></td>
                    </tr> --}}
                    {{-- <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                    <td class="text-right" id = 'shipping'><h5><strong></strong></h5></td>
                    </tr> --}}
                    {{-- <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated Time</h5></td>
                        <td class="text-right" id = 'estimasi'><h5><strong> Hari</strong></h5></td>
                    </tr> --}}
                    {{-- <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right" id = 'total'><h3><strong>0</strong></h3></td>
                    </tr> --}}
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default" onclick="location.href='/user/beli'">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="submit" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    
// Add +/1 To QTY Inputs

$(document).ready(function() {
			$('.minus').click(function () {
				var $input = $(this).parent().find('input');
				var count = parseInt($input.val()) - 1;
				count = count < 1 ? 1 : count;
				$input.val(count);
				$input.change();
				return false;
			});
			$('.plus').click(function () {
				var $input = $(this).parent().find('input');
				$input.val(parseInt($input.val()) + 1);
				$input.change();
				return false;
			});
		});
</script>
@endsection


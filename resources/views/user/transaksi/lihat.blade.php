{{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<!------ Include the above in your HEAD tag ---------->

@extends('user.template.navbar')

@section('title', 'Cart')

@section('sidebar')
    @parent
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Timeout</th>
                        <th class="text-center">Upload Bukti Pembayaran</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($index as $test)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading" ></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center"><strong>{{$test->total}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$test->shipping_cost}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$test->address}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$test->status}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center" id="<?php echo $test->id ?>"><button onclick="timeout('<?php echo $test->timeout ?>', '<?php echo $test->id ?>');">TIMEOUT</button><strong></strong></td>

                        <td class="col-sm-1 col-md-1">
                            @if ($test->status === 'canceled' || $test->status === 'expired')
                                {{-- <form action="/user/upload_bukti{{$test->id}}" enctype="multipart/form-data" method="post">
                                    {{ csrf_field() }}
                                    <input type="file" name="bukti" accept="image/*" required disabled>
                                    <button type="submit" class="btn btn-danger" disabled>
                                        <span class="glyphicon glyphicon-remove"></span> Upload Bukti Pembayaran
                                    </button>
                                </form> --}}
                            @elseif($test->status === 'unverified')
                                <form action="/user/upload_bukti{{$test->id}}" enctype="multipart/form-data" method="post">
                                    {{ csrf_field() }}
                                    <input type="file" name="bukti" accept="image/*" required>
                                    <button type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span> Upload Bukti Pembayaran
                                    </button>    
                                </form>
                                <button type="submit" class="btn btn-danger" onclick="location.href='/user/cancelbelanjaan/{{$test->id}}'">
                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                </button>
                            @elseif($test->status === 'success')
                            <form action="/user/review{{$test->id}}" method="get">
                                <label for="rate">Berikan Rating</label>
                                <br>
                                <input type="radio" name="rate" value=1>
                                <input type="radio" name="rate" value=2>
                                <input type="radio" name="rate" value=3>
                                <input type="radio" name="rate" value=4>
                                <input type="radio" name="rate" value=5>
                                <br>
                                <div id="login">
                                    @include('flash-message')
                                    @yield('content')
                                  </div>
                                <label for="content">Silahkan Tulis Komentar Anda</label>
                                <input type="text" name="content">
                                <br>
                                <button class="btn btn-success" type="submit">Submit</button>
                            </form>
                                <button type="submit" class="btn btn-danger" onclick="location.href='/user/cancelbelanjaan/{{$test->id}}'">
                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                </button>
                            @endif
                        </td>
                    </tr>
                    <script>
                        function timeout(a, b) {
                        var countDownDate = new Date(a).getTime();
                        
                         // Update the count down every 1 second
                          var x = setInterval(function() {
                        
                          // Get today's date and time
                          var now = new Date().getTime();
                            
                          // Find the distance between now and the count down date
                          var distance = countDownDate - now;
                            
                          // Time calculations for days, hours, minutes and seconds
                          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                            
                          // Output the result in an element with id="demo"
                          if (distance < 0) {
                            clearInterval(x);
                            document.getElementById(b).innerHTML = "EXPIRED";
                          }else{
                            document.getElementById(b).innerHTML = days + "d " + hours + "h "
                            + minutes + "m " + seconds + "s ";
                          }
                        }, 1000);
                        }
                        </script>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
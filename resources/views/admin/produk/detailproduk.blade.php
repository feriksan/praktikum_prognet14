@extends('layouts.da')
@section('content')
        <h2 class="card-title" style="text-align: center;">Detail Produk</h2>
        <br>
		<div class="table">
			@foreach($imga as $index)
                <label>
                    <img src="{{asset('images/'.$index['image_name']) }}" height="100" width="100" alt="img">
                </label>
            @endforeach
		  <table class="table table-striped table-bordered " align='center' >
			@foreach($products as $product)
			<tbody>
			  <tr>
				<th>Nama Produk</th>
				<td>{{ $product->product_name }}</td>
			  </tr>
			  <tr>
				<th>Discount</th>
				<td>{{ $product->discount }}</td>
			  </tr>
			  <tr>
				<th>Harga</th>
				<td>Rp. {{number_format($product->price)}}</td>
			  </tr>
			  <tr>
				<th>Deskripsi</th>
				<td>{{ $product->description }}</td>
			  </tr>
			  <tr>
				<th>Rating Produk</th>
				<td>{{ $product->product_rate }}</td>
			  </tr>
			  <tr>
				<th>Stock</th>
				<td>{{ $product->stock }}</td>
			  </tr>
			  <tr>
				<th>Kategori</th>
				<td>
					@foreach($categories as $category)
					  <button class="btn btn-light">{{ $category->category_name }}</button>
					@endforeach
					@endforeach
				</td>
			  </tr>
			</tbody>
		  </table>
		  
@endsection
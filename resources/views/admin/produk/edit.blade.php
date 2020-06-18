@extends('layout.da')


@section('content')

                            <form action="/admin/produk/{{$test->id}}" method="POST" >
                                {{csrf_field()}}
                                @method("PUT")
                                <input type="text" name="nama_produk" value="{{$test->product_name}}" required="" class="form-control"><br>
                                <input type="number" name="pot_harga" value="{{$test->discount}}" required="" class="form-control"><br>
                                <input type="number" name="harga" value="{{$test->price}}" required="" class="form-control"><br>
                                <input type="text" name="deskripsi" value="{{$test->description}}" required="" class="form-control"><br>
                                <input type="number" name="rating" value="{{$test->product_rate}}" required=""class="form-control"><br>
                                <input type="number" name="stok" value="{{$test->stock}}" required=""class="form-control"><br>
                                 @foreach($imga as $index)
                                <label>
                                  <img src="{{asset('images/'.$index['image_name']) }}" height="100" width="100" alt="img">
                                </label>
                                <!-- <form method="post" action="{{ route('product_images.destroy', $index->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="wrapper" align="center">
                                        <button type="submit" class="btn btn-danger btn-icon-text fa fa-trash" onclick="return confirm('Apa yakin ingin menghapus gambar ini?')">HAPUS GAMBAR
                                        </button>
                                    </div>
                                </form> -->
                                
                                @endforeach
                                <br>
                                <input type="submit" name="submit" value="update">
                            </form>
    
@endsection
    
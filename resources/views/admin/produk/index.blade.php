@extends('layout.da')


@section('content')
            
              <div class="input-group mb-3">
                <a href="/admin/produk/create" class="btn btn-primary btn-icon-split">
                    <!-- <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span> -->
                    <span class="text">Tambah Produk</span>
                  </a>
            </div>
            <table class="table table-hover">
                <thead>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Discount</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Rating</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                    
                </thead>
                <tbody>
                    
                    @foreach($index as $index)
                    
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$index['product_name']}}</td>
                        <td>{{$index['discount']}}</td>
                        <td>{{$index['price']}}</td>
                        <td>{{$index['description']}}</td>
                        <td>{{$index['product_rate']}}</td>
                        <td>{{$index['stock']}}</td>
                        
                        <td>

                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="/admin/produk/{{$index->id}}/edit" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </form>
                                <form action="/admin/produk/{{$index->id}}/" method="POST">
                                    @method("DELETE")
                                    @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                                <form>
                            </div>
        
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>

@endsection
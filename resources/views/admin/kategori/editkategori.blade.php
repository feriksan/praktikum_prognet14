@extends('layout.da')


@section('content')
            <form action="/admin/kategori/{{ $data1->id }}" method="POST">
                 @csrf
                    @method('PUT')
    <input class="form-control" type="text" name="nama_kategori" value="{{ $data1->category_name }}" placeholder="nama kategori"><br>
        <input type="submit" value="submit" class="btn btn-primary">
            </form>
@endsection
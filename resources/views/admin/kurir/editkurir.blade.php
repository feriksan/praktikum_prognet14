@extends('layout.da')


@section('content')
                            <form action="/admin/kurir/{{ $data1->id }}" method="POST">
                                @csrf
                                @method('PUT')
                            <input class="form-control" type="text" name="nama_kurir" value="{{ $data1->courier }}" placeholder="nama kategori"><br>
                                <input type="submit" value="submit" class="btn btn-primary">
                            </form>
@endsection
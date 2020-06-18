@extends('layout.da')


@section('content')
                            <form action="/admin/kurir" method="POST">
                                @csrf
                                @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="nama kurir" name="nama_kurir" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                            </form>
<div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>List kurir</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $m)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td> {{ $m->courier }}</td>
                                                        <td>
                                                            <form action="/admin/kurir/{{$m->id}}/edit" method="GET">
                                                                @csrf
                                                                <button type="submit" class="btn btn-warning">
                                                                    Edit
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="/admin/kurir/{{$m->id}}/" method="POST">
                                                                @method("DELETE")
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">
                                                                    DELETE
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
@endsection
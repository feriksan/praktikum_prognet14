@extends('layout.da')


@section('content')
            <form action="/admin/kategori" method="POST">
                @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="nama kategori" name="nama_kategori" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </div>
            </form>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 20%">No.</th>
                      <th style="width: 50%">Kategori</th>
                      <th style="width: 15%">Edit</th>
                      <th style="width: 15%">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->category_name }}</td>
                            <td>
                            <form action="/admin/kategori/{{$m->id}}/edit" method="GET">
                                                                @csrf
                                                                <button type="submit" class="btn btn-warning">
                                                                    Edit
                                                                </button>
                                                            </form>
                            </td>
                            <td>
                                <form action="admin/kategori/{{$m->id}}/" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <button class="btn btn-danger" type="submit">
                                        Delete
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        @endsection
   
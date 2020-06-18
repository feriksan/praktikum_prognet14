@extends('layout.da')


@section('content')
            <table class="table table-hover">
                <thead>
                    <th>No</th>
                    <th>Bukti Pembayaran</th>
                    <th>Nama Pembeli</th>
                    <th>Ongkir</th>
                    <th>Total</th>
                    <th>Province</th>
                    <th>Regency</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    
                </thead>
                <tbody>
                    
                    @foreach($index as $index)
                    
                    <tr>
                        <td>{{$index['id']}}</td>
                        <td>
                            @if ($index['proof_of_payment'] == null)
                                <h4>BELUM MENGUPLOAD BUKTI</h4>
                            @else
                                <img src="{{asset('bukti_pembayaran/'.$index['proof_of_payment']) }}" height="50" width="50" alt="img">
                            @endif
                        </td>
                        <td>{{$index['name']}}</td>
                        <td>{{$index['shipping_cost']}}</td>
                        <td>{{$index['total']}}</td>
                        <td>{{$index['province']}}</td>
                        <td>{{$index['regency']}}</td>
                        <td>{{$index['status']}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Ubah Status
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                          <li><a href="/admin/update_status{{$index->id}}">Verified</a></li>
                                          <li><a href="/admin/delivered{{$index->id}}">Delivered</a></li>
                                          <li><a href="/admin/success{{$index->id}}">Success</a></li>
                                        </ul>
                                      </div>
                                <form action="/admin/hapus_pembelian{{$index->id}}" method="GET">
                                    @method("DELETE")
                                    @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
        
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
@endsection
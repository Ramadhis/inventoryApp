@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h3>Data Order</h3>
        
        <a href="{{ route('order.add')}}" class="btn btn-success mb-1" style="float:right;">Add</a>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>id_user</th>
              <th>id_member</th>
              <th>kode_barang</th>
              <th>jumlah</th>
              <th>total_harga</th>
              <th>aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order as $o)
            <tr>
              <td>{{$o->id}}</td>
              <td>{{$o->id_user}}</td>
              <td>{{$o->id_member}}</td>
              <td>{{$o->kode_barang}}</td>
              <td>{{$o->jumlah}}</td>
              <td>{{$o->total_harga}}</td>
              <td>
              <a href="{{ route('order.edit',['id' => $o->id]) }}" class="btn btn-sm btn-primary">Edit</a>
              <a href="{{ route('order.delete',['id' => $o->id]) }}" class="btn btn-sm btn-danger del">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
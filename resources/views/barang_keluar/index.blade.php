@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Order</h1>
    </div>
    <div class="card">
      <div class="card-body">
        @if (session('msg'))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Terjadi Kesalahan</strong> {{ session('msg') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Berhasil.</strong> {{ session('success') }}
        </div>
        @endif
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
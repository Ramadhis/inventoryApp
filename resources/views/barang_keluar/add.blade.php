@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Buat Order</h1>
    </div>
    <div class="card">
      <div class="card-body">
        @if (session('msg'))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Terjadi Kesalahan</strong> {{ session('msg') }}
        </div>
        @endif
        
        @if(isset($order))
        <form method="POST" action="{{ route('order.update')}}">
        @else
        <form method="POST" action="{{ route('order.insert')}}">
        @endif
        @csrf
        <input type="hidden" name="id" value="{{isset($order) ? $order->id : ''}}">
        <div class="col-md-12">
          <div class="row">
            <div class="col-lg-6 col-sm-12 mb-3">
              <label>ID member</label>
              <input type="text" name="id_member" value="{{isset($order) ? $order->id_member : ''}}" class="form-control" required>
            </div>
            <!-- -->
            <div class="col-lg-6 col-sm-12 mb-3">
              <label>Kode Barang</label>
              <input type="text" name="kode_barang" value="{{isset($order) ? $order->kode_barang : ''}}" class="form-control" required>
            </div>
            <!-- -->
            <div class="col-lg-6 col-sm-12 mb-3">
              <label>jumlah</label>
              <input type="text" name="jumlah" value="{{isset($order) ? $order->jumlah : ''}}" class="form-control" required>
            </div>
            <!-- -->
            <div class="col-lg-12 col-sm-12 mb-3">
              <input type="submit" class="btn btn-success mb-1" style="float:right;" value="Submit">
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
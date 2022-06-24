@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h3>Tambah Barang</h3>
        @if(isset($barang))
        <form method="POST" action="{{ route('barang.update')}}">
        @else
        <form method="POST" action="{{ route('barang.insert')}}">
        @endif
        @csrf
        <input type="hidden" name="id" value="{{isset($barang) ? $barang->id : '' }}">
        <div class="col-md-12">
          <div class="row">
            <div class="col-lg-6 col-sm-12 mb-3">
              <label>Nama</label>
              <input type="text" name="nama" value="{{isset($barang) ? $barang->nama : '' }}" class="form-control" required>
            </div>
            <!-- -->
            <div class="col-lg-6 col-sm-12 mb-3">
              <label>harga</label>
              <input type="text" name="harga" value="{{isset($barang) ? $barang->harga : '' }}" class="form-control" required>
            </div>
            <!-- -->
            <div class="col-lg-6 col-sm-12 mb-3">
              <label>jenis</label>
              <input type="text" name="jenis" value="{{isset($barang) ? $barang->jenis : '' }}" class="form-control" required>
            </div>
            <!-- -->
            <div class="col-lg-6 col-sm-12 mb-3">
              <label>kode</label>
              <input type="text" name="kode" value="{{isset($barang) ? $barang->kode : '' }}" class="form-control" required>
            </div>
            <!-- -->
            <div class="col-lg-6 col-sm-12 mb-3">
              <label>warna</label>
              <input type="text" name="warna" value="{{isset($barang) ? $barang->warna : '' }}" class="form-control" required>
            </div>
            <!-- -->
            <div class="col-lg-6 col-sm-12 mb-3">
              <label>ukuran</label>
              <input type="text" name="ukuran" value="{{isset($barang) ? $barang->ukuran : '' }}" class="form-control" required>
            </div>
            <!-- -->
            <div class="col-lg-6 col-sm-12 mb-3">
              <label>jumlah</label>
              <input type="text" name="jumlah" value="{{isset($barang) ? $barang->jumlah : '' }}" class="form-control" required>
            </div>
            <!-- -->
            <div class="col-lg-6 col-sm-12 mb-3">
              <label>tgl_masuk</label>
              <input type="text" name="tgl_masuk" value="{{isset($barang) ? $barang->tgl_masuk : '' }}" class="form-control" required>
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
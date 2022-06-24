@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h3>Data Barang</h3>
        <a href="{{ route('barang.add')}}" class="btn btn-success mb-1" style="float:right;">Add</a>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>id</th>
                <th>nama</th>
                <th>jenis</th>
                <th>kode</th>
                <th>warna</th>
                <th>ukuran</th>
                <th>jumlah</th>
                <th>tgl_masuk</th>
                <th>harga</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($barang as $b)
              <tr>
                <td>{{$b->id}}</td>
                <td>{{$b->nama}}</td>
                <td>{{$b->jenis}}</td>
                <td>{{$b->kode}}</td>
                <td>{{$b->warna}}</td>
                <td>{{$b->ukuran}}</td>
                <td>{{$b->jumlah}}</td>
                <td>{{$b->tgl_masuk}}</td>
                <td>{{$b->harga}}</td>
                <td>
                  <a href="{{ route('barang.edit',['id' => $b->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                  <a href="{{ route('barang.delete',['id' => $b->id]) }}" class="btn btn-sm btn-danger del">Delete</a>
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
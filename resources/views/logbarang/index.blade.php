@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Member</h1>
    </div>
    <div class="card">
      <div class="card-body">
        <a href="{{ route('member.add')}}" class="btn btn-success mb-1" style="float:right;">Export Excel</a>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>id_user</th>
              <th>kode_barang</th>
              <th>status</th>
              <th>jumlah</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>id</td>
              <td>id_user</td>
              <td>kode_barang</td>
              <td>status</td>
              <td>jumlah</td>
            </tr>
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
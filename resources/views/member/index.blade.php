@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Data Member</h1>
    </div>
    <div class="card">
      <div class="card-body">
        <a href="{{ route('member.add')}}" class="btn btn-success mb-1" style="float:right;">Add</a>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($member as $m)
            <tr>
              <td>{{$m->id}}</td>
              <td>{{$m->nama}}</td>
              <td>{{$m->alamat}}</td>
              <td>
              <a href="{{ route('member.edit',['id' => $m->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                <a href="{{ route('member.delete',['id' => $m->id]) }}" class="btn btn-sm btn-danger del">Delete</a>
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
@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h3>Tambah Member</h3>
        
        @if(isset($barang))
        <form method="POST" action="{{ route('member.update')}}">
        @else
        <form method="POST" action="{{ route('member.insert')}}">
        @endif
        
        @csrf
        <input type="hidden" name="id" value="{{isset($member) ? $member->id : '' }}">
        <div class="col-md-12">
          <div class="row">
            <div class="col-lg-12 col-sm-12 mb-3">
              <label>Nama</label>
              <input type="text" name="nama" value="{{isset($member) ? $member->nama : ''}}" class="form-control" required>
            </div>
            <!-- -->
            <div class="col-lg-12 col-sm-12 mb-3">
              <label class="form-label">Alamat</label>
              <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3" required>{{isset($member) ? $member->alamat : ''}}</textarea>
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
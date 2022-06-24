@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
          <!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      Jumlah Order</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_order }}</div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                      Total Pendapatan</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{$total_pendapatan}}</div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

            	<!-- Earnings (Monthly) Card Example -->
            	<div class="col-xl-3 col-md-6 mb-4">
            	    <div class="card border-left-info shadow h-100 py-2">
            	        <div class="card-body">
            	            <div class="row no-gutters align-items-center">
            	                <div class="col mr-2">
            	                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Barang
            	                    </div>
            	                    <div class="row no-gutters align-items-center">
            	                        <div class="col-auto">
            	                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$count_barang}}</div>
            	                        </div>
            	                    </div>
            	                </div>
            	                <div class="col-auto">
            	                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            	                </div>
            	            </div>
            	        </div>
            	    </div>
            	</div>

              <!-- Pending Requests Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-warning shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                      Jumlah Member</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_member}}</div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-users fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

                    <!-- Content Row -->
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat bekerja !
                </div>
            </div>
        </div>
    </div>
@endsection

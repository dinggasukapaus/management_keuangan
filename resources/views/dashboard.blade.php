{{-- fungsi untuk memanggil file di directory layout dengan nama file master.blade.php --}}


@extends('layouts.master')
@section('content')
<div class="row align-items-center py-4">


  </div>
<div class="row">

    <div class="col-xl-3 col-md-6">
      <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Total Pegawai</h5>
              <span class="h2 font-weight-bold mb-0">{{ $pegawai->count() }}</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                <i class="ni ni-circle-08"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm">
            <span class="text-success mr-2"><a href="{{ url('pegawai') }}">selengkapnya</a></span>
            <span class="text-nowrap">...</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Total Distri</h5>
              <span class="h2 font-weight-bold mb-0">{{ $distributor->count() }}</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                <i class="ni ni-delivery-fast"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm">
            <span class="text-success mr-2"><a href="{{ url('sumber-pemasukan') }}">selengkapnya</a></span>
            <span class="text-nowrap">....</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Produksi</h5>
              <span class="h2 font-weight-bold mb-0">{{ $produksi->count() }}</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                <i class="ni ni-money-coins"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm">
            <span class="text-success mr-2"><a href="{{ url('produksi') }}">selengkapnya</a></span>
            <span class="text-nowrap">...</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card card-stats">
        <!-- Card body -->
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">pemasukan</h5>


              <span class="h2 font-weight-bold mb-0">Rp. {{ number_format($pemasukan,0)}}</span>

            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                <i class="ni ni-cloud-upload-96"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-sm">
            <span class="text-success mr-2"><a href="{{ url('pemasukan') }}">selengkapnya</a></span>
            <span class="text-nowrap">....</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">pengeluaran</h5>
                <span class="h2 font-weight-bold mb-0">Rp. {{ number_format($pengeluaran,0)}}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                  <i class="ni ni-cloud-download-95"></i>
                </div>
              </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
              <span class="text-success mr-2"><a href="{{ url('pengeluaran') }}">selengkapnya</a></span>
              <span class="text-nowrap">....</span>
            </p>
          </div>
        </div>
      </div>
  </div>


  @endsection


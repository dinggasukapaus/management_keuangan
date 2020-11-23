@extends('layouts.master')

@section('content')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">tambah pemasukan</li>
        </ol>
      </nav>
    </div>

  </div>
<form action="{{ url('sumber-pemasukan/submit') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1" style="color: black">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan">

          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="color: black">Jumlah</label>
            <input type="text" class="form-control" name="jumlah" id="jumlah">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="color: black">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal>
          </div>

        <div class="form-group">
          <input type="submit" class="btn btn-info" value="simpan" >
        </div>
      </div>

    </div>

  </form>

@endsection

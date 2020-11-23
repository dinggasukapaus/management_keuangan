@extends('layouts.master')

@section('content')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">tambah distributor</li>
        </ol>
      </nav>
    </div>

  </div>
<form action="{{ url('distributor/update/{id}') }}" method="POST">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1" style="color: black">nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="{{$datadistributor->nama}}">

          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="color: black">alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" value="{{$datadistributor->alamat}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="color: black">nomerhp</label>
            <input type="text" class="form-control" name="nomerhp" id="nomerhp" value="{{$datadistributor->nomerhp}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="color: black">jumlahbarang</label>
            <input type="text" class="form-control" name="jumlahbarang" id="jumlahbarang" value="{{$datadistributor->jumlahbarang}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="color: black">totalharga</label>
            <input type="text" class="form-control" name="totalharga" id="totalharga" value="{{$datadistributor->totalharga}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" style="color: black">keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{$datadistributor->keterangan}}">
          </div>

        <div class="form-group">
          <input type="submit" class="btn btn-info" value="simpan" >
        </div>
      </div>

    </div>

  </form>

@endsection

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
<form action="{{ url('sumber-pemasukan/'.$data->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <input value="{{ $data->nama }}" type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="pemasukan ..">
        </div>
        <div class="form-group">
          <input value="{{ $data->nohp }}" type="text" name="nohp" class="form-control" id="exampleFormControlInput1" placeholder="pemasukan ..">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlTextarea2">alamat</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea2" rows="3" resize="none">{{ $data->alamat }}</textarea>
          </div>
        <div class="form-group">
          <input type="submit" class="btn btn-info" value="simpan" >
        </div>
      </div>

    </div>

  </form>

@endsection

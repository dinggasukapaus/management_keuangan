@extends('layouts.master')

@section('content')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ url('sumber-pemasukan') }}">data distributor</a></li>
          <li class="breadcrumb-item active" aria-current="page">edit distributor</li>
        </ol>
      </nav>
    </div>

  </div>
<form action="{{ url('sumber-pemasukan/'.$data->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="row">
      <div class="col">
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlTextarea2">nama</label>
          <input value="{{ $data->nama }}" type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="pemasukan ..">
          @error('nama')
          <div class="alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlTextarea2">no hp</label>
          <input value="{{ $data->nohp }}" type="text" name="nohp" class="form-control" id="exampleFormControlInput1" placeholder="pemasukan ..">
          @error('nohp')
          <div class="alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlTextarea2">alamat</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea2" rows="3" resize="none">{{ $data->alamat }}</textarea>
            @error('alamat')
          <div class="alert-danger">{{ $message }}</div>
          @enderror
          </div>
        <div class="form-group">
          <input type="submit" class="btn btn-info" value="update" >
        </div>
      </div>

    </div>

  </form>

@endsection

@extends('layouts.master')

@section('content')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ url('pegawai') }}">data pegawai</a></li>
          <li class="breadcrumb-item active" aria-current="page">tambah pegawai</li>
        </ol>
      </nav>
    </div>

  </div>
<form action="{{ url('pegawai/add') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col">

        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlTextarea2">nama</label>
          <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="nama...">
          @error('nama')
          <div class="alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlTextarea2">no hp</label>
          <input type="number" name="nohp" class="form-control" id="exampleFormControlInput1" placeholder="masukkan angka">
          @error('nohp')
          <div class="alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlTextarea2">jabatan</label>
          <input type="text" name="jabatan" class="form-control" id="exampleFormControlInput1" placeholder="jabatan">
          @error('jabatan')
          <div class="alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlTextarea2">alamat</label>
            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea2" rows="3" resize="none"></textarea>
            @error('alamat')
          <div class="alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-info" value="simpan" >

        </div>
      </div>


    </div>

  </form>

@endsection

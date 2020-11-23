@extends('layouts.master')

@section('content')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">edit pemasukan</li>
        </ol>
      </nav>
    </div>

  </div>
<form action="{{route('updatepemasukan',['id'=>$sumber->id])}}" method="post">
    @csrf
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label style="color: black" name="keterangan" id="keterangan" >Keterangan</label>
            <input type="text" class="form-control" value="{{$sumber->keterangan}}">

          </div>
          <div class="form-group">
            <label style="color: black" name="jumlah" id="jumlah" >Jumlah</label>
            <input type="text" class="form-control" value="{{$sumber->jumlah}}">
          </div>
          <div class="form-group">
            <label style="color: black" name="tanggal" id="tanggal" >Tanggal</label>
            <input type="date" class="form-control" value="{{$sumber->tanggal}}">
          </div>

        <div class="form-group">
            <button class="btn btn-info" type="submit" value="Simpan Data">Submit</button>
        </div>
      </div>

    </div>

  </form>

@endsection

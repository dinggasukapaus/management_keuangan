@extends('layouts.master')

@section('content')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ url('pertemuan') }}">data pertemuan</a></li>
          <li class="breadcrumb-item active" aria-current="page">edit data pertemuan</li>
        </ol>
      </nav>
    </div>

  </div>
<form action="{{ url('pertemuan/'.$data->pertemuan_id) }}" method="POST">
    @csrf
    @method('put')
    <div class="row">
      <div class="col">
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlInput1">Keterangan</label>
          <input value="{{ $data->keterangan }}" type="text" name="keterangan" class="form-control" id="exampleFormControlInput1" placeholder="keterangan ..">
          @error('keterangan')
          <div class="alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlInput1">Tempat</label>
          <input value="{{ $data->tempat }}" type="text" name="tempat" class="form-control" id="exampleFormControlInput1" placeholder="tempat ..">
          @error('tempat')
          <div class="alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlInput1">Tanggal</label>
          <input name="tanggal" value="{{ date('m/d/Y',strtotime($data->tanggal)) }}" type="text" class="form-control datepicker" autocomplete="off" >

        </div>
        <div class="form-group">
            <label for="example-time-input" class="form-control-label">Waktu</label>
            <input value="{{ date('H:i:s',strtotime($data->waktu)) }}" class="form-control" name="waktu" type="time" id="example-time-input">
          </div>

        <div class="form-group">
          <input type="submit" class="btn btn-info" value="update" >
        </div>
      </div>

    </div>

  </form>

@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
    $(".datepicker").datepicker();
})
</script>

@endsection

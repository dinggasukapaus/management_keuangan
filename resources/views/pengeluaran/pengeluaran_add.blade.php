@extends('layouts.master')

@section('content')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page">tambah pengeluaran</li>
        </ol>
      </nav>
    </div>

  </div>
<form action="{{ url('pengeluaran/add') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col">
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlInput1">Nominal</label>
          <input type="number" name="nominal_luar" class="form-control" id="exampleFormControlInput1" placeholder="100000...">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlInput1">Tanggal</label>
          <input name="tanggal_pengeluaran" type="text" class="form-control datepicker" autocomplete="off" >

        </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlTextarea2">keterangan</label>
            <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea2" rows="3" resize="none"></textarea>
          </div>
        <div class="form-group">
          <input type="submit" class="btn btn-info" value="simpan" >
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

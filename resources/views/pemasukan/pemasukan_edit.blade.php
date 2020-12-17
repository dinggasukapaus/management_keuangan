@extends('layouts.master')

@section('content')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">

      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>

          <li class="breadcrumb-item"><a href="{{ url('pemasukan') }}">data pemasukan</a></li>
          <li class="breadcrumb-item active" aria-current="page">edit pemasukan</li>
        </ol>
      </nav>
    </div>

  </div>
<form action="{{ url('pemasukan/'.$data->pemasukan_id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col">
          <div class="form-group">
              <label class="form-control-label" for="exampleFormControlInput1">Pilih sumber pemasukan</label>
              <select name="sumber_pemasukan_id" class="form-control" id="exampleFormControlSelect1">
                <option selected="" disabled="">Sumber pemasukan</option>
                @foreach ($pemasukan as $pm)
                    <option value="{{ $pm->id }}"{{ ($data->sumber_pemasukan_id ==
                    $pm->id)?'selected': ''}}>{{ $pm->nama }}</option>
                @endforeach
              </select>
            </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlInput1">Nominal</label>
          <input type="number" name="total_pemasukan" value="{{ $data->total_pemasukan }}" class="form-control" id="exampleFormControlInput1" placeholder="100000...">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlInput1">jumlah</label>
          <input type="number" name="jumlah" value="{{ $data->jumlah }}" class="form-control" id="exampleFormControlInput1" placeholder="100000...">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlInput1">Tanggal</label>
          <input name="tanggal" value="{{ date('m/d/Y',strtotime($data->tanggal)) }}" type="text" class="form-control datepicker" autocomplete="off" >

        </div>
        <div class="form-group">
            <label class="form-control-label" for="exampleFormControlTextarea2">keterangan</label>
            <textarea name="keterangan"  class="form-control" id="exampleFormControlTextarea2" rows="3" resize="none">{{  $data->keterangan }}</textarea>
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

@extends('layouts.master')
@section('content')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page">laporan</li>
        </ol>
      </nav>
    </div>
  </div>

  <form method="get" action="{{ url('laporan_cari') }}">
  <div class="row">
      <div class="col">
              <div class="input-daterange datepicker row align-items-center">
                  <div class="col">
                      <div class="form-group">
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i>&nbsp;dari</span>
                                </div>
                                <input name="dari" class="form-control" placeholder="Start date" type="text" >
                            </div>
                        </div>
                    </div>
                    <div class="col">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i>&nbsp;sampai</span>
                        </div>
                        <input name="sampai" class="form-control" placeholder="End date" type="text" >
                    </div>
                </div>

            </div>
        </div>

    </div>
  </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="cari" >

              </div>
        </div>
        <div class="col">
            <div class="form-group">
                <a class="btn btn-danger" href="{{ url('laporan') }}">batal</a>

              </div>
        </div>
    </div>
    @if (isset($pemasukan))


    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="mb-0">data pemasukan</h3>
                    </div>
                    <div class="col-6 text-right">

                    </div>

                  </div>
                </div>
                <!-- Light table -->

                <div class="table-responsive">
                  <table id="table-pemasukan" class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>tanggal</th>
                        <th>nominal</th>
                        <th>sumber</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemasukan as $i=>$item)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ date('d M Y',strtotime($item->tanggal)) }}</td>
                                <td>Rp. {{ number_format($item->total_pemasukan,0) }}</td>
                                <td>{{ $item->nama }}</td>

                            </tr>
                        @endforeach
                            <tr>
                                <td colspan="4">
                                    Total Rp. {{ number_format($pemasukan_total,0) }}
                                </td>
                            </tr>
                    </tbody>


                  </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</form>


  <!-- Modal -->
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
    $(".datepicker").datepicker();
})
</script>

@endsection

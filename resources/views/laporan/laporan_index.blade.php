@extends('layouts.master')
@section('content')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page">laporan</li>

        </ol>
    </nav>
</div>
@if (isset($pemasukan,$pengeluaran))
    <div class="col-lg-6 col-5 text-right">
        <a href="{{ url('export-rekap/'.$dari.'/'.$sampai) }}" class="btn btn-sm btn-success">Export</a>
    </div>
    @endif
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
                        <a href="{{ url('export-pemasukan/'.$dari.'/'.$sampai) }}" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip" data-original-title="export pemasukan">
                            <span class="btn-inner--icon"><i class="ni ni-excel"></i></span>
                    <span class="btn-inner--text">export pemasukan</span>
                          </a>

                    </div>

                  </div>
                </div>
                <!-- Light table -->

                <div class="table-responsive">
                  <table id="table-pemasukan" class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
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
                            <txr>
                                <td colspan="4">
                                    Total Rp.
                                    <strong>
                                        {{ number_format($pemasukan_total,0) }}
                                    </strong>
                                </td>
                            </tr>
                    </tbody>


                  </table>
                </div>
            </div>
        </div>
    </div>
@endif
@if(isset($pengeluaran))

    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                  <div class="row">
                    <div class="col-6">
                      <h3 class="mb-0">data pengeluaran</h3>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ url('export-pengeluaran/'.$dari.'/'.$sampai) }}" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip" data-original-title="export pemasukan">
                            <span class="btn-inner--icon"><i class="ni ni-excel"></i></span>
                    <span class="btn-inner--text">export pengeluaran</span>
                          </a>
                    </div>

                  </div>
                </div>
                <!-- Light table -->

                <div class="table-responsive">
                  <table id="table-pemasukan" class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>tanggal</th>
                        <th>nominal</th>
                        <th>keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengeluaran as $i=>$pl)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ date('d M Y',strtotime($pl->tanggal_pengeluaran)) }}</td>
                                <td>Rp. {{ number_format($pl->nominal_luar,0) }}</td>
                                <td>{{ $pl->keterangan }}</td>

                            </tr>
                        @endforeach
                            <tr>
                                <td colspan="4">
                                    Total Rp. <strong>
                                        {{ number_format($pengeluaran_total,0) }}

                                    </strong>
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

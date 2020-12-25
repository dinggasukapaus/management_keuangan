<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
                            <tr>
                                <td colspan="4">
                                </td>
                            </tr>

                        </tbody>


                  </table>
                </div>
            </div>
        </div>
    </div>
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
                                {{-- space --}}
                            </td>
                        </tr>
                            <tr>
                                <td colspan="4">
                                    Total pemasukan Rp.
                                    <strong>
                                        {{ number_format($pemasukan_total,0) }}
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    Total pengeluaran Rp.
                                    <strong>
                                        {{ number_format($pengeluaran_total,0) }}

                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    {{-- space --}}
                                </td>
                            </tr>
                            @if ($pemasukan_total>=$pengeluaran_total)
                            <tr>
                                <td colspan="4">
                                    Laba Rp.
                                    <strong>
                                        <?php
                                        $laba=$pemasukan_total-$pengeluaran_total;
                                        ?>
                                        {{ number_format($laba,0) }}

                                    </strong>
                                </td>
                            </tr>
                            @endif
                            @if ($pemasukan_total<=$pengeluaran_total)
                            <tr>
                                <td colspan="4">
                                    Rugi Rp.
                                    <strong>
                                        <?php
                                        $rugi=$pemasukan_total-$pengeluaran_total;
                                        ?>
                                        {{ number_format($rugi,0) }}

                                    </strong>
                                </td>
                            </tr>
                            @endif
                    </tbody>


                  </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

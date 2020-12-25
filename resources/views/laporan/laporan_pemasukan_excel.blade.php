<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

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
                        Total Rp.
                        <strong>
                            {{ number_format($pemasukan_total,0) }}
                        </strong>
                    </td>
                </tr>
        </tbody>


      </table>

</body>
</html>

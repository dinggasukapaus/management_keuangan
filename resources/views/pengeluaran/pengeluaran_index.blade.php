@extends('layouts.master')
@section('content')

<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page">data pengeluaran</li>
        </ol>
      </nav>
    </div>

  </div>
<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
      <div class="row">
        <div class="col-6">
          <h3 class="mb-0">data pengeluaran</h3>
        </div>
        <div class="col-6 text-right">
        @role('admin')
          <a href="{{ url('pengeluaran/add') }}" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip" data-original-title="tambah pengeluaran">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
    <span class="btn-inner--text">tambah pengeluaran</span>
          </a>
        @endrole
        </div>

      </div>
    </div>
    <!-- Light table -->
    <div class="table-responsive">
      <table id="table-pemasukan" class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th>No</th>
            <th>Nominal</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            @role('admin')
            <th>aksi</th>
            @endrole
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $i=>$item)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>Rp. {{ number_format($item->nominal_luar,0) }}</td>
                    <td>{{ date('d M Y',strtotime($item->tanggal_pengeluaran)) }}</td>
                    <td>{{ $item->keterangan }}</td>
                    @role('admin')
                    <td>
                        <a href="{{ url('pengeluaran/'.$item->pengeluaran_id.'/edit') }}" class="table-action" data-toggle="tooltip" data-original-title="Edit sumber">
                            <i class="fas fa-user-edit"></i>
                        </a>
                        |
                        <a sumber-id="{{ $item->pengeluaran_id }}" id="btn-hapus" class="table-action table-action-delete" href="{{ url('pengeluaran/'.$item->pengeluaran_id) }}" data-toggle="tooltip" data-original-title="Delete sumber">
                            <i style="color: red" class="fas fa-trash"></i>
                        </a>
                    </td>
                    @endrole
                </tr>
            @endforeach
        </tbody>

      </table>
    </div>

    <!-- Modal -->
<div class="modal fade" id="idmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> info</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda yakin akan menghapus data
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form action="" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary">Save changes</button>

        </form>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')

<script>
    $.fn.dataTable.ext.errMode = 'throw';
    $(document).ready(function(){

    $('body').on('click','#btn-hapus',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        $('#idmodal').find('form').attr('action',url);
        $('#idmodal').modal();
    })

    })
</script>

@endsection


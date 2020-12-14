@extends('layouts.master')
@section('content')

<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">pemasukan</li>
        </ol>
      </nav>
    </div>

  </div>
<div class="card">
    <!-- Card header -->
    <div class="card-header border-0">
      <div class="row">
        <div class="col-6">
          <h3 class="mb-0">data pemasukan</h3>
        </div>
        <div class="col-6 text-right">
          <a href="#" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit product">
            <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
            <span class="btn-inner--text">Export</span>
          </a>
          <a href="{{ url('pemasukan/add') }}" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip" data-original-title="tambah pemasukan">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
    <span class="btn-inner--text">tambah pemasukan</span>
          </a>
        </div>

      </div>
    </div>
    <!-- Light table -->
    <div class="table-responsive">
      <table id="table-pemasukan" class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th>#</th>
            <th>Sumber</th>
            <th>Nominal</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>aksi</th>
          </tr>
        </thead>

      </table>
    </div>
    {{-- <div class="card-footer py-4">
        <nav aria-label="...">
          <ul class="pagination justify-content-end mb-0">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">
                <i class="fas fa-angle-left"></i>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">
                <i class="fas fa-angle-right"></i>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
  </div> --}}
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
        <div class="modal-body">
          anda yakin menghapus
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
        $('#table-pemasukan').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('pemasukan/yajra') }}",
        columns: [
            // or just disable search since it's not really searchable. just add searchable:false
            {data: 'rownum', name: 'rownum'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'nominal', name: 'nominal'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                .on('change', function () {
                    column.search($(this).val(), false, false, true).draw();
                });
            });
        }
    });
    $('body').on('click','#btn-hapus',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        $('#idmodal').find('form').attr('action',url);
        $('#idmodal').modal();
    })

    })
</script>

@endsection


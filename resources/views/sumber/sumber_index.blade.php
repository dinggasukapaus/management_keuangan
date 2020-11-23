@extends('layouts.master')
@section('content')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Keuangan</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-6 col-7 text-right">
        <button onclick="location.href='{{ url('sumber-pemasukan/add') }}';" class="btn btn-icon btn-info" type="button">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">tambah pemasukan</span>
        </button>
      {{-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
    </div>
  </div>

<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Manage sumber pemasukan</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">#</th>
                <th scope="col" class="sort" data-sort="budget">Nama</th>
                <th scope="col" class="sort" data-sort="status">Create At</th>
                <th scope="col"><center>Action</center></th>
              </tr>
            </thead>
            <tbody class="list">
                @foreach ($sumber as $index=>$sb)

                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $sb->nama }}</td>
                    <td>{{ $sb->created_at }}</td>
                    <td>
                        <center>
                            <a href="{{ url('sumber-pemasukan/'.$sb->id) }}">


                                <span>edit</span>
                            </a>
                            |
                            <a sumber-id="{{ $sb->id }}" class="btn-hapus" href="{{ url('sumber-pemasukan/'.$sb->id) }}">


                                <span style="color:red">hapus</span>
                            </a>


                        </center>
                        </td>


                    {{-- <td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </td> --}}
                </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        <!-- Card footer -->
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
        </div> --}}
      </div>
    </div>
  </div>


  <!-- Modal -->
<div class="modal fade" id="idmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">hapus title</h5>
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
<script type="text/javascript">
        $(document).ready(function(){
            $('.btn-hapus').click(function(e){
            e.preventDefault();
            var id =$(this).attr('sumber-id');
            var url = "{{ url('sumber-pemasukan') }}"+'/'+id;
            $('#idmodal').find('form').attr('action',url);
            $('#idmodal').modal();
        })
        })

</script>
@endsection

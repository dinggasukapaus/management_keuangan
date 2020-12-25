@extends('layouts.master')
@section('content')
<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
          <li class="breadcrumb-item"><a href="/home"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page">data distributor</li>
        </ol>
      </nav>
    @if(session('message'))
    <div class="col-lg-12 ml-md ">
        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
    </div>
    @endif
    </div>
  </div>

<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col-6">
                  <h3 class="mb-0">data distributor</h3>
                </div>
                <div class="col-6 text-right">
                    @role('admin')
                  <a href="{{ url('sumber-pemasukan/add') }}" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip" data-original-title="tambah distributor">
                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">tambah distributor</span>
                  </a>
                  @endrole
                </div>
              </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">No</th>
                <th scope="col" class="sort" data-sort="budget">nama</th>
                <th scope="col" class="sort" data-sort="budget">no hp</th>
                <th scope="col" class="sort" data-sort="budget">alamat</th>

                @role('admin')
                <th scope="col"><center>Action</center></th>
                @endrole
              </tr>
            </thead>
            <tbody class="list">
                @foreach ($sumber as $index=>$sb)

                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $sb->nama }}</td>
                    <td>{{ $sb->nohp }}</td>
                    <td>{{ $sb->alamat }}</td>

                    @role('admin')
                    <td class="table-actions">
                        <center>


                            <a href="{{ url('sumber-pemasukan/'.$sb->id.'/edit') }}" class="table-action" data-toggle="tooltip" data-original-title="Edit sumber">
                                <i class="fas fa-user-edit"></i>
                            </a>
                            |
                            <a sumber-id="{{ $sb->id }}" id="btn-hapus" class="table-action table-action-delete" href="{{ url('sumber-pemasukan/'.$sb->id) }}" data-toggle="tooltip" data-original-title="Delete sumber">
                                <i style="color: red" class="fas fa-trash"></i>
                            </a>

                        </center>


                        </td>
                    @endrole



                </tr>
                @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
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
        <div class="modal-body">
            Apakah anda yakin akan menghapus data
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
            $('body').on('click','#btn-hapus',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $('#idmodal').find('form').attr('action',url);
            $('#idmodal').modal();
        })
        })

</script>
@endsection

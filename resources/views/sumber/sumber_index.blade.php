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
        <button onclick="location.href='{{ url('sumber-pengeluaran/add') }}';" class="btn btn-icon btn-info" type="button">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">tambah pengeluaran</span>
        </button>
      {{-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
    </div>
  </div>

<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Manage Sumber Pemasukan</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">No</th>
                <th scope="col" class="sort" data-sort="budget">Keterangan</th>
                <th scope="col" class="sort" data-sort="status">Jumlah</th>
                <th scope="col" class="sort" data-sort="status">Waktu</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="list">
                @foreach ($sumber as $index=>$sb)

                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $sb->keterangan }}</td>
                    <td>{{ $sb->jumlah }}</td>
                    <td>{{ $sb->tanggal }}</td>
                    <th><a href="sumber-pemasukan/edit/{{$sb->id}}" class="btn btn-info">Edit</a>
                        <a href="sumber-pemasukan/delete/{{$sb->id}}" class="btn btn-xs btn-danger" onclick="return confirm('apakah anda yakin?');" >Delete</a>
                    </th>


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

        <div class="row">
            <div class="col">
              <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                  <h3 class="mb-0">Manage Sumber Pengeluaran</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="name">No</th>
                <th scope="col" class="sort" data-sort="budget">Keterangan</th>
                <th scope="col" class="sort" data-sort="status">Jumlah</th>
                <th scope="col" class="sort" data-sort="status">Waktu</th>
                <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($sumberpengeluaran as $index=>$sb)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $sb->keterangan }}</td>
                            <td>{{ $sb->jumlah }}</td>
                            <td>{{ $sb->tanggal }}</td>
                            <th><a href="sumber-pengeluaran/edit/{{$sb->id}}" class="btn btn-info">Edit</a>
                                <a href="sumber-pengeluaran/delete/{{$sb->id}}" class="btn btn-xs btn-danger" onclick="return confirm('apakah anda yakin?');" >Delete</a>
                            </th>

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

@endsection

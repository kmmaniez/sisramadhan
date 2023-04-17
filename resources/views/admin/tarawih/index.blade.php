@extends('layouts.admin')

@section('content')
    
    {{-- <div class="container-fluid px-5"> --}}
        <div class="title text-center mb-5">
            <h1>Kegiatan Tarawih</h1>
            <div class="form-tahun d-flex justify-content-center gap-2 align-items-center">
                <h1>Tahun 2022/1443 H</h1>
                <form action="" method="post">
                    <select name="" id="" style="width: 24px">
                        <option value="2022" style="width: 100px;">2022/1443 H</option>
                        <option value="2021" style="width: 100px;">2021/1442 H</option>
                        <option value="2020" style="width: 100px;">2020/1441 H</option>
                    </select>
                </form>
            </div>
        </div>
        <hr class="mb-4">
        <form action="" method="get" class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-group  d-flex justify-content-start gap-2">
                <input type="text" class="form-control" name="search" id="search" placeholder="Search">
                <button type="submit" class="btn btn-md btn-secondary">Search</button>
            </div>
            <a href="{{ route('tarawih.create') }}" class="btn btn-lg btn-dark">Tambah Data</a>
        </form>
        
        {{-- <h1 class="text-secondary w-25 mx-auto" style="margin-top: 10rem; margin-bottom: 15rem;">Belum Ada Data</h1> --}}
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Kegiatan</th>
                <th scope="col">Nama Imam</th>
                <th scope="col">Nama Pengisi Kultum</th>
                <th scope="col">Nama Bilal</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($tarawih as $data)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }}, {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                  <td>{{ $data->imam->nama_alias }}</td>
                  <td>{{ $data->penceramah->nama_alias }}</td>
                  <td>{{ $data->bilal->nama_alias }}</td>
                  <td>{{ $data->keterangan }}</td>
                  <td>
                    <form action="{{ route('tarawih.destroy', $data->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('tarawih.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <p class="text-center">pagination soon</p> --}}
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              {{-- <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li> --}}
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
        </nav>
        {{-- <a href="/" class="btn btn-lg btn-secondary">Kembali</a> --}}
       
    {{-- </div> --}}

@endsection
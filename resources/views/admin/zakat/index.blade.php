@extends('layouts.admin')

@section('content')
    
    {{-- <div class="container-fluid px-5"> --}}
        <div class="title text-center mb-5">
            <h1>Kegiatan Zakat</h1>
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
            <a href="{{ route('zakat.create') }}" class="btn btn-lg btn-dark">Tambah Data</a>
        </form>
        
        {{-- <h1 class="text-secondary w-25 mx-auto" style="margin-top: 10rem; margin-bottom: 15rem;">Belum Ada Data</h1> --}}
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Kegiatan</th>
                <th scope="col">Nama Penerima Zakat</th>
                <th scope="col">Nama Petugas Zakat</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($zakat as $data)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }}, {{ $data->tgl_kegiatan }}</td>
                  <td>
                    @foreach (json_decode($data->nama_petugas_zakat) as $petugas)
                        {{ $petugas }},
                    @endforeach
                  </td>
                  <td>
                    @foreach (json_decode($data->nama_penerima_zakat) as $penerima)
                        {{ $penerima }},
                    @endforeach
                  </td>
                  <td>{{ $data->keterangan }}</td>
                  <td>
                    <form action="{{ route('zakat.destroy', $data->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('zakat.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <a href="/" class="btn btn-lg btn-secondary">Kembali</a> --}}
       
    {{-- </div> --}}

@endsection
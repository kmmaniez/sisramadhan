@extends('layouts.admin')

@section('title', 'Sholat Ied')
@section('content')
    
    {{-- <div class="container-fluid px-5"> --}}
        <div class="title text-center mb-5">
            <h1>Kegiatan Sholat Ied</h1>
        </div>
        <hr class="mb-4">
        <form action="" method="get" class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-group  d-flex justify-content-start gap-2">
                <input type="text" class="form-control" name="search" id="search" placeholder="Search" value="{{ old('search', request('search')) }}">
                <button type="submit" class="btn btn-md btn-secondary">Search</button>
            </div>
            <a href="{{ route('sholatied.create') }}" class="btn btn-lg btn-dark">Tambah Data</a>
        </form>
        
        {{-- <h1 class="text-secondary w-25 mx-auto" style="margin-top: 10rem; margin-bottom: 15rem;">Belum Ada Data</h1> --}}
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Kegiatan</th>
                <th scope="col">Tempat Sholat Ied</th>
                <th scope="col">Keterangan</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @if (empty($resultSearch[0]))
                    @foreach ($sholatied as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }}, {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                        <td>{{ $data->tmpt_sholat }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <form action="{{ route('sholatied.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('sholatied.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    @foreach ($resultSearch[0] as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }}, {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                        <td>{{ $data->tmpt_sholat }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <form action="{{ route('sholatied.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('sholatied.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        {{-- <a href="/" class="btn btn-lg btn-secondary">Kembali</a> --}}
       
    {{-- </div> --}}

@endsection
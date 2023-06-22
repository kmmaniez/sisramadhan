@extends('layouts.admin')

@section('title', 'Takbiran')
@section('content')

    <div class="title text-center mb-5">
        <h1>Kegiatan Takbiran</h1>
    </div>
    <hr class="mb-4">
    <form action="" method="get" class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-group  d-flex justify-content-start gap-2">
            <input type="text" class="form-control" name="search" id="search" placeholder="Search" value="{{ request('search') }}">
            <button type="submit" class="btn btn-md btn-secondary">Search</button>
        </div>
        <a href="{{ route('takbiran.create') }}" class="btn btn-lg btn-dark">Tambah Data</a>
    </form>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Kegiatan</th>
                <th scope="col">Nama Donatur Konsumsi</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @if (empty($resultSearch[0]))
                @foreach ($takbiran as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }},
                            {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                        <td style="width:700px">
                            @foreach ($data->wargas()->get() as $list)
                                <span>{{ $list->nama_alias }}, </span>
                            @endforeach
                        </td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <form action="{{ route('takbiran.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('takbiran.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('hapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                @foreach ($resultSearch[0] as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }},
                            {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                        <td style="width:700px">
                            @foreach ($data->wargas()->get() as $list)
                                <span>{{ $list->nama_alias }}, </span>
                            @endforeach
                        </td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <form action="{{ route('takbiran.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('takbiran.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('hapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection

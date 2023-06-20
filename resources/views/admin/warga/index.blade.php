@php
    $DateConv = new Hijri_GregorianConvert;
    @endphp
@extends('layouts.admin')

@section('title', 'Warga')
@section('content')
    
    <div class="title text-center mb-5">
        <h1>Daftar Warga</h1>
        <h2>Tahun {{ date('Y') }}/<?= $DateConv->GregorianToHijri(date('Y'),'YYYY'). 'H'; ?></h2>
    </div>
    <hr class="mb-4">
    <form action="" method="get" class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-group  d-flex justify-content-start gap-2">
            <input type="text" class="form-control" name="search" id="search" placeholder="Search" value="{{ old('search', request('search')) }}">
            <button type="submit" class="btn btn-md btn-secondary">Search</button>
        </div>
        <a href="{{ route('warga.create') }}" class="btn btn-lg btn-dark">Tambah Data</a>
    </form>
    
    {{-- <h1 class="text-secondary w-25 mx-auto" style="margin-top: 10rem; margin-bottom: 15rem;">Belum Ada Data</h1> --}}
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">No</th>
            {{-- <th scope="col">Nama Keluarga</th> --}}
            <th scope="col">Nama Asli</th>
            <th scope="col">Nama Alias</th>
            <th scope="col">Alamat</th>
            <th scope="col">Nomor Hp</th>
            <th scope="col">Email</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
            @if (empty($resultSearch[0]))
                @foreach ($warga as $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->nama_asli }}</td>
                    <td>{{ $data->nama_alias }}</td>
                    <td>RT {{ $data->rt }} | RW {{ $data->rw }}</td>
                    <td>{{ $data->nomor_hp }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        <form action="{{ route('warga.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('warga.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @else
                @foreach ($resultSearch[0] as $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->nama_asli }}</td>
                    <td>{{ $data->nama_alias }}</td>
                    <td>RT {{ $data->rt }} | RW {{ $data->rw }}</td>
                    <td>{{ $data->nomor_hp }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        <form action="{{ route('warga.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('warga.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    @if (empty(request('search')))
        {{ $warga->links() }}
    @endif

@endsection
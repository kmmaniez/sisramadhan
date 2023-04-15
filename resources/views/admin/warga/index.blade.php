@extends('layouts.admin')

@section('content')
    
    <div class="title text-center mb-5">
        <h1>Daftar Warga</h1>
        <h2>Tahun 2022/1443 H</h2>
    </div>
    <hr class="mb-4">
    <form action="" method="get" class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-group  d-flex justify-content-start gap-2">
            <input type="text" class="form-control" name="search" id="search" placeholder="Search">
            <button type="submit" class="btn btn-md btn-secondary">Search</button>
        </div>
        <a href="{{ route('warga.create') }}" class="btn btn-lg btn-dark">Tambah Data</a>
    </form>
    
    {{-- <h1 class="text-secondary w-25 mx-auto" style="margin-top: 10rem; margin-bottom: 15rem;">Belum Ada Data</h1> --}}
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Keluarga</th>
            <th scope="col">Nama Asli | Alias</th>
            <th scope="col">Alamat</th>
            <th scope="col">Nomor Hp</th>
            <th scope="col">Email</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <td>1</td>
                <td>Keluarga Bambang</td>
                <td>Bambang Suryanto | Bambang</td>
                <td>Bogor | RT 4 | RW 2</td>
                <td>08162721611</td>
                <td>bambang@mail.com</td>
                <td>
                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Keluarga Aminah</td>
                <td>Aminah Putri | Aminah</td>
                <td>Jakarta | RT 4 | RW 2</td>
                <td>087128122</td>
                <td>aminah@mail.com</td>
                <td>
                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                </td>
            </tr>
                
        </tbody>
    </table>

    <a href="/" class="btn btn-lg btn-secondary">Kembali</a>

@endsection
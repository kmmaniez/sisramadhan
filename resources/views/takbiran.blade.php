@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="title text-center">
            <h1>Agenda Takbiran</h1>
            <h2>Tahun 2022/1443 H</h2>
        </div>
        <a href="/" class="btn btn-lg btn-secondary mb-4 mt-5">Kembali</a>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Kegiatan</th>
                <th scope="col">Nama Donatur Konsumsi</th>
                <th scope="col">Keterangan</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <tr>
                <th scope="row">1</th>
                <td>{{ date('d-m-Y') }}</td>
                <td>Ibu Siti</td>
                <td>-</td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection
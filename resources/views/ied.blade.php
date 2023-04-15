@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="title text-center">
            <h1>Agenda Kegiatan Sholat Ied</h1>
        </div>
        <a href="/" class="btn btn-lg btn-secondary mb-4 mt-5">Kembali</a>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Kegiatan</th>
                <th scope="col">Tempat Sholat Idul Fitri</th>
                <th scope="col">Keterangan</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <tr>
                <th scope="row">1</th>
                <td>{{ date('d-m-Y') }}</td>
                <td>Masjid</td>
                <td>-</td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection
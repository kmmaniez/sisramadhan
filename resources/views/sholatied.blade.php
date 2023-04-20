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
              @foreach ($sholatied as $data)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }}, {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                <td>{{ $data->tmpt_sholat }}</td>
                <td>{{ $data->keterangan }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
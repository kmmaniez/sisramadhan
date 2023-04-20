@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="title text-center">
            <h1>Agenda Kegiatan TPA bulan Ramadhan</h1>
            <h2>Tahun 2022/1443 H</h2>
        </div>
        <a href="/" class="btn btn-lg btn-secondary mb-4 mt-5">Kembali</a>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Kegiatan</th>
                <th scope="col">Nama Pengajar</th>
                <th scope="col">Sesi Pengajar</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach ($tpa as $data)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ Carbon::parse($data->tgl_masehi)->translatedFormat('l') }}, {{ Carbon::parse($data->tgl_masehi)->translatedFormat('d F Y') }}</td>
                  <td>{{ $data->ustadh->nama }}</td>
                  <td>{{ $data->keterangan }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
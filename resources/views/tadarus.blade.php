@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="title text-center">
            <h1>Agenda Kegiatan Tadarus</h1>
            <h2>Tahun 2022/1443 H</h2>
        </div>
        <a href="/" class="btn btn-lg btn-secondary mb-4 mt-5">Kembali</a>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kelompok Tadarus</th>
                <th scope="col">Jumlah Khatam</th>
                <th scope="col">Keterangan</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach ($tadarus as $data)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $data->nama_kelompok }}</td>
                  <td>{{ $data->jumlah_khatam }}</td>
                  <td> Anggota yang aktif
                     @foreach (json_decode($data->nama_warga) as $key => $warga)
                        {{ $warga }},
                    @endforeach
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
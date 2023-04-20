@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="title text-center">
            <h1>Agenda Kegiatan Konsumsi Ramadhan</h1>
            <h2>Tahun 2022/1443 H</h2>
        </div>
        <a href="/" class="btn btn-lg btn-secondary mb-4 mt-5">Kembali</a>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Kegiatan</th>
                <th scope="col">Nama Donatur Takjil</th>
                <th scope="col">Nama Donatur Jabur</th>
                <th scope="col">Nama Donatur Bukber</th>
                <th scope="col">Keterangan</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach ($konsumsi as $data)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }}, {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                  <td class="d-flex flex-column">
                    @foreach (json_decode($data->warga_takjil) as $key => $donaturtakjil )
                      <span>{{ $donaturtakjil }}, </span>
                    @endforeach
                  </td>
                  <td class="">
                    @foreach (json_decode($data->warga_jabur) as $key => $donaturjabur)
                      <span>{{ $donaturjabur }}, </span>
                    @endforeach
                  </td>
                  <td class="">
                      @if (is_null(json_decode($data['warga_bukber'])))
                        <p>-</p>
                      @else
                        @foreach (json_decode($data->warga_bukber) as $key => $donaturbukber)
                          <span>{{ $donaturbukber }}, </span>
                        @endforeach
                      @endif
                  </td>
                  <td>{{ $data->keterangan }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
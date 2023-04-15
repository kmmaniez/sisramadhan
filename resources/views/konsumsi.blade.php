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
              <tr>
                <th scope="row">1</th>
                <td>{{ date('D') }},{{ date('d-m-Y') }}</td>
                <td>Bapak Idar</td>
                <td>Bapak Sodiq</td>
                <td>Bapak Irul</td>
                <td>-</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>{{ date('D') }},{{ date('d-m-Y') }}</td>
                <td>Bapak Idar, Bapak Ahmad</td>
                <td>Bapak Sodiq, Bapak Ibnu</td>
                <td>Bapak Agus</td>
                <td>-</td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection
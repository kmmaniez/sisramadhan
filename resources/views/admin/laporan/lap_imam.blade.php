@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <div class="title text-center mb-5">
            <h1>Jadwal Imam & Bilal</h1>
            <h2>Tahun 2022/1443 H</h2>
        </div>
        <hr class="mb-4">
        <a href="/admin" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <div class="box" style="max-height: 500px; overflow-y: scroll;">
          <table class="table table-striped">
              <thead style="position: sticky; top:0;">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Tanggal Kegiatan</th>
                  <th scope="col">Nama Donatur Takjil</th>
                  <th scope="col">Nama Donatur Jabur</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <tr>
                  <th scope="row">1</th>
                  <td>Rabu, 20 April 2022</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
              </tbody>
              {{-- <tbody class="table-group-divider">
                @foreach ($warga as $data)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $data->nama_keluarga }}</td>
                  <td>{{  $data->nama_asli }}</td>
                  <td>{{  $data->alamat }}</td>
                  <td>{{  $data->nomor_hp }}</td>
                  <td>{{  $data->email }}</td>
                </tr>
                @endforeach
              </tbody> --}}

          </table>

        </div>
        
        <a href="/admin/lap-imam/cetak" class="btn btn-lg btn-dark mt-5">Ektrak pdf</a>
    </div>

@endsection
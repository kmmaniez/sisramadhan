@extends('layouts.admin')

@section('title', 'Laporan Imam')
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
                    @foreach ($listkonsumsi as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }},
                                {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                            <td>
                                @if (is_null(json_decode($data->warga_takjil)))
                                    <p>-</p>
                                @else
                                    @foreach (json_decode($data->warga_takjil) as $key => $donaturtakjil)
                                        <span>{{ $donaturtakjil }}, </span>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (is_null(json_decode($data->warga_jabur)))
                                    <p>-</p>
                                @else
                                    @foreach (json_decode($data->warga_jabur) as $key => $donaturjabur)
                                        <span>{{ $donaturjabur }}, </span>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <a href="/admin/lap-imam/cetak" class="btn btn-lg btn-dark mt-5">Ektrak pdf</a>
    </div>

@endsection

@php
    $DateConv = new Hijri_GregorianConvert;
    $format="YYYY/MM/DD";
    $listTahun = [];
    for ($i=0; $i < 3; $i++) { 
        array_push($listTahun, date('Y') - $i);
    }
@endphp
@extends('layouts.admin')

@section('title', 'Laporan Konsumsi')
@section('content')

    <div class="container">
        <div class="title text-center mb-5">
            <h1>Jadwal Konsumsi</h1>
            <h2>Tahun <span id="masehi">{{ date('Y') }}</span>/<span id="hijri"><?= $DateConv->GregorianToHijri(date('Y'),'YYYY'); ?></span>H</h2>
        </div>
        <hr class="mb-4">
        <a href="/admin" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Kegiatan</th>
                    <th scope="col">Nama Donatur Takjil</th>
                    <th scope="col">Nama Donatur Jabur</th>
                    <th scope="col">Nama Donatur Buka Bersama</th>
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
                                    <span>{{ $donaturtakjil }}, </span>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if (is_null(json_decode($data['warga_bukber'])))
                                <p>-</p>
                            @else
                                @foreach (json_decode($data->warga_bukber) as $key => $donaturbukber)
                                    <span>{{ $donaturbukber }}, </span>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="/admin/lap-konsumsi/cetak" class="btn btn-lg btn-dark mt-5">Ektrak pdf</a>
    </div>

@endsection

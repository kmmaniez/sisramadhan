@php
    $DateConv = new Hijri_GregorianConvert();
    $format = 'YYYY/MM/DD';
    $listTahun = [];
    for ($i = 0; $i < 3; $i++) {
        array_push($listTahun, date('Y') - $i);
    }
@endphp
@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="title text-center">
            <h1>Agenda Kegiatan Konsumsi Ramadhan</h1>
            <h2>Tahun <span id="masehi">{{ date('Y') }}</span>/<span id="hijri"><?= $DateConv->GregorianToHijri(date('Y'), 'YYYY') ?></span>H</h2>
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
                @foreach ($konsumsis as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }}, {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                        <td>
                            @forelse ($data->takjils()->get() as $key => $donaturtakjil)
                                <span>{{ $donaturtakjil->nama_alias }}, </span>
                            @empty
                                <span>-</span>
                            @endforelse
                        </td>
                        <td>
                            @forelse ($data->jaburs()->get() as $key => $donaturjabur)
                            <span>{{ $donaturjabur->nama_alias }}, </span>
                        @empty
                            <span>-</span>
                        @endforelse
                        </td>
                        <td>
                            @forelse ($data->bukbers()->get() as $key => $donaturbukber)
                            <span>{{ $donaturbukber->nama_alias }}, </span>
                        @empty
                            <span>-</span>
                        @endforelse
                        </td>
                        <td>{{ $data->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

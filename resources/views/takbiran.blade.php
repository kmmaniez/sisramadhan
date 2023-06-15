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
            <h1>Agenda Takbiran</h1>
            <h2>Tahun <span id="masehi">{{ date('Y') }}</span>/<span id="hijri"><?= $DateConv->GregorianToHijri(date('Y'), 'YYYY') ?></span>H</h2>
        </div>
        <a href="/" class="btn btn-lg btn-secondary mb-4 mt-5">Kembali</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Kegiatan</th>
                    <th scope="col">Nama Donatur Konsumsi</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($takbiran as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }},
                            {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                        <td>
                            {{-- @foreach ($data->wargas()->get() as $list)
                                {{ $list->nama_alias }},
                            @endforeach --}}
                        </td>
                        <td>{{ $data->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

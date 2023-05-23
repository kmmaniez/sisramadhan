@php
    $DateConv = new Hijri_GregorianConvert;
    $format="YYYY/MM/DD";
    $listTahun = [];
    for ($i=0; $i < 3; $i++) { 
        array_push($listTahun, date('Y') - $i);
    }
@endphp
@extends('layouts.admin')

@section('title', 'Laporan Imam')
@section('content')

    <div class="container">
        <div class="title text-center mb-5">
            <h1>Jadwal Imam & Bilal</h1>
            <h2>Tahun <span id="masehi">{{ date('Y') }}</span>/<span id="hijri"><?= $DateConv->GregorianToHijri(date('Y'),'YYYY'); ?></span>H</h2>
        </div>
        <hr class="mb-4">
        <a href="/admin" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <div class="box" style="max-height: 500px; overflow-y: scroll;">
            <table class="table table-striped">
                <thead style="position: sticky; top:0; background-color: #fff">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Kegiatan</th>
                        <th scope="col">Nama Imam</th>
                        <th scope="col">Nama Bilal</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($listtarawih as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }},
                                {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                            <td>{{ $data->imam->nama_alias }}</td>
                            <td>{{ $data->bilal->nama_alias }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <a href="/admin/lap-imam/cetak" class="btn btn-lg btn-dark mt-5">Ektrak pdf</a>
    </div>

@endsection

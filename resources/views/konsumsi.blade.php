@php
    $DateConv = new Hijri_GregorianConvert;
    $format="YYYY/MM/DD";
    $listTahun = [];
    for ($i=0; $i < 3; $i++) { 
        array_push($listTahun, date('Y') - $i);
    }
@endphp
@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="title text-center">
            <h1>Agenda Kegiatan Konsumsi Ramadhan</h1>
            <h2>Tahun <span id="masehi">{{ date('Y') }}</span>/<span id="hijri"><?= $DateConv->GregorianToHijri(date('Y'),'YYYY'); ?></span>H</h2>
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
                        <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }},
                            {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                        <td class="">
                            {{-- @if (is_null(json_decode($data['warga_takjil'])))
                                <p>-</p>
                            @else
                                @foreach (json_decode($data->warga_takjil) as $key => $donaturtakjil)
                                    <span>{{ $donaturtakjil }}, </span>
                                @endforeach
                            @endif --}}
                            @if (!count($data->takjils()->get()) > 0)
                                <span>-</span>
                            @endif
                            @foreach ($data->takjils()->get() as $key => $donaturtakjil)
                                <span>{{ $donaturtakjil->nama_alias }}, </span>
                            @endforeach
                        </td>
                        <td class="">
                            {{-- @if (is_null(json_decode($data['warga_jabur'])))
                                <p>-</p>
                            @else
                                @foreach (json_decode($data->warga_jabur) as $key => $donaturjabur)
                                    <span>{{ $donaturjabur }}, </span>
                                @endforeach
                            @endif --}}
                            @if (!count($data->jaburs()->get()) > 0)
                                <span>-</span>
                            @endif
                            @foreach ($data->jaburs()->get() as $key => $donaturjabur)
                                <span>{{ $donaturjabur->nama_alias }}, </span>
                            @endforeach
                        </td>
                        <td class="">
                            {{-- @if (is_null(json_decode($data->warga_bukber)))
                                <p>-</p>
                            @else
                                @foreach (json_decode($data->warga_bukber) as $key => $donaturbukber)
                                    <span>{{ $donaturbukber }}, </span>
                                @endforeach
                            @endif --}}
                            @if (!count($data->bukbers()->get()) > 0)
                                <span>-</span>
                            @endif
                            @foreach ($data->bukbers()->get() as $key => $donaturbukber)
                                <span>{{ $donaturbukber->nama_alias }}, </span>
                            @endforeach
                        </td>
                        <td>{{ $data->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
@php
    $DateConv = new Hijri_GregorianConvert;
@endphp
@extends('layouts.admin')

@section('title', 'TPA')
@section('content')
    
        <div class="title text-center mb-5">
            <h1>Jadwal Ustad/zah Pengajar TPA HIDAYATUL FALAH</h1>
            <h1>Tahun {{ date('Y') }}/<?= $DateConv->GregorianToHijri(date('Y'),'YYYY'). 'H'; ?></h1>
        </div>
        <hr class="mb-4">
        <form action="" method="get" class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('tpa.create') }}" class="btn btn-lg btn-dark">Tambah Data</a>
        </form>
        
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Senin</th>
                <th scope="col">Selasa</th>
                <th scope="col">Rabu</th>
                <th scope="col">Kamis</th>
                <th scope="col">Jum'at</th>
                <th scope="col">Sabtu</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>
                        @foreach ($jadwal['senin'] as $key => $value)
                        <p>{{ $value->nama }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($jadwal['selasa'] as $key => $value)
                        <p>{{ $value->nama }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($jadwal['rabu'] as $key => $value)
                        <p>{{ $value->nama }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($jadwal['kamis'] as $key => $value)
                        <p>{{ $value->nama }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($jadwal['jumat'] as $key => $value)
                        <p>{{ $value->nama }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($jadwal['sabtu'] as $key => $value)
                        <p>{{ $value->nama }}</p>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>

@endsection
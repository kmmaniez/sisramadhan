@php
    $DateConv = new Hijri_GregorianConvert;
    $format="YYYY/MM/DD";
    $listTahun = [];
    for ($i=0; $i < 3; $i++) { 
        array_push($listTahun, date('Y') - $i);
    }
@endphp
@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <div class="title text-center mb-5">
            <h1>Kegiatan Zakat</h1>
            <h2>Tahun {{ date('Y') }}/<?= $DateConv->GregorianToHijri(date('Y'),'YYYY'). 'H'; ?></h2>
        </div>
        <hr class="mb-5">
        <a href="{{ route('zakat.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <form action="{{ route('zakat.update', $zakat->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ old('tanggal', $zakat->tgl_kegiatan) }}">
            </div>
            {{-- @dump($zakat->nama_penerima_zakat) --}}
            <div class="form-group">
                <label for="penerima" class="form-label">Penerima Zakat</label>
                <input type="text" class="form-control" name="penerima" id="penerima" value="{{ $penerima }}">
            </div>
            
            <div class="form-group">
                <label for="petugas" class="form-label">Petugas Zakat</label>
                <input type="text" class="form-control" name="petugas" id="petugas" value="{{ $petugas }}">
            </div>

            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="" rows="5" class="form-control">{{ $zakat->keterangan }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>

@endsection
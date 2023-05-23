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
            <h1>Tambah Data Tarawih</h1>
            <div class="form-tahun d-flex justify-content-center gap-2 align-items-center">
                <h1>Tahun <span id="masehi">{{ date('Y') }}</span>/<span id="hijri"><?= $DateConv->GregorianToHijri(date('Y'),'YYYY'); ?></span>H</h1>
            </div>
        </div>
        <hr class="mb-5">
        <a href="{{ route('tarawih.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <form action="{{ route('tarawih.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal">
            </div>
            <div class="form-group mb-3">
                <label for="id_imam" class="form-label">Nama Imam</label>
                <select class="form-select" name="id_imam" id="id_imam">
                    <option value="" selected style="display: none;">Pilih imam</option>
                    @foreach ($warga as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="id_penceramah" class="form-label">Nama Pengisi Kultum</label>
                <select class="form-select" name="id_penceramah" id="id_penceramah">
                    <option value="" selected style="display: none;">Pilih penceramah</option>
                    @foreach ($warga as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="id_bilal" class="form-label">Nama Bilal</label>
                <select class="form-select" name="id_bilal" id="id_bilal">
                    <option value="" selected style="display: none;">Pilih bilal</option>
                    @foreach ($warga as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="10" rows="5" class="form-control"></textarea>
            </div>
            
            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>

@endsection
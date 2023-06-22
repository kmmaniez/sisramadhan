@php
    $DateConv = new Hijri_GregorianConvert;
@endphp
@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <div class="title text-center mb-5">
            <h1>Tambah Data Sholat Ied</h1>
            <h2>Tahun  {{ date('Y') }}/<?= $DateConv->GregorianToHijri(date('Y'),'YYYY'). 'H'; ?></h2>
        </div>
        <hr class="mb-4">
        <a href="{{ route('sholatied.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <form action="{{ route('sholatied.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal">
            </div>
            
            <div class="form-group mb-3">
                <label for="tempat" class="form-label">Tempat Sholat Ied</label>
                <input type="text" class="form-control" name="tempat" id="tempat">
            </div>

            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="10" rows="5" class="form-control">
    
                </textarea>
            </div>
            
            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>

@endsection
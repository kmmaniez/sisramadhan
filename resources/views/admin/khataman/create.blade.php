@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <div class="title text-center mb-5">
            <h1>Tambah Data Khataman & Nuzulul Quran</h1>
            <h2>Tahun 2022/1443 H</h2>
        </div>
        <hr class="mb-5">
        <a href="{{ route('khataman.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <form action="{{ route('khataman.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" id="tanggal">
            </div>
            <div class="form-group mb-3">
            <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                <input type="text" class="form-control" name="jenis_kegiatan" id="jenis_kegiatan" value="Khataman nuzulul" disabled>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="10" rows="5" class="form-control"></textarea>
            </div>
            
            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>

@endsection
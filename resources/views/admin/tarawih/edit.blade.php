@php
    $DateConv = new Hijri_GregorianConvert();
    $format = 'YYYY/MM/DD';
    $listTahun = [];
    for ($i = 0; $i < 3; $i++) {
        array_push($listTahun, date('Y') - $i);
    }
@endphp
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="title text-center mb-5">
            <h1>Tambah Data Tarawih</h1>
            <h2>Tahun {{ date('Y') }}/<?= $DateConv->GregorianToHijri(date('Y'), 'YYYY') . 'H' ?></h2>
        </div>
        <hr class="mb-5">
        <a href="{{ route('tarawih.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <form action="{{ route('tarawih.update', $tarawih->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal"
                    value="{{ old('tanggal', $tarawih->tgl_kegiatan) }}">
            </div>
            <div class="form-group mb-3">
                <label for="id_imam" class="form-label">Nama Imam</label>
                <select class="form-select" name="id_imam" id="id_imam">
                    @foreach ($usersImam as $key => $value)
                        @if (old('id_imam', $tarawih->imam->id) == $value->id)
                            <option value="{{ $value->id }}" selected>{{ $tarawih->imam->nama_alias }}</option>
                        @else
                            <option value="{{ $value->id }}">{{ $value->nama_alias }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="id_penceramah" class="form-label">Nama Pengisi Kultum</label>
                <select class="form-select" name="id_penceramah" id="id_penceramah">
                    @foreach ($usersPenceramah as $key => $value)
                        @if (old('id_penceramah', $tarawih->penceramah->id) == $value->id)
                            <option value="{{ $value->id }}" selected>{{ $tarawih->penceramah->nama_alias }}</option>
                        @else
                            <option value="{{ $value->id }}">{{ $value->nama_alias }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="id_bilal" class="form-label">Nama Bilal</label>
                <select class="form-select" name="id_bilal" id="id_bilal">
                    @foreach ($usersBilal as $key => $value)
                        @if (old('id_bilal', $tarawih->bilal->id) == $value->id)
                            <option value="{{ $value->id }}" selected>{{ $tarawih->bilal->nama_alias }}</option>
                        @else
                            <option value="{{ $value->id }}">{{ $value->nama_alias }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="10" rows="5" class="form-control">{{ old('keterangan', $tarawih->keterangan) }}</textarea>
            </div>

            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>
@endsection

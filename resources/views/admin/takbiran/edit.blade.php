@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <div class="title text-center mb-5">
            <h1>Tambah Data Takbiran</h1>
        </div>
        <hr class="mb-4">
        <a href="{{ route('takbiran.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>
        <form action="{{ route('takbiran.update', $takbiran->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ old('tanggal', $takbiran->tgl_kegiatan) }}">
            </div>
            <div class="form-group mb-3">
                <label for="id_warga" class="form-label">Nama Donatur Konsumsi</label>
                <select class="form-select" name="id_warga" id="id_warga">
                    @foreach ($warga as $data)
                        @if (old('id_warga', $takbiran->warga->id ) == $data->id)
                            <option value="{{ $data->id }}" selected>{{ $takbiran->warga->nama_alias }}</option>
                        @else
                            <option value="{{ $data->id }}">{{ $data->nama_alias }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="10" rows="5" class="form-control">{{ old('keterangan', $takbiran->keterangan) }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>

@endsection
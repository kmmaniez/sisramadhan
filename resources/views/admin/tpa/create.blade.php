@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <div class="title text-center mb-5">
            <h1>Menambah Kegiatan TPA</h1>
            <h2>Tahun 2022/1443 H</h2>
        </div>
        <a href="{{ route('tpa.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <form action="{{ route('tpa.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal">
            </div>
            <div class="form-group mb-3">
                <label for="listhari" class="form-label">Pilih Hari</label>
                <select class="form-select" name="listhari" id="listhari" aria-label="Default select example">
                    @foreach ($listhari as $hari)
                        <option value="{{ $hari->id }}">{{ $hari->nama_hari }}</option>
                    @endforeach
                </select>
            </div>
            {{-- @dd($listustadh) --}}
            <div class="form-group mb-3">
                <label for="listustadh" class="form-label">Pilih Ustadz/Ustadzah</label>
                <select class="form-select" name="listustadh" id="listustadh" aria-label="Default select example">
                    @foreach ($listustadh as $data)
                        <option value="{{ $data->id }}">@if ($data->jenis_kelamin === 'wanita') Ustadzah @else Ustadz @endif {{ $data->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="contoh: Mengajar iqra">
            </div>

            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>

@endsection
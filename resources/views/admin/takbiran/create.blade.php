@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <div class="title text-center mb-5">
            <h1>Tambah Data Takbiran</h1>
        </div>
        <hr class="mb-4">
        <a href="{{ route('takbiran.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <form action="{{ route('takbiran.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" id="tanggal">
            </div>
            <div class="form-group mb-3">
                <label for="wargakonsumsi" class="form-label">Nama Donatur Konsumsi</label>
                <select class="form-select wargakonsumsi" id="wargakonsumsi" multiple="multiple" name="wargakonsumsi[]"
                    aria-label="Default select example">
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

@push('script')
    <script>

        $('.wargakonsumsi').select2({
            placeholder: "Pilih anggota",
            allowClear: true
        });

    </script>
@endpush
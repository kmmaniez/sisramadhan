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
            <h1>Tambah Data Tadarus</h1>
            <h2>Tahun {{ date('Y') }}/<?= $DateConv->GregorianToHijri(date('Y'),'YYYY'). 'H'; ?></h2>
        </div>
        <hr class="mb-4">
        <a href="{{ route('tadarus.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <form action="{{ route('tadarus.store') }}" method="post">
            @csrf
            <div class="form-group mb-3 d-flex justify-content-start align-items-center gap-4">
                <label for="jumlah_khatam" class="form-label">Jumlah Khataman</label>
                <select class="form-select mb-2" id="jumlah_khatam" name="jumlah_khatam" style="width: 100px" aria-label="Default select example">
                    @foreach ($listJuz as $juz)
                        <option value="{{ $juz }}">{{ $juz }}</option>
                    @endforeach
                </select>
            </div>
            {{-- @dump($listJuz) --}}
            <div class="form-group mb-3">
                <label for="nama_kelompok" class="form-label">Nama Kelompok Tadarus</label>
                <input type="text" class="form-control" name="nama_kelompok" id="nama_kelompok">
                {{-- <select class="form-select mb-2" name="listkelompok" aria-label="Default select example">
                    @foreach ($listkelompok as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                        
                    @endforeach
                </select> --}}
            </div>
            <div class="form-group mb-3">
                <label for="anggota" class="form-label">Anggota Aktif</label>
                <select class="form-select select-anggota" id="anggota" multiple="multiple" name="anggota[]" aria-label="Default select example">
                    @foreach ($warga as $key => $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                       
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select-anggota').select2({
                placeholder: "Pilih anggota",
                allowClear: true
            });

        });
    </script>
@endpush
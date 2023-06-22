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
    <div class="container mb-5">
        <div class="title text-center mb-5">
            <h1>Tambah Data Kelola Konsumsi</h1>
            <h2>Tahun {{ date('Y') }}/<?= $DateConv->GregorianToHijri(date('Y'), 'YYYY') . 'H' ?></h2>
        </div>
        <hr class="mb-4">
        <a href="{{ route('konsumsi.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <form action="{{ route('konsumsi.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label"><strong>Tanggal</strong></label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="name@example.com">
            </div>
            <div class="form-group mb-3">
                <label for="donaturtakjil" class="form-label"><strong>Nama Donatur Takjil</strong></label>
                <small class="text-danger"><i>*biarkan kosong jika tidak diisi</i></small>
                <select class="form-select select-takjil" id="donaturtakjil" multiple="multiple" name="donaturtakjil[]"
                    aria-label="Default select example">
                    @foreach ($warga as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->nama_alias }}</option>
                    @endforeach
                </select>
                
            </div>
            <div class="form-group mb-3">
                <label for="donaturjabur" class="form-label"><strong>Nama Donatur Jabur</strong></label>
                <small class="text-danger"><i>*biarkan kosong jika tidak diisi</i></small>
                <select class="form-select select-jabur" id="donaturjabur" multiple="multiple" name="donaturjabur[]"
                    aria-label="Default select example">
                    @foreach ($warga as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->nama_alias }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="donaturbukber" class="form-label"><strong>Nama Donatur Buka Bersama</strong></label>
                <small class="text-danger"><i>*biarkan kosong jika tidak diisi</i></small>
                <select class="form-select select-bukber" id="donaturbukber" multiple="multiple" name="donaturbukber[]"
                    aria-label="Default select example">
                    @foreach ($warga as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->nama_alias }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="keterangan"><strong>Keterangan</strong></label>
                <textarea class="form-control" name="keterangan" id="keterangan" cols="5" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>
@endsection

@push('script')
    <script>

        // Select2 Multiple
        $('.select-bukber').select2({
            placeholder: "Pilih anggota",
            allowClear: true
        });
        $('.select-takjil').select2({
            placeholder: "Pilih anggota",
            allowClear: true
        });
        $('.select-jabur').select2({
            placeholder: "Pilih anggota",
            allowClear: true
        });

    </script>
@endpush

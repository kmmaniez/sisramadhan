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
            <h1>Edit Data Kelola Konsumsi</h1>
            <h2>Tahun {{ date('Y') }}/<?= $DateConv->GregorianToHijri(date('Y'), 'YYYY') . 'H' ?></h2>
        </div>
        <hr class="mb-4">
        <a href="{{ route('konsumsi.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <form action="{{ route('konsumsi.update', $konsumsi->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label"><strong>Tanggal</strong></label>
                <input type="date" class="form-control" name="tanggal" id="tanggal"
                    value="{{ $konsumsi->tgl_kegiatan }}">
            </div>

            <div class="form-group mb-3">
                <div class="list-anggota mb-2 d-flex gap-1">
                    <label for="exampleFormControlInput1" class="form-label"><strong>Nama Donatur Takjil</strong></label>
                </div>
                <select class="form-select" id="donaturtakjil" multiple="multiple" name="donaturtakjil[]"
                    aria-label="Default select example" @if (date('D') === 'Sat') disabled @endif>
                    @foreach ($warga as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->nama_alias }}</option>
                    @endforeach
                </select>
                <small class="text-danger"><i>*Biarkan kosong jika tidak mengganti anggota</i></small>
            </div>
            {{-- @dump($konsumsi) --}}

            <div class="form-group mb-3">
                <div class="list-anggota mb-2 d-flex gap-1">
                    <label for="exampleFormControlInput1" class="form-label"><strong>Nama Donatur Jabur</strong></label>
                </div>

                <select class="form-select" id="donaturjabur" name="donaturjabur[]" multiple="multiple">
                    @foreach ($warga as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->nama_alias }}</option>
                    @endforeach
                </select>
                <small class="text-danger"><i>*Biarkan kosong jika tidak mengganti anggota</i></small>
            </div>

            <div class="form-group mb-3">
                <div class="list-anggota mb-2 d-flex gap-1">
                    <label for="exampleFormControlInput1" class="form-label"><strong>Nama Donatur Buka Bersama</strong></label>
                </div>
                <select class="form-select" id="donaturbukber" multiple="multiple" name="donaturbukber[]"
                    aria-label="Default select example" @if (date('D') === 'Wed') disabled @endif>
                    @foreach ($warga as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->nama_alias }}</option>
                    @endforeach
                </select>
                <small class="text-danger"><i>*Biarkan kosong jika tidak mengganti anggota</i></small>
            </div>

            <div class="form-group">
                <label for="keterangan"><strong>Keterangan</strong></label>
                <textarea class="form-control" name="keterangan" id="keterangan" cols="5" rows="5">{{ $konsumsi->keterangan }}</textarea>
            </div>

            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#donaturbukber').select2({
                allowClear: true
            });
            $('#donaturbukber').val({{ Js::from($selectedBukber) }});
            $('#donaturbukber').trigger('change'); 
            

            $('#donaturtakjil').select2({
                placeholder: "Pilih anggota",
                allowClear: true
            });
            $('#donaturtakjil').val({{ Js::from($selectedTakjil) }});
            $('#donaturtakjil').trigger('change'); 
            

            $('#donaturjabur').select2({
                placeholder: "Pilih anggota",
                allowClear: true
            });
            $('#donaturjabur').val({{ Js::from($selectedJabur) }});
            $('#donaturjabur').trigger('change'); 

        });
    </script>
@endpush

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
        {{-- @dump($jabur) --}}
        {{-- @foreach ($konsumsis as $item)
            <span>{{ $item->tgl_kegiatan }}</span>
        @endforeach --}}
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
                    <label for="exampleFormControlInput1" class="form-label"><strong>Nama Donatur Buka Bersama</strong></label>
                    @if (is_null(json_decode($konsumsi->warga_bukber)))
                        <p>-</p>
                    @else
                        @foreach (json_decode($konsumsi->warga_bukber) as $key => $donaturbukber)
                            <h6><span class="badge bg-primary py-2 px-2">{{ $donaturbukber }}</span></h6>
                        @endforeach
                    @endif
                </div>
                <select class="form-select select-anggota" id="wargabukber" multiple="multiple" name="wargabukber[]"
                    aria-label="Default select example" @if (date('D') === 'Wed') disabled @endif>
                    @foreach ($warga as $key => $value)
                        <option value="{{ $value->nama_alias }}">{{ $value->nama_alias }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <div class="list-anggota mb-2 d-flex gap-1">
                    <label for="exampleFormControlInput1" class="form-label"><strong>Nama Donatur Takjil</strong></label>
                    @if (is_null(json_decode($konsumsi->warga_takjil)))
                        <p>-</p>
                    @else
                        @foreach (json_decode($konsumsi->warga_takjil) as $key => $donaturtakjil)
                            <h6><span class="badge bg-primary py-2 px-2">{{ $donaturtakjil }}</span></h6>
                        @endforeach
                    @endif
                </div>
                <select class="form-select select-anggota" id="wargatakjil" multiple="multiple" name="wargatakjil[]"
                    aria-label="Default select example" @if (date('D') === 'Sat') disabled @endif>
                    @foreach ($warga as $key => $value)
                        <option value="{{ $value->nama_alias }}">{{ $value->nama_alias }}</option>
                    @endforeach
                </select>
            </div>
            {{-- @dump($konsumsi) --}}
            <div class="form-group mb-3">
                <div class="list-anggota mb-2 d-flex gap-1">
                    <label for="exampleFormControlInput1" class="form-label"><strong>Nama Donatur Jabur</strong></label>
                    @if (is_null(json_decode($konsumsi->warga_jabur)))
                        <p>-</p>
                    @else
                        @foreach (json_decode($konsumsi->warga_jabur) as $key => $donaturjabur)
                            <h6><span class="badge bg-primary py-2 px-2">{{ $donaturjabur }}</span></h6>
                        @endforeach
                    @endif
                </div>

                <select class="form-select select-jabur" id="wargajabur" name="wargajabur[]" multiple>
                    @foreach ($warga as $key => $value)
                        <option value="{{ $value->nama_alias }}">{{ $value->nama_alias }}</option>
                    @endforeach
                </select>
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
            // Select2 Multiple
            $('.select-anggota').select2({
                placeholder: "Pilih anggota",
                allowClear: true
            });
            $('.select-jabur').select2({
                placeholder: "Pilih anggota",
                allowClear: true
            });

        });
    </script>
@endpush

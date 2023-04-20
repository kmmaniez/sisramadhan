@extends('layouts.admin')

@section('content')
    
    <div class="container mb-5">
        <div class="title text-center mb-5">
            <h1>Tambah Data Kelola Konsumsi</h1>
            <div class="form-tahun d-flex justify-content-center gap-2 align-items-center">
                <h1>Tahun 2022/1443 H</h1>
                <form action="" method="post">
                    <select name="" id="" style="width: 24px">
                        <option value="2022" style="width: 100px;">2022/1443 H</option>
                        <option value="2021" style="width: 100px;">2021/1442 H</option>
                        <option value="2020" style="width: 100px;">2020/1441 H</option>
                    </select>
                </form>
            </div>
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
                <label for="wargabukber" class="form-label"><strong>Nama Donatur Buka Bersama</strong></label>
                <select class="form-select select-anggota" id="wargabukber" multiple="multiple" name="wargabukber[]" aria-label="Default select example" @if (date('D') === 'Wed') disabled @endif>
                    @foreach ($warga as $key => $value)
                        <option value="{{ $value->nama_alias }}">{{ $value->nama_alias }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlInput1" class="form-label"><strong>Nama Donatur Takjil</strong></label>
                <select class="form-select select-anggota" id="wargatakjil" multiple="multiple" name="wargatakjil[]" aria-label="Default select example" @if (date('D') === 'Sat') disabled @endif>
                    @foreach ($warga as $key => $value)
                        <option value="{{ $value->nama_alias }}">{{ $value->nama_alias }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlInput1" class="form-label"><strong>Nama Donatur Jabur</strong></label>
                <select class="form-select select-anggota" id="wargajabur" multiple="multiple" name="wargajabur[]" aria-label="Default select example">
                    @foreach ($warga as $key => $value)
                        <option value="{{ $value->nama_alias }}">{{ $value->nama_alias }}</option>
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
        $(document).ready(function() {
            // Select2 Multiple
            $('.select-anggota').select2({
                placeholder: "Pilih anggota",
                allowClear: true
            });

        });
    </script>
@endpush
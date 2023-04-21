@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <div class="title text-center mb-5">
            <h1>Tambah Data Tadarus</h1>
            <div class="form-tahun d-flex justify-content-center gap-2 align-items-ce   nter">
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
        <a href="{{ route('tadarus.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>
        {{-- @dump($tadarus) --}}
        <form action="{{ route('tadarus.update', $tadarus->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group mb-3 d-flex justify-content-start align-items-center gap-4">
                <label for="jumlah_khatam" class="form-label">Jumlah Khataman</label>
                <select class="form-select mb-2" id="jumlah_khatam" name="jumlah_khatam" style="width: 100px" aria-label="Default select example">
                    @foreach ($listJuz as $juz)
                        @if (old('jumlah_khatam', $tadarus->jumlah_khatam) == $juz)
                        <option value="{{ $juz }}" selected>{{ $juz }}</option>
                            
                        @else
                        <option value="{{ $juz }}">{{ $juz }}</option>
                            
                        @endif
                    @endforeach
                </select>
            </div>
            {{-- @dd($listkelompok) --}}
            <div class="form-group mb-3">
                <label for="nama_kelompok" class="form-label">Nama Kelompok Tadarus</label>
                <input type="text" class="form-control" name="nama_kelompok" id="nama_kelompok" value="{{ old('nama_kelompok', $tadarus->nama_kelompok) }}">
            </div>
            <div class="form-group mb-3">
                <label for="anggota" class="form-label">Anggota Aktif</label>
                <select class="form-select select-anggota" id="anggota" multiple="multiple" name="anggota[]" aria-label="Default select example">
                    {{-- <option value="">asd</option>
                    <option value="">read</option>
                    <option value="" selected>qqas</option>
                    <option value="">tada</option> --}}
                    {{-- @foreach ($warga as $key => $data)
                    <option value="{{ $data->nama_alias }}">{{ $data->nama_alias }}</option>
                    @endforeach --}}
                </select>
            </div>

            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>

@endsection

@push('script')
    <script>
        let data = [
            {id:0, text:'awewe'},
            {id:1, text:'aw1'},
            {id:2, text:'aw2'},
            {id:3, text:'aw3'},
        ]
        $(document).ready(function() {
            // Select2 Multiple
            $('.select-anggota').select2({
                // placeholder: "Pilih anggota",
                // data: data,
                // allowClear: true,
            });

        });
    </script>
@endpush
@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <div class="title text-center mb-5">
            <h1>Kegiatan Zakat</h1>
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
        <hr class="mb-5">
        <a href="{{ route('zakat.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <form action="{{ route('zakat.update', $zakat->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ old('tanggal', $zakat->tgl_kegiatan) }}">
            </div>
            {{-- @dump($zakat->nama_penerima_zakat) --}}
            <div class="form-group">
                <label for="penerima" class="form-label">Penerima Zakat</label>
                <input type="text" class="form-control" name="penerima" id="penerima" value="{{ $penerima }}">
            </div>
            
            <div class="form-group">
                <label for="petugas" class="form-label">Petugas Zakat</label>
                <input type="text" class="form-control" name="petugas" id="petugas" value="{{ $petugas }}">
            </div>

            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="" rows="5" class="form-control">{{ $zakat->keterangan }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>

@endsection
@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <div class="title text-center mb-3">
            <h1>Form Data Warga</h1>
        </div>

        <form action="{{ route('warga.store') }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="nama_keluarga" class="form-label">Keluarga</label>
                <input type="text" name="nama_keluarga" id="nama_keluarga" class="form-control" value="{{ old('nama_keluarga', $warga->nama_keluarga) }}">
            </div>
            <div class="form-group mb-3">
                <label for="nama_asli" class="form-label">Nama Asli</label>
                <input type="text" name="nama_asli" id="nama_asli" class="form-control" value="{{ old('nama_asli', $warga->nama_asli) }}">
            </div>
            <div class="form-group mb-3">
                <label for="nama_alias" class="form-label">Nama Panggilan</label>
                <input type="text" name="nama_alias" id="nama_alias" class="form-control" value="{{ old('nama_alias', $warga->nama_alias) }}">
            </div>
            <div class="form-group mb-3">
                
                <div class="form mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $warga->alamat) }}">
                </div>
                
                <div class="form d-flex justify-content-start align-items-center gap-3">

                    <!-- RT -->
                    <label for="rt" class="form-label">RT</label>
                    <select class="form-select" name="rt" id="rt" style="width: 80px;" aria-label="Default select example">
                        {{-- <option value="" selected style="display: none">0</option> --}}
                        @foreach ($listrt as $datart)
                            <option value="{{ $datart }}">{{ $datart }}</option>
                        @endforeach
                    </select>
                    
                    <!-- RW -->
                    <label for="rw" class="form-label">RW</label>
                    <select class="form-select" name="rw" id="rw" style="width: 80px;" aria-label="Default select example">
                        {{-- <option value="" selected style="display: none">0</option> --}}
                        @foreach ($listrw as $datarw)
                            <option value="{{ $datarw }}">{{ $datarw }}</option>
                        @endforeach
                    </select>
                    
                </div>
                
            </div>
            <div class="form-group mb-3">
                <label for="nomorhp" class="form-label">Nomor HP</label>
                <input type="tel" class="form-control" name="nomorhp" id="nomorhp" value="{{ old('nomorhp', $warga->nomor_hp) }}">
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $warga->email) }}">
            </div>
            
            <div class="form-group d-flex justify-content-between">
                <a href="{{ route('warga.index') }}" class="btn btn-lg btn-secondary mt-3">Batal</a>
                <button type="submit" class="btn btn-lg btn-dark mt-3">Update</button>
            </div>

        </form>

    </div>

@endsection
@extends('layouts.admin')

@section('content')
    
    <div class="container">
        <div class="title text-center mb-3">
            <h1>Form Data Warga</h1>
        </div>

        <form action="{{ route('warga.store') }}" method="post">
            @csrf

            {{-- <div class="form-group">
                <input type="text" name="test" id="test">
            </div> --}}
            <div class="form-group mb-3">
                <label for="nama_keluarga" class="form-label">Keluarga</label>
                <input type="text" name="nama_keluarga" id="nama_keluarga" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="nama_asli" class="form-label">Nama Asli</label>
                <input type="text" name="nama_asli" id="nama_asli" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="nama_alias" class="form-label">Nama Panggilan</label>
                <input type="text" name="nama_alias" id="nama_alias" class="form-control">
            </div>
            <div class="form-group mb-3">
                
                <div class="form mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat">
                </div>
                
                <div class="form d-flex justify-content-start align-items-center gap-3">

                    <!-- RT -->
                    <label for="rt" class="form-label">RT</label>
                    <select class="form-select" name="rt" id="rt" style="width: 80px;" aria-label="Default select example">
                        <option value="" selected style="display: none">0</option>
                        @foreach ($listrt as $datart)
                            <option value="{{ $datart }}">{{ $datart }}</option>
                        @endforeach
                    </select>
                    
                    <!-- RW -->
                    <label for="rw" class="form-label">RW</label>
                    <select class="form-select" name="rw" id="rw" style="width: 80px;" aria-label="Default select example">
                        <option value="" selected style="display: none">0</option>
                        @foreach ($listrw as $datarw)
                            <option value="{{ $datarw }}">{{ $datarw }}</option>
                        @endforeach
                    </select>
                    
                </div>
                
            </div>
            <div class="form-group mb-3">
                <label for="nomorhp" class="form-label">Nomor HP</label>
                <input type="tel" class="form-control" name="nomorhp" id="nomorhp">
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>

            {{-- <div class="form d-flex justify-content-around">
                <h2>INI FUNGSI ??</h2>
                <div class="form-group w-25 d-flex flex-column gap-2">
                    <label for="">Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Aktif</label>
                        </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                    </div>                      
                </div>

                <div class="form-group w-75 d-flex flex-column justify-content-center flex-wrap gap-2" style="height: 140px">
                    <label for="">Kontribusi</label>
                    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="check[]" value="imam" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Imam</label> 
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="check[]" value="bilal" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Bilal</label> 
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="check[]" value="penceramah" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Penceramah</label> 
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="check[]" value="pengajartpa" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Pengajar TPA</label> 
                    </div> 
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="check[]" value="donatur" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Donatur</label> 
                    </div> 
                </div>
            </div> --}}
            
            <div class="form-group d-flex justify-content-between">
                <a href="{{ route('warga.index') }}" class="btn btn-lg btn-secondary mt-3">Batal</a>
                <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>
            </div>

        </form>

    </div>

@endsection
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

        <form action="{{ route('zakat.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" >
            </div>

            <div class="form-group">
                <label for="penerima" class="form-label">Penerima Zakat</label>
                <input type="text" class="form-control" name="penerima" id="penerima">
            </div>
            
            <div class="form-group">
                <label for="petugas" class="form-label">Petugas Zakat</label>
                <input type="text" class="form-control" name="petugas" id="petugas">
            </div>
            {{-- <div class="form-group mb-3">
                
                <label for="penerima" class="form-label">Nama Penerima Zakat multiple select</label>
                <select class="form-select" name="penerima" id="penerima" aria-label="Default select example">
                    <option selected>Bapak ina</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div> --}}
            {{-- <div class="form-group mb-3 d-flex flex-column">
                <label for="petugas" class="form-label">Petugas Zakat  multiple select</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="petugas[]" value="imam" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">Imam</label> 
                </div> 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="petugas[]" value="bilal" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">Bilal</label> 
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="petugas[]" value="penceramah" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">Penceramah</label> 
                </div> 
            </div> --}}
            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="" rows="5" class="form-control"></textarea>
            </div>
            
            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>

@endsection
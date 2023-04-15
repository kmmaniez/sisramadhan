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
                <label for="exampleFormControlInput1" class="form-label"><strong>Tanggal</strong></label>
                <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlInput1" class="form-label"><strong>Nama Donatur Buka Bersama</strong></label>
                <select class="form-select mb-2" name="donaturbukber[]" aria-label="Default select example" @if (date('D') === 'Sun') disabled @endif>
                    {{-- <option selected>Donatur 1</option> --}}
                    <option value="1">Haji 1</option>
                    <option value="2">Haji 2</option>
                    <option value="3">Haji 3</option>
                </select>
                <select class="form-select mb-2" name="donaturbukber[]" aria-label="Default select example" @if (date('D') === 'Sun') disabled @endif>
                    {{-- <option selected>Donatur 2</option> --}}
                    <option value="4">Haji 4</option>
                    <option value="5">Haji 5</option>
                    <option value="6">Haji 6</option>
                </select>
                <select class="form-select mb-2" name="donaturbukber[]" aria-label="Default select example" @if (date('D') === 'Sun') disabled @endif>
                    {{-- <option selected>Donatur 3</option> --}}
                    <option value="7">Haji 7</option>
                    <option value="8">Haji 8</option>
                    <option value="9">Haji 9</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlInput1" class="form-label"><strong>Nama Donatur Takjil</strong></label>
                <select class="form-select mb-2" aria-label="Default select example">
                    <option selected>Donatur 1</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <select class="form-select mb-2" aria-label="Default select example">
                    <option selected>Donatur 2</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <select class="form-select mb-2" aria-label="Default select example">
                    <option selected>Donatur 3</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlInput1" class="form-label"><strong>Nama Donatur Jabur</strong></label>
                <select class="form-select mb-2" aria-label="Default select example">
                    <option selected>Donatur 1</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <select class="form-select mb-2" aria-label="Default select example">
                    <option selected>Donatur 2</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <select class="form-select mb-2" aria-label="Default select example">
                    <option selected>Donatur 3</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="form-group">
                <label for=""><strong>Keterangan</strong></label>
                <textarea class="form-control" name="keterangan" id="keterangan" cols="5" rows="5"></textarea>
            </div>
            
            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>

@endsection
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="title text-center mb-3">
            <h1>Form Data Warga</h1>
        </div>

        <form action="{{ route('warga.update', $warga->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="nama_asli" class="form-label">Nama Asli</label>
                <input type="text" name="nama_asli" id="nama_asli" class="form-control"
                    value="{{ old('nama_asli', $warga->nama_asli) }}">
            </div>
            <div class="form-group mb-3">
                <label for="nama_alias" class="form-label">Nama Panggilan</label>
                <input type="text" name="nama_alias" id="nama_alias" class="form-control"
                    value="{{ old('nama_alias', $warga->nama_alias) }}">
            </div>
            <div class="form-group mb-3">

                <div class="form mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control"
                        value="{{ old('alamat', $warga->alamat) }}">
                </div>

                <div class="form d-flex justify-content-start align-items-center gap-3">

                    <!-- RT -->
                    <label for="rt" class="form-label">RT</label>
                    <select class="form-select" name="rt" id="rt" style="width: 80px;"
                        aria-label="Default select example">
                        @foreach ($listrt as $datart)
                            @if (old('rt', $warga->rt) == $datart)
                                <option value="{{ $datart }}" selected>{{ $warga->rt }}</option>
                            @else
                                <option value="{{ $datart }}">{{ $datart }}</option>
                            @endif
                        @endforeach
                    </select>

                    <!-- RW -->
                    <label for="rw" class="form-label">RW</label>
                    <select class="form-select" name="rw" id="rw" style="width: 80px;"
                        aria-label="Default select example">
                        @foreach ($listrw as $datarw)
                            @if (old('rt', $warga->rw) == $datarw)
                                <option value="{{ $datarw }}" selected>{{ $warga->rw }}</option>
                            @else
                                <option value="{{ $datarw }}">{{ $datarw }}</option>
                            @endif
                        @endforeach
                    </select>

                </div>

            </div>
            <div class="form-group mb-3">
                <label for="nomorhp" class="form-label">Nomor HP</label>
                <input type="tel" class="form-control" name="nomorhp" id="nomorhp"
                    value="{{ old('nomorhp', $warga->nomor_hp) }}">
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email"
                    value="{{ old('email', $warga->email) }}">
            </div>
            <div class="form d-flex justify-content-around">
                <div class="form-group w-25 d-flex flex-column gap-2">
                    <label for="">Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="aktif" value="aktif"
                            @if ($warga->status_keaktifan) checked @endif>
                        <label class="form-check-label" for="aktif">Aktif</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="nonaktif" value="nonaktif"
                            @if (!$warga->status_keaktifan) checked @endif>
                        <label class="form-check-label" for="nonaktif">Tidak Aktif</label>
                    </div>
                </div>
                @php
                    $datakontribusi = json_decode($warga->kontribusi);
                @endphp
                <div class="form-group w-75 d-flex flex-column justify-content-center flex-wrap gap-2"
                    style="height: 140px">
                    <label for="">Kontribusi</label>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="check[]" value="imam" id="flexCheckDefault"
                            @if (is_null($datakontribusi))  {{ '' }}
                        @else
                        {{ in_array('imam', $datakontribusi) ? 'checked' : '' }} @endif>
                        <label class="form-check-label" for="flexCheckDefault">Imam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="check[]" value="bilal"
                            id="flexCheckDefault"
                            @if (is_null($datakontribusi))  {{ '' }}
                        @else
                        {{ in_array('bilal', $datakontribusi) ? 'checked' : '' }} @endif>
                        <label class="form-check-label" for="flexCheckDefault">Bilal</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="check[]" value="penceramah" id="flexCheckDefault"
                        @if (is_null($datakontribusi)) {{ '' }}
                        @else {{ in_array('penceramah', $datakontribusi) ? 'checked' : '' }} @endif>
                        <label class="form-check-label" for="flexCheckDefault">Penceramah</label>
                    </div>
                </div>
            </div>

            <div class="form-group d-flex justify-content-between">
                <a href="{{ route('warga.index') }}" class="btn btn-lg btn-secondary mt-3">Batal</a>
                <button type="submit" class="btn btn-lg btn-dark mt-3">Update</button>
            </div>

        </form>

    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="title text-center mb-5">
            <h1>Edit Data Takbiran</h1>
        </div>
        <hr class="mb-4">
        <a href="{{ route('takbiran.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>
        <form action="{{ route('takbiran.update', $takbiran->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" id="tanggal"
                    value="{{ old('tanggal', $takbiran->tgl_kegiatan) }}">
            </div>
            <div class="form-group mb-3">
                <label for="id_warga" class="form-label">Nama Donatur Konsumsi</label>
                <select class="form-select wargakonsumsi" id="wargakonsumsi" multiple="multiple" name="wargakonsumsi[]">
                    {{-- @foreach ($warga as $listwarga)
                        <option value="{{ $listwarga->id }}">{{ $listwarga->nama_alias }}</option>
                    @endforeach --}}
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="10" rows="5" class="form-control">{{ old('keterangan', $takbiran->keterangan) }}</textarea>
            </div>

            <button type="submit" class="btn btn-lg btn-dark mt-3">Simpan</button>

        </form>

    </div>
@endsection
@push('script')
    <script>
        // $(".wargakonsumsi").select2({
        //     allowClear: true,
        // });
        $(document).ready(function () {
            const ids = {{ $takbiran->id }}
            $('#tanggal').change(function () {
                $.ajax({
                    url: window.location.origin + '/admin/takbiran/listwarga/2',
                    method: 'GET',
                    dataType: 'json',
                    success: function (data){
                        console.log(data)

                    }
                })
            })
            $("#wargakonsumsi").select2({
                    // placeholder: 'Pilih Matakuliah',
                    allowClear: true,
                    ajax: {
                        url: window.location.origin + '/admin/takbiran/listwarga/'+ids,
                        processResults: function({ data }) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.nama_matakuliah
                                    }
                                })
                            }
                        }
                    }
                });
        })
    </script>
@endpush

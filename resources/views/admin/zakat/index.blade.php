@php
    $DateConv = new Hijri_GregorianConvert;
    $format="YYYY/MM/DD";
    $listTahun = [];
    for ($i=0; $i < 3; $i++) { 
        array_push($listTahun, date('Y') - $i);
    }
@endphp
@extends('layouts.admin')

@section('title', 'Zakat')
@section('content')
    
    {{-- <div class="container-fluid px-5"> --}}
        <div class="title text-center mb-5">
            <h1>Kegiatan Zakat</h1>
            <div class="form-tahun d-flex justify-content-center gap-2 align-items-center">
                <h1>Tahun <span id="masehi">{{ date('Y') }}</span>/<span id="hijri"><?= $DateConv->GregorianToHijri(date('Y'),'YYYY'); ?></span>H</h1>
                <form action="" method="get">
                    <select name="pilihtahun" id="pilihtahun" style="width: 24px">
                        @foreach ($listTahun as $tahun)
                            <option value="{{ $tahun }}" data-tahun="<?= $DateConv->GregorianToHijri($tahun,'YYYY'); ?>" style="width: 100px;">{{ $tahun }}/{{ $DateConv->GregorianToHijri($tahun,'YYYY').' H' }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        <hr class="mb-4">
        <form action="" method="get" class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-group  d-flex justify-content-start gap-2">
                <input type="text" class="form-control" name="search" id="search" placeholder="Search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-md btn-secondary">Search</button>
            </div>
            <a href="{{ route('zakat.create') }}" class="btn btn-lg btn-dark">Tambah Data</a>
        </form>
        
        {{-- <h1 class="text-secondary w-25 mx-auto" style="margin-top: 10rem; margin-bottom: 15rem;">Belum Ada Data</h1> --}}
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Kegiatan</th>
                <th scope="col">Nama Penerima Zakat</th>
                <th scope="col">Nama Petugas Zakat</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody class="table-group-divider" id="tblcontent">
                @if (empty($resultSearch))
                    @foreach ($zakat as $data)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }}, {{ $data->tgl_kegiatan }}</td>
                      <td>
                        @foreach (json_decode($data->nama_penerima_zakat) as $penerima)
                            {{ $penerima }},
                        @endforeach
                      </td>
                      <td>
                        @foreach (json_decode($data->nama_petugas_zakat) as $petugas)
                            {{ $petugas }},
                        @endforeach
                      </td>
                      <td>{{ $data->keterangan }}</td>
                      <td>
                        <form action="{{ route('zakat.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('zakat.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                @else
                    @foreach ($resultSearch['data'] as $data)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }}, {{ $data->tgl_kegiatan }}</td>
                      <td>
                        @foreach (json_decode($data->nama_penerima_zakat) as $penerima)
                            {{ $penerima }},
                        @endforeach
                      </td>
                      <td>
                        @foreach (json_decode($data->nama_petugas_zakat) as $petugas)
                            {{ $petugas }},
                        @endforeach
                      </td>
                      <td>{{ $data->keterangan }}</td>
                      <td>
                        <form action="{{ route('zakat.destroy', $data->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('zakat.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

@endsection
@push('script')
    <script>
        const pilihtahun = document.querySelector('#pilihtahun');
        const inputSearch = document.querySelector('#search');
        const hijriyah = document.querySelectorAll('option[data-tahun]');
        const tabelContent = document.querySelector('#tblcontent');
        const masehi = document.getElementById('masehi');
        const hijri = document.getElementById('hijri');
        const tableBody = $('#tblcontent');

        pilihtahun.addEventListener('change', () => {
            let tahun = masehi.textContent;
            masehi.textContent = pilihtahun.value;
            tahun = pilihtahun.value;
            hijriyah.forEach(element => {
                if (element.value == tahun) {
                hijri.textContent = element.dataset.tahun
                }
            });
            inputSearch.value = '';
            tabelContent.innerHTML = ''
            fetch(window.location.origin+ '/admin/filterYear?year='+pilihtahun.value)
            .then(response => response.json())
            .then(data => {
                // console.log(data);
                let listData = data.data;
                for (let index = 0; index < listData.length; index++) {
                    let tableList = `
                    <tr>
                        <th scope="col">${index + 1}</th>
                        <td>${moment(listData[index].tgl_kegiatan).format('dddd')}, ${listData[index].tgl_kegiatan}</td>
                        <td>${JSON.parse(listData[index].nama_penerima_zakat)}</td>
                        <td>${JSON.parse(listData[index].nama_petugas_zakat)}</td>
                        <td>${listData[index].keterangan}</td>
                        <td>
                            <form action="${window.location.pathname}/${listData[index].id}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="${window.location.pathname}/edit/${listData[index].id}" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>`;
                    tableBody.append(tableList)
                }
            })
        })
    </script>
@endpush
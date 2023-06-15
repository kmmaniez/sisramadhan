@php
    $DateConv = new Hijri_GregorianConvert();
    $format = 'YYYY/MM/DD';
    $listTahun = [];
    for ($i = 0; $i < 3; $i++) {
        array_push($listTahun, date('Y') - $i);
    }
@endphp
@extends('layouts.admin')

@section('title', 'Konsumsi')
@section('content')

    <div class="title text-center mb-5">
        <h1>Kegiatan Kelola Konsumsi</h1>
        <div class="form-tahun d-flex justify-content-center gap-2 align-items-center">
            <h1>Tahun <span id="masehi">{{ date('Y') }}</span>/<span
                    id="hijri"><?= $DateConv->GregorianToHijri(date('Y'), 'YYYY') ?></span>H</h1>
            <form action="" method="get">
                <select name="pilihtahun" id="pilihtahun" style="width: 24px">
                    @foreach ($listTahun as $tahun)
                        <option value="{{ $tahun }}" data-tahun="<?= $DateConv->GregorianToHijri($tahun, 'YYYY') ?>"
                            style="width: 100px;">
                            {{ $tahun }}/{{ $DateConv->GregorianToHijri($tahun, 'YYYY') . ' H' }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
    <hr class="mb-4">
    <form action="" method="get" class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-group  d-flex justify-content-start gap-2">
            <input type="text" class="form-control" name="search" id="search" placeholder="Search"
                value="{{ request('search') }}">
            <button type="submit" class="btn btn-md btn-secondary">Search</button>
        </div>
        <a href="{{ route('konsumsi.create') }}" class="btn btn-lg btn-dark">Tambah Data</a>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Kegiatan</th>
                <th scope="col">Nama Donatur Takjil</th>
                <th scope="col">Nama Donatur Jabur</th>
                <th scope="col">Nama Donatur Buka Bersama</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider" id="tblcontent">
            @if (empty($resultSearch['data']))
                @foreach ($konsumsi as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }},
                            {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                        <td class="">
                            {{-- @if (is_null(json_decode($data['warga_takjil'])))
                                <p>-</p>
                            @else
                                @foreach (json_decode($data->warga_takjil) as $key => $donaturtakjil)
                                    <span>{{ $donaturtakjil }}, </span>
                                @endforeach
                            @endif --}}
                            @if (!count($data->takjils()->get()) > 0)
                                <span>-</span>
                            @endif
                            @foreach ($data->takjils()->get() as $key => $donaturtakjil)
                                <span>{{ $donaturtakjil->nama_alias }}, </span>
                            @endforeach
                        </td>
                        <td class="">
                            {{-- @if (is_null(json_decode($data['warga_jabur'])))
                                <p>-</p>
                            @else
                                @foreach (json_decode($data->warga_jabur) as $key => $donaturjabur)
                                    <span>{{ $donaturjabur }}, </span>
                                @endforeach
                            @endif --}}
                            @if (!count($data->jaburs()->get()) > 0)
                                <span>-</span>
                            @endif
                            @foreach ($data->jaburs()->get() as $key => $donaturjabur)
                                <span>{{ $donaturjabur->nama_alias }}, </span>
                            @endforeach
                        </td>
                        <td class="">
                            {{-- @if (is_null(json_decode($data->warga_bukber)))
                                <p>-</p>
                            @else
                                @foreach (json_decode($data->warga_bukber) as $key => $donaturbukber)
                                    <span>{{ $donaturbukber }}, </span>
                                @endforeach
                            @endif --}}
                            @if (!count($data->bukbers()->get()) > 0)
                                <span>-</span>
                            @endif
                            @foreach ($data->bukbers()->get() as $key => $donaturbukber)
                                <span>{{ $donaturbukber->nama_alias }}, </span>
                            @endforeach
                        </td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <form action="{{ route('konsumsi.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('konsumsi.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('hapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                @foreach ($resultSearch['data'] as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }},
                            {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                        <td class="">
                            {{-- @if (is_null(json_decode($data->warga_takjil)))
                                <p>-</p>
                            @else
                                @foreach (json_decode($data->warga_takjil) as $key => $donaturtakjil)
                                    <span>{{ $donaturtakjil }}, </span>
                                @endforeach
                            @endif --}}
                            @if (!count($data->takjils()->get()) > 0)
                                <span>-</span>
                            @endif
                            @foreach ($data->takjils()->get() as $key => $donaturtakjil)
                                <span>{{ $donaturtakjil->nama_alias }}, </span>
                            @endforeach
                        </td>
                        <td class="">
                            {{-- @if (is_null(json_decode($data->warga_jabur)))
                                <p>-</p>
                            @else
                                @foreach (json_decode($data->warga_jabur) as $key => $donaturjabur)
                                    <span>{{ $donaturjabur }}, </span>
                                @endforeach
                            @endif --}}
                            @if (!count($data->jaburs()->get()) > 0)
                                <span>-</span>
                            @endif
                            @foreach ($data->jaburs()->get() as $key => $donaturjabur)
                                <span>{{ $donaturjabur->nama_alias }}, </span>
                            @endforeach
                        </td>
                        <td class="">
                            {{-- @if (is_null(json_decode($data->warga_bukber)))
                                <p>-</p>
                            @else
                                @foreach (json_decode($data->warga_bukber) as $key => $donaturbukber)
                                    <span>{{ $donaturbukber }}, </span>
                                @endforeach
                            @endif --}}
                            @if (!count($data->bukbers()->get()) > 0)
                                <span>-</span>
                            @endif
                            @foreach ($data->bukbers()->get() as $key => $donaturbukber)
                                <span>{{ $donaturbukber->nama_alias }}, </span>
                            @endforeach
                        </td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <form action="{{ route('konsumsi.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('konsumsi.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('hapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $konsumsi->links() }}

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
            tabelContent.innerHTML = '';
            fetch(window.location.origin + '/admin/konsumsi/filterYear?year=' + pilihtahun.value)
                .then(response => response.json())
                .then(data => {
                    let {
                        datan: bukberList
                    } = data;
                    console.log(bukberList);

                    for (let i = 0; i < bukberList.length; i++) {
                        const bukberWarga = bukberList[i];
                        let tableList = `
                    <tr>
                        <td>1</td>
                        <td>${moment(bukberWarga.tgl_kegiatan).format('dddd')}, ${bukberWarga.tgl_kegiatan}</td>
                        
                        <td>`;
                        for (let j = 0; j < bukberWarga.takjils.length; j++) {
                            const takjilObj = bukberWarga.takjils[j];
                            tableList += `${takjilObj.nama_alias}, `;
                        }
                        tableList += `
                        </td>;

                        <td>`;
                        for (let j = 0; j < bukberWarga.jaburs.length; j++) {
                            const jaburObj = bukberWarga.jaburs[j];
                            tableList += `${jaburObj.nama_alias}, `;
                        }
                        tableList += `
                        </td>;

                        <td>`;
                        for (let j = 0; j < bukberWarga.bukbers.length; j++) {
                            const bukberObj = bukberWarga.bukbers[j];
                            tableList += `${bukberObj.nama_alias}, `;
                        }
                        tableList += `
                        </td>;

                        <td>${bukberWarga.keterangan}</td>
                        <td>
                          <form action="${window.location.pathname}/${bukberWarga.id}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="${window.location.pathname}/edit/${bukberWarga.id}" class="btn btn-sm btn-warning">Edit</a>
                              <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                          </form>
                        </td>
                    </tr>`;
                        // console.log(bukberWarga.tgl_kegiatan);

                        // for (let j = 0; j < bukberWarga.bukbers.length; j++) {
                        //     const bukberObj = bukberWarga.bukbers[j];
                        //     console.log(bukberObj.nama_alias);
                        // }
                        tableBody.append(tableList)
                    }
                    // let listData = data.data;
                    // for (let index = 0; index < listData.length; index++) {
                    //     let tableList = `
                    // <tr>
                    //     <td>${index + 1}</td>
                    //     <td>${moment(listData[index].tgl_kegiatan).format('dddd')}, ${listData[index].tgl_kegiatan}</td>
                    //     <td>${JSON.parse(listData[index].warga_bukber)}</td>
                    //     <td>${JSON.parse(listData[index].warga_jabur)}</td>
                    //     <td>${JSON.parse(listData[index].warga_takjil)}</td>
                    //     <td>${listData[index].keterangan}</td>
                    //     <td>
                    //       <form action="${window.location.pathname}/${listData[index].id}" method="post">
                    //           @csrf
                    //           @method('DELETE')
                    //           <a href="${window.location.pathname}/edit/${listData[index].id}" class="btn btn-sm btn-warning">Edit</a>
                    //           <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                    //       </form>
                    //     </td>
                    // </tr>`;
                    //     tableBody.append(tableList)
                    // }
                })
        })
    </script>
@endpush

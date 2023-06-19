@php
    $DateConv = new Hijri_GregorianConvert;
    $format="YYYY/MM/DD";
    $listTahun = [];
    for ($i=0; $i < 3; $i++) { 
        array_push($listTahun, date('Y') - $i);
    }
@endphp
@extends('layouts.admin')

@section('title', 'Tadarus')
@section('content')
    
    {{-- <div class="container-fluid px-5"> --}}
        <div class="title text-center mb-5">
            <h1>Kegiatan Tadarus</h1>
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
            <a href="{{ route('tadarus.create') }}" class="btn btn-lg btn-dark">Tambah Data</a>
        </form>
        
        {{-- <h1 class="text-secondary w-25 mx-auto" style="margin-top: 10rem; margin-bottom: 15rem;">Belum Ada Data</h1> --}}
       

        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                {{-- <th scope="col">Tahun</th> --}}
                <th scope="col">Kelompok Tadarus</th>
                <th scope="col">Jumlah Khataman</th>
                <th scope="col">Anggota Aktif</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            {{-- @dump($tadarus) --}}
            <tbody class="table-group-divider" id="tblcontent">
                <!-- default not search -->
                @if (empty($resultSearch['data']))
                    @foreach ($tadarus as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        {{-- <td>{{ Carbon::parse($data->tahun_kegiatan)->translatedFormat('Y') }}</td> --}}
                        <td>{{ $data->nama_kelompok }}</td>
                        <td>{{ $data->jumlah_khatam }}</td>
                        <td>
                            @foreach ($data->wargas()->get() as $item)
                                {{ $item->nama_alias }},
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('tadarus.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('tadarus.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                <!-- If search -->
                    @foreach ($resultSearch['data'] as $data)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $data->nama_kelompok }}</td>
                        <td>{{ $data->jumlah_khatam }}</td>
                        <td>
                            @foreach ($data->wargas()->get() as $item)
                                {{ $item->nama_alias }},
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('tadarus.destroy', $data->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('tadarus.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('hapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach            
                @endif
            </tbody>
        </table>

        {{-- <a href="/" class="btn btn-lg btn-secondary">Kembali</a> --}}
       
    {{-- </div> --}}

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
            fetch(window.location.origin+ '/admin/tadarus/filterYear?year='+pilihtahun.value)
            .then(response => response.json())
            .then(data => {
                // console.log(data);
                let {
                        datan: listAnggota
                    } = data;
                for (let i = 0; i < listAnggota.length; i++) {
                        const anggota = listAnggota[i];
                        console.log(anggota);
                        let tableList = `
                    <tr>
                        <td>${i + 1}</td>
                        <td>${anggota.nama_kelompok}</td>
                        <td>${anggota.jumlah_khatam}</td>
                        <td>`;
                        for (let j = 0; j < anggota.wargas.length; j++) {
                            const takjilObj = anggota.wargas[j];
                            tableList += `${takjilObj.nama_alias}, `;
                        }
                        tableList += `
                        </td>;

                        <td>
                          <form action="${window.location.pathname}/${anggota.id}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="${window.location.pathname}/edit/${anggota.id}" class="btn btn-sm btn-warning">Edit</a>
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
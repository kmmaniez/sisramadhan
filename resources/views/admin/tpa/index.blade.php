@extends('layouts.admin')

@section('content')
    
    {{-- <div class="container-fluid px-5"> --}}
        <div class="title text-center mb-5">
            <h1>Jadwal Ustad/zah Pengajar TPA HIDAYATUL FALAH</h1>
            <h1>Tahun 2022/1443 H</h1>
            {{-- <div class="form-tahun d-flex justify-content-center gap-2 align-items-center">
                <form action="" method="post">
                    <select name="" id="" style="width: 24px">
                        <option value="2022" style="width: 100px;">2022/1443 H</option>
                        <option value="2021" style="width: 100px;">2021/1442 H</option>
                        <option value="2020" style="width: 100px;">2020/1441 H</option>
                    </select>
                </form>
            </div> --}}
        </div>
        <hr class="mb-4">
        <form action="" method="get" class="d-flex justify-content-between align-items-center mb-3">
            {{-- <div class="form-group  d-flex justify-content-start gap-2">
                <input type="text" class="form-control" name="search" id="search" placeholder="Search">
                <button type="submit" class="btn btn-md btn-secondary">Search</button>
            </div> --}}
            <a href="{{ route('tpa.create') }}" class="btn btn-lg btn-dark">Tambah Data</a>
        </form>
        
        {{-- <h1 class="text-secondary w-25 mx-auto" style="margin-top: 10rem; margin-bottom: 15rem;">Belum Ada Data</h1> --}}
        <table class="table table-striped">
            <thead>
              <tr>
                {{-- <th scope="col">No</th> --}}
                {{-- <th scope="col">Tanggal Kegiatan</th> --}}
                {{-- <th scope="col">Nama Pengajar | relasi ustadh</th>
                <th scope="col">Sesi Mengajar | relasi hari</th> --}}
                <th scope="col">Senin</th>
                <th scope="col">Selasa</th>
                <th scope="col">Rabu</th>
                <th scope="col">Kamis</th>
                <th scope="col">Jum'at</th>
                <th scope="col">Sabtu</th>
                {{-- <th scope="col">Aksi</th> --}}
            </tr>
            </thead>
            <tbody class="table-group-divider">
                {{-- @dump($jadwal) --}}
                
                {{-- <tr>
                    <td>
                        <p>Kholid</p>
                        <p>Iin</p>
                    </td>
                    <td>
                        <p>Kholid</p>
                        <p>Maryam</p>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr> --}}
                <tr>
                    <td>
                        @foreach ($jadwal['senin'] as $key => $value)
                        <p>{{ $value->nama }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($jadwal['selasa'] as $key => $value)
                        <p>{{ $value->nama }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($jadwal['rabu'] as $key => $value)
                        <p>{{ $value->nama }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($jadwal['kamis'] as $key => $value)
                        <p>{{ $value->nama }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($jadwal['jumat'] as $key => $value)
                        <p>{{ $value->nama }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($jadwal['sabtu'] as $key => $value)
                        <p>{{ $value->nama }}</p>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- <a href="{{ route('tpa.index') }}" class="btn btn-lg btn-secondary">Kembali</a> --}}
       
    {{-- </div> --}}

@endsection
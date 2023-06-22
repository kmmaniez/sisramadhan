<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <meta charset="UTF-8"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<style>
    table {
        width: 100%;
        /* border: 2px solid #000; */
        /* border: 1px inset #000; */
    }

    h1,
    h3 {
        text-align: center;
    }
</style>

<body>
    <h1>Jadwal Kultum</h1>
    <h1>Masjid Hidayatul Falah</h1>
    <h3>Kecamatan Kalasan, Kabupaten Sleman</h3>
    <br>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Kegiatan</th>
                <th scope="col">Nama Donatur Takjil</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($listkonsumsi as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }},
                        {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                    <td>
                        {{ $data->penceramah->nama_alias }}
                        {{-- @if (is_null(json_decode($data->warga_takjil)))
                            <p>-</p>
                        @else
                            @foreach (json_decode($data->warga_takjil) as $key => $donaturtakjil)
                                <span>{{ $donaturtakjil }}, </span>
                            @endforeach
                        @endif --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

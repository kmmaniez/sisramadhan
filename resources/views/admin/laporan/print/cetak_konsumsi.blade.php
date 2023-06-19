<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
    <h1>Jadwal Konsumsi</h1>
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
                <th scope="col">Nama Donatur Jabur</th>
                <th scope="col">Nama Donatur Buka Bersama</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listkonsumsi as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('l') }},
                        {{ Carbon::parse($data->tgl_kegiatan)->translatedFormat('d F Y') }}</td>
                    <td>
                        @if (!count($data->takjils()->get()) > 0)
                            <span>-</span>
                        @endif
                        @foreach ($data->takjils()->get() as $key => $donaturtakjil)
                            <span>{{ $donaturtakjil->nama_alias }}, </span>
                        @endforeach
                    </td>
                    <td>
                        @if (!count($data->jaburs()->get()) > 0)
                            <span>-</span>
                        @endif
                        @foreach ($data->jaburs()->get() as $key => $donaturjabur)
                            <span>{{ $donaturjabur->nama_alias }}, </span>
                        @endforeach
                    </td>
                    <td>
                        @if (!count($data->bukbers()->get()) > 0)
                            <span>-</span>
                        @endif
                        @foreach ($data->bukbers()->get() as $key => $donaturbukber)
                            <span>{{ $donaturbukber->nama_alias }}, </span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<style>
    table{
        width: 100%;
        /* border: 2px solid #000; */ 
        /* border: 1px inset #000; */
    }
    h1,h3{
        text-align: center;
    }
</style>
<body>
    <h1>Jadwal Imam Tarawih</h1>
    <h1>Masjid Hidayatul Falah</h1>
    <h3>Kecamatan Kalasan, Kabupaten Bantul</h3>
    <br>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Kegiatan</th>
                <th scope="col">Nama Donatur Takjil</th>
                <th scope="col">Nama Donatur Jabur</th>
              </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Rabu, 3 Agustus 2022</td>
                <td>Jajang | Agus | Bagyo</td>
                <td>Rehan | Majang | Agus</td>
            </tr>
            {{-- @foreach ($warga as $data)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $data->nama_keluarga }}</td>
                  <td>{{  $data->nama_asli }}</td>
                  <td>{{  $data->nomor_hp }}</td>
                  <td>{{  $data->email }}</td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
</body>
</html>

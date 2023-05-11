@php
    $DateConv = new Hijri_GregorianConvert();
    $format = 'YYYY/MM/DD';
    $listTahun = [];
    for ($i = 0; $i < 3; $i++) {
        array_push($listTahun, date('Y') - $i);
    }
@endphp
@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="title text-center mb-3">
            <h1>Laporan TPA</h1>
            <div class="form-tahun d-flex justify-content-center gap-2 align-items-center">
                <h1>Tahun <span id="masehi">{{ date('Y') }}</span>/<span id="hijri"><?= $DateConv->GregorianToHijri(date('Y'), 'YYYY') ?></span>H</h1>
                <form action="" method="get">
                    <select name="pilihtahun" id="pilihtahun" style="width: 24px">
                        @foreach ($listTahun as $tahun)
                            <option value="{{ $tahun }}"
                                data-tahun="<?= $DateConv->GregorianToHijri($tahun, 'YYYY') ?>" style="width: 100px;">
                                {{ $tahun }}/{{ $DateConv->GregorianToHijri($tahun, 'YYYY') . ' H' }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        <hr class="mb-4">
        <a href="{{ route('zakat.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>

        <div class="container d-flex flex-column justify-content-center align-items-center mt-3"
            style="height: 420px; margin:0;">
            <div class="title">
                <h3>Diagram Kontribusi Pelajar</h3>
            </div>
            <canvas id="tpa"></canvas>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const chartTpa = document.getElementById('tpa');
        const pilihtahun = document.querySelector('#pilihtahun');
        const hijriyah = document.querySelectorAll('option[data-tahun]');
        const masehi = document.getElementById('masehi');
        const hijri = document.getElementById('hijri');
        const tableBody = $('#tblcontent');

        new Chart(chartTpa, {
            type: 'bar',
            data: {
                // labels: ['Nama Pengajar 1','Nama Pengajar 2','Nama Pengajar 3','Nama Pengajar 4'],
                labels: {{ Js::from($listustad['nama_ustadh']) }},
                datasets: [{
                    label: 'Jumlah pertemuan',
                    // data: [4,5,3,5,6],
                    data: <?= json_encode(Arr::collapse($listustad['total_ajar'])) ?>,
                    borderWidth: 1,
                    // borderColor: '#FF6384',
                    backgroundColor: 'rgba(68, 68, 255, 0.693)',
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush

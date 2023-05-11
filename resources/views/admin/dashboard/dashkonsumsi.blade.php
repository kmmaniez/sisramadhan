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

        <div class="title text-center mb-5">
            <h1>Laporan Kelola Konsumsi</h1>
            <div class="form-tahun d-flex justify-content-center gap-2 align-items-center">
                <h1>Tahun <span id="masehi">{{ date('Y') }}</span>/<span
                        id="hijri"><?= $DateConv->GregorianToHijri(date('Y'), 'YYYY') ?></span>H</h1>
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
                <h3>Tabel Kontribusi Warga</h3>
            </div>
            <canvas id="konsumsi"></canvas>
        </div>

    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const chartKonsumsi = document.getElementById('konsumsi');
        const pilihtahun = document.querySelector('#pilihtahun');
        const hijriyah = document.querySelectorAll('option[data-tahun]');
        const masehi = document.getElementById('masehi');
        const hijri = document.getElementById('hijri');
        const tableBody = $('#tblcontent');

        var chart = new Chart(chartKonsumsi, {
            type: 'bar',
            data: {
                labels: {{ Js::from($getOnlyFourUsers['list_warga']) }},
                datasets: [{
                    label: 'Takjil',
                    data: {{ Js::from($getOnlyFourUsers['jumlah_takjil']) }},
                    borderWidth: 1,
                    backgroundColor: 'rgba(68, 68, 255, 0.693)',
                }, {
                    label: 'Jabur',
                    data: {{ Js::from($getOnlyFourUsers['jumlah_jabur']) }},
                    borderWidth: 1,
                    backgroundColor: 'rgba(255, 122, 34, 0.853)',
                }, {
                    label: 'Buka bersama',
                    data: {{ Js::from($getOnlyFourUsers['jumlah_bukber']) }},
                    borderWidth: 1,
                    backgroundColor: 'rgba(162, 162, 162, 0.853)',
                }, ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        pilihtahun.addEventListener('change', () => {

            let tahun = masehi.textContent;
            masehi.textContent = pilihtahun.value;
            tahun = pilihtahun.value;
            hijriyah.forEach(element => {
                if (element.value == tahun) {
                    hijri.textContent = element.dataset.tahun
                }
            });
            $.ajax({
                url: window.location.origin +
                    '/admin/dashkonsumsi/filterYear?year=' + pilihtahun.value,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    const {
                        jumlah_bukber,
                        jumlah_jabur,
                        jumlah_takjil,
                        list_warga
                    } = response.data;

                    chart.data.labels = []
                    chart.data.datasets = [{
                        label: 'Takjil',
                        data: [],
                        borderWidth: 1,
                        backgroundColor: 'rgba(68, 68, 255, 0.693)',
                    }, {
                        label: 'Jabur',
                        data: [],
                        borderWidth: 1,
                        backgroundColor: 'rgba(255, 122, 34, 0.853)',
                    }, {
                        label: 'Buka Bersama',
                        data: [],
                        borderWidth: 1,
                        backgroundColor: 'rgba(162, 162, 162, 0.853)',
                    }]

                    list_warga.forEach(item => {
                        chart.data.labels.push(item)
                    })
                    jumlah_takjil.forEach(item => {
                        chart.data.datasets[0].data.push(item)
                    })
                    jumlah_jabur.forEach(item => {
                        chart.data.datasets[1].data.push(item)
                    })
                    jumlah_bukber.forEach(item => {
                        chart.data.datasets[2].data.push(item)
                    })

                    chart.update();

                }
            })
        })
    </script>
@endpush

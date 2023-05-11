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
            <h1>Laporan Tarawih</h1>
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
                <h3>Diagram Kontribusi Warga</h3>
            </div>
            <canvas id="tarawih"></canvas>
        </div>

    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const chartTarawih = document.getElementById('tarawih');
        const pilihtahun = document.querySelector('#pilihtahun');
        const hijriyah = document.querySelectorAll('option[data-tahun]');
        const masehi = document.getElementById('masehi');
        const hijri = document.getElementById('hijri');
        const tableBody = $('#tblcontent');

        var chart = new Chart(chartTarawih, {
            type: 'bar',
            data: {
                labels: {{ Js::from($getOnlyFourUsers['list_warga']) }},
                datasets: [{
                    label: 'Imam',
                    data: {{ Js::from($getOnlyFourUsers['jumlah_imam']) }},
                    borderWidth: 1,
                    backgroundColor: 'rgba(68, 68, 255, 0.693)',
                }, {
                    label: 'Pengisi kultum',
                    data: {{ Js::from($getOnlyFourUsers['jumlah_penceramah']) }},
                    borderWidth: 1,
                    backgroundColor: 'rgba(255, 122, 34, 0.853)',
                }, {
                    label: 'Bilal',
                    data: {{ Js::from($getOnlyFourUsers['jumlah_bilal']) }},
                    borderWidth: 1,
                    backgroundColor: 'rgba(162, 162, 162, 0.853)',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        })

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
                    '/admin/dashtarawih/filterYear?year=' + pilihtahun.value,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    const {
                        list_warga,
                        jumlah_bilal,
                        jumlah_imam,
                        jumlah_penceramah
                    } = response.data;
                    
                    chart.data.labels = []
                    chart.data.datasets = [{
                        label: 'Imam',
                        data: [],
                        borderWidth: 1,
                        backgroundColor: 'rgba(68, 68, 255, 0.693)',
                    }, {
                        label: 'Pengisi Kultum',
                        data: [],
                        borderWidth: 1,
                        backgroundColor: 'rgba(255, 122, 34, 0.853)',
                    }, {
                        label: 'Bilal',
                        data: [],
                        borderWidth: 1,
                        backgroundColor: 'rgba(162, 162, 162, 0.853)',
                    }]

                    list_warga.forEach(item => {
                        chart.data.labels.push(item)
                    })
                    jumlah_imam.forEach(item => {
                        chart.data.datasets[0].data.push(item)
                    })
                    jumlah_penceramah.forEach(item => {
                        chart.data.datasets[1].data.push(item)
                    })
                    jumlah_bilal.forEach(item => {
                        chart.data.datasets[2].data.push(item)
                    })

                    chart.update();
                }
            })
        })
    </script>
@endpush

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
            <h1>Laporan Tadarus</h1>
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
                <h3>Jumlah khataman</h3>
            </div>
            <canvas id="tadarus"></canvas>
        </div>
        {{-- {{ json_encode($tadarus['listnama']) }} --}}
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const pilihtahun = document.querySelector('#pilihtahun');
        const hijriyah = document.querySelectorAll('option[data-tahun]');
        const masehi = document.getElementById('masehi');
        const hijri = document.getElementById('hijri');
        const tableBody = $('#tblcontent');
        const chartTadarus = document.getElementById('tadarus');

        var chart = new Chart(chartTadarus, {
            type: 'bar',
            data: {
                labels: {{ Js::from($tadarus['listnama']) }},
                // labels: [],
                datasets: [{
                    label: 'Jumlah Khataman',
                    data: {{ Js::from($tadarus['jumlah']) }},
                    // data: [],
                    borderWidth: 1,
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
                    '/admin/dashtadarus/filterYear?year=' + pilihtahun.value,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    const { data } = response;
                    chart.data.labels = []
                    data.forEach(item => {
                        chart.data.labels.push(item.nama_kelompok);
                        chart.data.datasets[0].data.push(item.jumlah_khatam)
                    })
                    chart.update('none');
                }
            })
        })
    </script>
@endpush
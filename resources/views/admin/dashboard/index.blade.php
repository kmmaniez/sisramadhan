@extends('layouts.admin')

@section('content')
    <div class="mb-5">
        <div class="card mb-4">
            <div class="card-body">
                <h2><strong>Dashboard kegiatan ramadhan {{ date('Y') }}</strong></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="tarawih"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body" style="height: 400px">
                        <h1 style="font-size: 96px"><strong>{{ $jumlahwarga }}</strong></h1>
                        <h2 style="font-size: 54px">Warga</h2>
                        <small>Jumlah warga aktif terdaftar</small>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body" style="height: 400px">
                        <h1 style="font-size: 96px"><strong>{{ $jumlahbilal[0]->jumlahbilal }}</strong></h1>
                        <h2 style="font-size: 54px">Bilal</h2>
                        <small>Jumlah bilal per warga </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="konsumsi"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body" style="height: 400px">
                        <h1 style="font-size: 96px"><strong>{{ $jumlahimam[0]->jumlahimam }}</strong></h1>
                        <h2 style="font-size: 54px">Imam</h2>
                        <small>Jumlah imam per warga</small>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body" style="height: 400px">
                        <h1 style="font-size: 96px"><strong>{{ $jumlahpenceramah[0]->jumlahpenceramah }}</strong></h1>
                        <h2 style="font-size: 54px">Penceramah</h2>
                        <small>Jumlah peneceramah per warga </small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="tpa"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="tadarus"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartTadarus = document.getElementById('tadarus');
        const chartTpa = document.getElementById('tpa');
        const chartKonsumsi = document.getElementById('konsumsi');
        const chartTarawih = document.getElementById('tarawih');

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

        var chart = new Chart(chartTarawih, {
            type: 'bar',
            data: {
                labels: {{ Js::from($getOnlyFourUsersTarawih['list_warga']) }},
                datasets: [{
                    label: 'Imam',
                    data: {{ Js::from($getOnlyFourUsersTarawih['jumlah_imam']) }},
                    borderWidth: 1,
                    backgroundColor: 'rgba(68, 68, 255, 0.693)',
                }, {
                    label: 'Pengisi kultum',
                    data: {{ Js::from($getOnlyFourUsersTarawih['jumlah_penceramah']) }},
                    borderWidth: 1,
                    backgroundColor: 'rgba(255, 122, 34, 0.853)',
                }, {
                    label: 'Bilal',
                    data: {{ Js::from($getOnlyFourUsersTarawih['jumlah_bilal']) }},
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

        var chart = new Chart(chartKonsumsi, {
            type: 'bar',
            data: {
                labels: {{ Js::from($getOnlyFourUsersKonsumsi['list_warga']) }},
                datasets: [{
                    label: 'Takjil',
                    data: {{ Js::from($getOnlyFourUsersKonsumsi['jumlah_takjil']) }},
                    borderWidth: 1,
                    backgroundColor: 'rgba(68, 68, 255, 0.693)',
                }, {
                    label: 'Jabur',
                    data: {{ Js::from($getOnlyFourUsersKonsumsi['jumlah_jabur']) }},
                    borderWidth: 1,
                    backgroundColor: 'rgba(255, 122, 34, 0.853)',
                }, {
                    label: 'Buka bersama',
                    data: {{ Js::from($getOnlyFourUsersKonsumsi['jumlah_bukber']) }},
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

        var chart = new Chart(chartTpa, {
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

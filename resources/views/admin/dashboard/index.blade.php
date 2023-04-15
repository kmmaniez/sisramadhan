@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- <div class="mb-4 text-center">
          <h1>Tdarus</h1>
            <canvas id="tadarus"></canvas>
        </div>
        
        <div class="mb-4 text-center">
          <h1>Tarawih</h1>
            <canvas id="tarawih"></canvas>
        </div>
        
        <div class="m4-5 text-center">
          <h1>Tpa</h1>
            <canvas id="tpa"></canvas>
        </div>

        <div class="mb-4 text-center">
          <h1>Konsumsi</h1>
            <canvas id="konsumsi"></canvas>
        </div> --}}

    </div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const chartTadarus = document.getElementById('tadarus');
  const chartTarawih = document.getElementById('tarawih');
  const chartTpa = document.getElementById('tpa');
  const chartKonsumsi = document.getElementById('konsumsi');

  new Chart(chartTadarus, {
    type: 'bar',
    data: {
      labels: ['Kelompok 1','Kelompok 2','Kelompok 3','Kelompok 4'],
      datasets: [{
        label: 'Jumlah Khataman',
        data: [4,2,3,6,7],
        borderWidth: 1,
        // borderColor: '#FF6384',
        backgroundColor: 'rgba(68, 68, 255, 0.693)',
        }
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(chartTarawih, {
    type: 'bar',
    data: {
      labels: ['Fulan 1','Fulan 2','Fulan 3','Fulan 4'],
      datasets: [
      {
        label: 'Imam',
        data: [4.3,2.5,3.5,4.5,6],
        borderWidth: 1,
        backgroundColor: 'rgba(68, 68, 255, 0.693)',
      },{
        label: 'Pengisi kultum',
        data: [2.5,4.5,1.8,2.8],
        borderWidth: 1,
        backgroundColor: 'rgba(255, 122, 34, 0.853)',
      },{
        label: 'Bilal',
        data: [2,2,3,5],
        borderWidth: 1,
        backgroundColor: 'rgba(162, 162, 162, 0.853)',
      },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(chartTpa, {
    type: 'bar',
    data: {
      labels: ['Nama Pengajar 1','Nama Pengajar 2','Nama Pengajar 3','Nama Pengajar 4'],
      datasets: [{
        label: 'Jumlah pertemuan',
        data: [4,5,3,5,6],
        borderWidth: 1,
        // borderColor: '#FF6384',
        backgroundColor: 'rgba(68, 68, 255, 0.693)',
        }
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  
  new Chart(chartKonsumsi, {
    type: 'bar',
    data: {
      labels: ['Keluarga 1','Keluarga 2','Keluarga 3','Keluarga 4'],
      datasets: [{
        label: 'Takjil',
        data: [4.3,2.5,3.5,4.5,6],
        borderWidth: 1,
        backgroundColor: 'rgba(68, 68, 255, 0.693)',
      },{
        label: 'Jabur',
        data: [2.5,4.5,1.8,2.8],
        borderWidth: 1,
        backgroundColor: 'rgba(255, 122, 34, 0.853)',
      },{
        label: 'Buka bersama',
        data: [2,2,3,5],
        borderWidth: 1,
        backgroundColor: 'rgba(162, 162, 162, 0.853)',
      },
      ],
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
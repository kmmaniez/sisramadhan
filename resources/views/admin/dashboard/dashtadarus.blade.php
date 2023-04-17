@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
          
      <div class="title text-center mb-3">
        <h1>Laporan Tadarus</h1>
        <div class="form-tahun d-flex justify-content-center gap-2 align-items-center">
            <h1>Tahun 2022/1443 H</h1>
            <form action="" method="post">
                <select name="" id="" style="width: 24px">
                    <option value="2022" style="width: 100px;">2022/1443 H</option>
                    <option value="2021" style="width: 100px;">2021/1442 H</option>
                    <option value="2020" style="width: 100px;">2020/1441 H</option>
                </select>
            </form>
        </div>
      </div>
      <hr class="mb-4">
      <a href="{{ route('zakat.index') }}" class="btn btn-lg btn-secondary mb-4">Kembali</a>

      <div class="container d-flex flex-column justify-content-center align-items-center mt-3" style="height: 420px; margin:0;">
        <div class="title">
          <h3>Jumlah khataman</h3>
        </div>
        <canvas id="tadarus"></canvas>
      </div>
      {{-- {{ json_encode($namakelompok) }} --}}
    </div>

@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const chartTadarus = document.getElementById('tadarus');
  // var ea = {{ Js::from($namakelompok) }};
  new Chart(chartTadarus, {
    type: 'bar',
    data: {
      // labels: ['Kelompok 1','Kelompok 2','Kelompok 3','Kelompok 4'],
      labels: <?= json_encode($namakelompok) ?>,
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

</script>
@endpush
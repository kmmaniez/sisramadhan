@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
          
      <div class="title text-center mb-3">
        <h1>Laporan Tarawih</h1>
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
</script>
@endpush
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @vite('resources/css/app.css')
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
      .child{
        list-style-type: none;
      }
      body{
        /* overflow: hidden; */
      }
      header{
        /* background-color: red; */
        /* opacity: 0.3; */
        /* position: absolute; */
        /* top: 0; */
        background-color: #eaeaea;
      }

      section#ramadhan{
        width: 100%;
        min-height: 100vh;
        height: max-content;
        /* height: 100%; */
        padding: 0 16px;
        /* background-color: salmon; */
        display: flex;
        flex-direction: row;
        gap: 2rem;
        overflow: scroll;
      }
      section#ramadhan aside#nav{
        /* width: 280px; */
        width: 324px;
        padding-top: 40px;
        height: initial;
        /* height: 100%; */
        /* background-color: lightblue; */
      }
      section#ramadhan #content{
        margin-top: 40px;
        /* width: 100%; */
        /* height: 100%; */
        /* padding: 16px; */
        /* background-color: blue; */
      }
    </style>
  </head>
<body>

  <header class="py-2 w-100">
    <div class="container-fluid d-flex justify-content-between align-items-center px-5">
        <h1><strong><a href="/admin" class="text-decoration-none text-dark">Ramadhanku</a></strong></h1>
        <div class="form-group">
          <form action="{{ route('logout') }}" method="post">
            @csrf
            
            @if (Auth::check())
              <div class="title">
                <button type="submit" class="btn btn-lg btn-primary">Logout</button>
              </div>
            @else
              <a href="/login" class="btn btn-lg btn-none"><strong>Login</strong></a>
            @endif
            {{-- <a href="/login" class="btn btn-lg btn-none"><strong>Lougut</strong></a> --}}
          </form>

        </div>
    </div>
  </header>

  <section id="ramadhan">

    <aside class="d-flex border-end" id="nav">
      <ul class="nav flex-column gap-2 w-100">
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#dashboarCollapse" role="button" aria-expanded="false" aria-controls="dashboarCollapse">Dashboard</a>
            <ul class="child collapse border-0" id="dashboarCollapse">
              <li class="ps-4 py-1"><a href="/admin/dashtpa" class="dropdown-item fw-bold">TPA</a></li>
              <li class="ps-4 mt-1 py-1"><a href="/admin/dashkonsumsi" class="dropdown-item ">Kelola Konsumsi</a></li>
              <li class="ps-4 mt-1 py-1"><a href="/admin/dashtarawih" class="dropdown-item ">Tarawih</a></li>
              <li class="ps-4 mt-1 py-1"><a href="/admin/dashtadarus" class="dropdown-item ">Tadarus</a></li>
            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('tpa.index') }}">TPA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('konsumsi.index') }}">Kelola konsumsi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('tarawih.index') }}">Tarawih</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('tadarus.index') }}">Tadarus</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('khataman.index') }}">Khataman & Nuzulul</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('zakat.index') }}">Zakat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('takbiran.index') }}">Takbiran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('sholatied.index') }}">Sholat Ied</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('warga.index') }}">Warga</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#laporanCollapse" role="button" aria-expanded="false" aria-controls="laporanCollapse">Laporan</a>
          <ul class="child collapse" id="laporanCollapse">
            <li class="ps-4 mt-1 py-1"><a href="/admin/laporan-imam" class="dropdown-item fw-bold">Laporan Imam & Bilal</a></li>
            <li class="ps-4 mt-1 py-1"><a href="/admin/laporan-kultum" class="dropdown-item ">Laporan Pengisi Kultum</a></li>
            <li class="ps-4 mt-1 py-1"><a href="/admin/laporan-konsumsi" class="dropdown-item ">Laporan Konsumsi</a></li>
          </ul>
        </li>
      </ul>
    </aside>

    <div class="container-fluid" id="content">
      
      @yield('content')

    </div>

  </section>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    let awe = [];
    // fetch('/admin/getTadarus')
    // .then(res => res.json())
    // .then(data => {
    //   console.log(JSON.parse(data));
    // })
  </script>
       
  </body>
    @stack('script')
    @vite('resources/js/app.js')
</html>
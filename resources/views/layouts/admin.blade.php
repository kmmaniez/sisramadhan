<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @vite('resources/css/app.css')
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
      .child{
        list-style-type: none;
      }
      header{
        background-color: #eaeaea;
      }

      section#ramadhan{
        width: 100%;
        min-height: 100vh;
        height: max-content;
        padding: 0 16px 0 8px;
        display: flex;
        flex-direction: row;
        gap: 2rem;
        overflow: scroll;
      }
      section#ramadhan aside#nav{
        width: 324px;
        padding-top: 48px;
        height: initial;
      }
      section#ramadhan #content{
        margin-top: 40px;
      }
      .nav-item.active{
        font-weight: 700;
        /* background-color: #eaeaea; */
      }
      aside ul{
        background-color: #fff;
        padding: 8px;
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
          </form>

        </div>
    </div>
  </header>

  <section id="ramadhan">

    <aside class="d-flex border-end" id="nav">
      <!-- Cek user dengan role panitia / 1 -->
      <ul class="nav flex-column gap-2 w-100">

        <li class="nav-item {{ (request()->routeIs('admin')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin') }}">Dashboard</a>
        </li>
        <li class="nav-item {{ (request()->routeIs('tpa*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('tpa.index') }}">TPA</a>
        </li>
        <li class="nav-item {{ (request()->routeIs('konsumsi*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('konsumsi.index') }}">Kelola konsumsi</a>
        </li>
        <li class="nav-item {{ (request()->routeIs('tarawih*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('tarawih.index') }}">Tarawih</a>
        </li>
        <li class="nav-item {{ (request()->routeIs('tadarus*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('tadarus.index') }}">Tadarus</a>
        </li>
        <li class="nav-item {{ (request()->routeIs('khataman*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('khataman.index') }}">Khataman & Nuzulul</a>
      </li>
        <li class="nav-item {{ (request()->routeIs('zakat*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('zakat.index') }}">Zakat</a>
        </li>
        <li class="nav-item {{ (request()->routeIs('takbiran*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('takbiran.index') }}">Takbiran</a>
        </li>
        <li class="nav-item {{ (request()->routeIs('sholatied*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('sholatied.index') }}">Sholat Ied</a>
        </li>
        <li class="nav-item {{ (request()->routeIs('warga*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('warga.index') }}">Warga</a>
        </li>

        @if (Auth::user()->id_role == 1) 
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#laporanCollapse" role="button" aria-expanded="false" aria-controls="laporanCollapse">Laporan</a>
          <ul class="child collapse {{ (request()->routeIs('lap*')) ? 'show' : '' }} " id="laporanCollapse">
            <li class="ps-4 mt-1 py-1"><a href="/admin/laporan-imam" class="dropdown-item {{ (request()->routeIs('lap.imam')) ? 'fw-bold' : '' }}">Laporan Imam & Bilal</a></li>
            <li class="ps-4 mt-1 py-1"><a href="/admin/laporan-kultum" class="dropdown-item {{ (request()->routeIs('lap.kultum')) ? 'fw-bold' : '' }}">Laporan Pengisi Kultum</a></li>
            <li class="ps-4 mt-1 py-1"><a href="/admin/laporan-konsumsi" class="dropdown-item {{ (request()->routeIs('lap.konsumsi')) ? 'fw-bold' : '' }}">Laporan Konsumsi</a></li>
          </ul>
        </li>
        @endif
        
      </ul>
    </aside>

    <div class="container-fluid" id="content">
      
      @yield('content')

    </div>

  </section>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/locale/id.js"></script>
    
    @stack('script')
  </body>
    @vite('resources/js/app.js')
</html>
